<?php

namespace App\Http\Controllers\Backend;

use App\Models\EMS\Strand;
use App\Models\EMS\Student;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use App\Models\EMS\GradeLevel;
use App\Models\StudentSubject;
use App\Models\EMS\Specialization;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentSubject as ExportsStudentSubject;
use App\Http\Controllers\Backend\General\GenerateUserSession;
use App\Models\EMS\ActiveSyandSem;
use App\Models\EMS\Semester;
use App\Models\Subject;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type = null, $id = null)
    {
        // Initialize variables for grade level, specialization, and school year ID.
        $gradeLevel = null;
        $specialization = null;
        $sy_id = session()->get('sy_id');

        // Start building a query to fetch students with their enrollments for the current school year.
        $students =  Student::query()->with('enrollment')->whereHas('enrollment', function ($query) use ($sy_id) {
            $query->where('school_year_id', $sy_id);
        });

        // Check the value of $type to determine the filtering criteria.
        if ($type === "level") {
            // If filtering by grade level, add a condition to filter students by the provided grade level ID.
            $students->whereHas('enrollment', function ($query) use ($id) {
                $query->where('gradelevel_id', $id);
            });
            // Find the corresponding grade level record.
            $gradeLevel = GradeLevel::find($id);
        } else if ($type === "specialization") {
            // If filtering by specialization, add a condition to filter students by the provided specialization ID.
            $students->whereHas('enrollment', function ($query) use ($id) {
                $query->where('specialization_id', $id);
            });
            // Find the corresponding specialization record.
            $specialization = Specialization::find($id);
        }

        // Execute the query and retrieve the list of filtered students.
        $students = $students->get();

        // Fetch all grade levels and specializations from their respective tables.
        $gradeLevels = GradeLevel::all();
        $specializations = Specialization::all();

        // Pass the retrieved data to the view for rendering.
        return view('SMS.backend.pages.students.index', compact('students', 'gradeLevels', 'gradeLevel', 'specializations', 'specialization', 'type'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $student_id, $grade_level_id, $status)
    {
        try {
            // dd($request->all());
            $active = ActiveSyandSem::first();
            //check if there is already subjects erolled for students in current sy and semester
            $studentSubjects = StudentSubject::where('student_id', $student_id)
                ->where('semester_id', $active->active_sem_id)
                ->where('sy_id', $active->active_SY_id)
                ->get();
            if ($studentSubjects->count() > 0) {
                return redirect()->back()->with('errorAlert', 'Student already enrolled in this semester and school year');
            }
            $student = Student::findOrFail($student_id);
            $specialization = $student->enrollment->specialization;
            $gradeLevel = $student->enrollment->gradeLevel;
            $subjects = [];
            foreach ($request->enroll_subjects as $subject_id) {
                StudentSubject::create([
                    'student_id' => $student_id,
                    'subject_id' => $subject_id,
                    'status' => $status,
                    'semester_id' => $active->active_sem_id,
                    'sy_id' => $active->active_SY_id
                ]);
                $subjects[] = ['id' => $subject_id];
            }
            if ($request->has('completed_subjects')) {
                foreach ($request->completed_subjects as $subject_id) {
                    StudentSubject::create([
                        'student_id' => $student_id,
                        'subject_id' => $subject_id,
                        'status' => $status,
                        'semester_id' => $active->active_sem_id,
                        'sy_id' => $active->active_SY_id
                    ]);
                }
                $subjects[] = ['id' => $subject_id];
            }
            $coreSubjects = Subject::where('type', 'Core')
                ->where('grade_level_id', $gradeLevel->id)
                ->where('specialization_id', $specialization->id)
                ->whereIn('id', $subjects)
                ->get();

            $appliedSubjects = Subject::where('type', 'Applied and Specialized Subjects')
                ->where('grade_level_id', $gradeLevel->id)
                ->where('specialization_id', $specialization->id)
                ->whereIn('id', $subjects)
                ->get();




            $semester =  (Semester::find($active->active_sem_id)->sem == 1) ? 'First ' : 'Second ';
            $semester = $semester . 'Semester';
            $name = $student->getFullName();
            // $filename = $name . '.xlsx';
            GenerateUserSession::GenerateSession('Enroll Student`s Subject', 'Enrolled Student ' . $name, auth()->user());
            return view('SMS.exports.subjects', compact('student', 'specialization', 'gradeLevel', 'semester', 'coreSubjects', 'appliedSubjects'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $student = Student::findOrFail($id);
            $gradeLevels = GradeLevel::all();
            return view('SMS.backend.pages.students.edit', compact('student', 'gradeLevels'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
