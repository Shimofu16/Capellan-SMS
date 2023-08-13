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

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type = null, $id = null)
    {
        $gradeLevel = null;
        $specialization = null;
        $students = Student::all();
        if ($type === "level") {
            $students =  Student::with('enrollment')->whereHas('enrollment', function ($query) use ($id) {
                $query->where('gradelevel_id', $id);
            })->get();
            $gradeLevel = GradeLevel::find($id);
        } else if ($type === "specialization") {
            $students =  Student::with('enrollment')->whereHas('enrollment', function ($query) use ($id) {
                $query->where('specialization_id', $id);
            })->get();
            $specialization = Specialization::find($id);
        }
        $gradeLevels = GradeLevel::all();
        $specializations = Specialization::all();
        return view('SMS.backend.pages.students.index', compact('students', 'gradeLevels',  'gradeLevel', 'specializations',  'specialization', 'type'));
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

            foreach ($request->enroll_subjects as $subject_id) {
                StudentSubject::create([
                    'student_id' => $student_id,
                    'subject_id' => $subject_id,
                    'status' => $status,
                    'semester_id' => $active->active_sem_id,
                    'sy_id' => $active->active_SY_id
                ]);
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
            }

            $name = $student->getFullName();
            $export = new ExportsStudentSubject($student);
            $filename = $name . '.xlsx';
            GenerateUserSession::GenerateSession('Enroll Student`s Subject', 'Enrolled Student ' . $name, auth()->user());
            return $export->download($filename);
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
