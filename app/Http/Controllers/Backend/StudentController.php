<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GradeLevel;
use App\Models\Strand;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($grade_level_id = null, $strand_id = null)
    {
        if ($grade_level_id) {
            $gradeLevel = GradeLevel::with('students')->find($grade_level_id);
            $students = $gradeLevel->students;
        } else if ($strand_id) {
            $strand = Strand::with('students')->find($strand_id);
            $students = $strand->students;
        } else {
            $students = Student::all();
            $gradeLevel = null;
            $strand = null;
        }
        $gradeLevels = GradeLevel::all();
        $strands = Strand::all();
        return view('SMS.backend.pages.students.index', compact('students', 'gradeLevels', 'grade_level_id', 'gradeLevel', 'strands', 'strand_id', 'strand'));
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
    public function store(Request $request)
    {
        //
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
        //
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
