<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Backend\General\GenerateUserSession;
use App\Http\Controllers\Controller;
use App\Models\EMS\GradeLevel;
use App\Models\EMS\Semester;
use App\Models\EMS\Specialization;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index($gradeLevelId, $specialization_id = null)
    {

        $specialization = null;
        $specializations = Specialization::with('strand', 'subjects')->get();
        $firstSemSubjects = Subject::query()
        ->with('semester', 'specialization', 'gradeLevel')
        ->where('grade_level_id', $gradeLevelId)
        ->where('semester_id', 1);
        $secondSemSubjects = Subject::query()
        ->with('semester', 'specialization', 'gradeLevel')
        ->where('grade_level_id', $gradeLevelId)
        ->where('semester_id', 2);
        if ($specialization_id) {
            $specialization = Specialization::with('strand', 'subjects')->find($specialization_id);
            $firstSemSubjects->where('specialization_id', $specialization_id);
            $secondSemSubjects->where('specialization_id', $specialization_id);
        }
        $firstSemSubjects = $firstSemSubjects->get();
        $secondSemSubjects = $secondSemSubjects->get();
        $semesters = Semester::all();
        $gradeLevels = GradeLevel::all();
        return view('SMS.backend.pages.academics.subject.index', compact('specializations', 'specialization', 'firstSemSubjects', 'secondSemSubjects', 'semesters' ,'gradeLevelId','gradeLevels', 'specialization_id'));
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
        try {
            $request->validate([
                'code' => 'required',
                'name' => 'required',
                'type' => 'required',
                'unit' => 'required',
                'grade_level_id' => 'required',
                'semester_id' => 'required',
                'specialization_id' => 'required',
            ]);
            Subject::create([
                'code' => $request->code,
                'name' => $request->name,
                'unit' => $request->unit,
                'type' => $request->type,
                'grade_level_id' => $request->grade_level_id,
                'semester_id' => $request->semester_id,
                'specialization_id' => $request->specialization_id,
            ]);
            GenerateUserSession::GenerateSession('Subject Management', 'Created Subject ' . $request->name, auth()->user());
            return back()->with('successToast', 'Subject successfully created!');
        } catch (\Throwable $th) {
            return back()->with('errorAlert', $th->getMessage());
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $subject = Subject::find($id);
            $subject->update([
                'code' => $request->code,
                'name' => $request->name,
                'unit' => $request->unit,
                'type' => $request->type,
                'semester_id' => $request->semester_id,
                'semester_id' => $request->semester_id,
                'specialization_id' => $request->specialization_id,
            ]);
            GenerateUserSession::GenerateSession('Subject Management', 'Updated Subject ' . $request->name, auth()->user());
            return back()->with('successToast', 'Subject successfully updated!');
        } catch (\Throwable $th) {
            return back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $subject =  Subject::find($id);
            GenerateUserSession::GenerateSession('Subject Management', 'Deleted Subject ' . $subject->name, auth()->user());
            $subject->delete();
            return back()->with('successToast', 'Subject successfully deleted!');
        } catch (\Throwable $th) {
            return back()->with('errorAlert', $th->getMessage());
        }
    }
}
