<?php

namespace App\Http\Controllers\Backend;

use App\Exports\StudentSubject as ExportsStudentSubject;
use App\Models\Strand;
use App\Models\Student;
use App\Models\GradeLevel;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use App\Models\Specialization;
use App\Http\Controllers\Controller;
use App\Models\StudentSubject;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($grade_level_id = null, $specialization_id = null)
    {
        $gradeLevel = null;
        $specialization = null;
        if ($grade_level_id) {
            $gradeLevel = GradeLevel::with('students')->find($grade_level_id);
            $students = $gradeLevel->students;
        } else if ($specialization_id) {
            $specialization = Specialization::with('students')->find($specialization_id);
            $students = $specialization->students;
        } else {
            $students = Student::all();
        }
        $gradeLevels = GradeLevel::all();
        $specializations = Specialization::all();
        return view('SMS.backend.pages.students.index', compact('students', 'gradeLevels', 'grade_level_id', 'gradeLevel', 'specializations', 'specialization_id', 'specialization'));
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
            foreach ($request->enroll_subjects as $subject_id) {
                StudentSubject::create([
                    'student_id' => $student_id,
                    'subject_id' => $subject_id,
                ]);
            }
            if ($request->has('completed_subjects')) {
                foreach ($request->completed_subjects as $subject_id) {
                    StudentSubject::create([
                        'student_id' => $student_id,
                        'subject_id' => $subject_id,
                    ]);
                }
            }
            $student = Student::findOrFail($student_id);
            $student->grade_level_id = $grade_level_id;
            $student->status = $status;
            $student->save();
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
