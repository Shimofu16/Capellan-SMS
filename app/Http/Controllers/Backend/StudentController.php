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

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type = null, $id = null)
    {

        $gradeLevel = null;
        $specialization = null;
        if ($type === "Grade Level") {
            $students =  Student::with('enrollment')->whereHas('enrollment', function ($query) use ($id) {
                $query->where('grade_level_id', $id);
            })->get();
        } else if ($type === "Specialization") {
            $students =  Student::with('enrollment')->whereHas('enrollment', function ($query) use ($id) {
                $query->where('specialization_id', $id);
            })->get();
        } else {
            $students = Student::all();
        }
        $gradeLevels = GradeLevel::all();
        $specializations = Specialization::all();
        return view('SMS.backend.pages.students.index', compact('students', 'gradeLevels',  'gradeLevel', 'specializations',  'specialization','type'));
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        $file = $request->file('file');

        Excel::import(new StudentImport, $file);

        // Add any additional logic or response you need

        return redirect()->back()->with('success', 'Students imported successfully.');
    }
    private function export($name, $student)
    {
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
            /* delete all  student subjects before creating new one */
            StudentSubject::where('student_id', $student_id)->delete();
            foreach ($request->enroll_subjects as $subject_id) {
                StudentSubject::create([
                    'student_id' => $student_id,
                    'subject_id' => $subject_id,
                    'status' => $status

                ]);
            }
            if ($request->has('completed_subjects')) {
                foreach ($request->completed_subjects as $subject_id) {
                    StudentSubject::create([
                        'student_id' => $student_id,
                        'subject_id' => $subject_id,
                        'status' => $status
                    ]);
                }
            }
            $student = Student::findOrFail($student_id);
            $name = $student->getFullName();
            $export = new ExportsStudentSubject($student);
            $filename = $name . '.xlsx';
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
