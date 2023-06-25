<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use App\Models\Specialization;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($specialization_id = null)
    {
        
        if ($specialization_id !=null) {
            $specialization = Specialization::with('strand','subjects')->find($specialization_id);
            $subjects = $specialization->subjects;
        } else {
            $subjects = Subject::with('semester','specialization')->get();
            $specialization = null;
        }
        $specializations = Specialization::with('strand','subjects')->get();
        $semesters = Semester::all();
        return view('SMS.backend.pages.academics.subject.index', compact('specializations','specialization','subjects','semesters','specialization_id'));
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
                'unit' => 'required',
                'type' => 'required',
                'semester_id' => 'required',
                'specialization_id' => 'required',
            ]);
            Subject::create([
                'code' => $request->code,
                'name' => $request->name,
                'unit' => $request->unit,
                'prerequisite' => $request->prerequisite,
                'type' => $request->type,
                'semester_id' => $request->semester_id,
                'specialization_id' => $request->specialization_id,
            ]);
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
                'prerequisite' => $request->prerequisite,
                'type' => $request->type,
                'semester_id' => $request->semester_id,
                'specialization_id' => $request->specialization_id,
            ]);
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
            Subject::find($id)->delete();
            return back()->with('successToast', 'Subject successfully deleted!');
        } catch (\Throwable $th) {
            return back()->with('errorAlert', $th->getMessage());
        }
    }
}
