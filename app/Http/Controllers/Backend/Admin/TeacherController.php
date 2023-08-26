<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Backend\General\GenerateUserSession;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::where('isResigned', 0)->get();
        return view('SMS.backend.pages.teachers.index', compact('teachers'));
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
            Teacher::create([
                'name' => $request->name,
                'gender' => $request->gender,
                'age' => $request->age,
                'contact' => $request->contact,
                'email' => $request->email,
            ]);
            GenerateUserSession::GenerateSession('Teacher Management', 'Added '.$request->name, auth()->user());
            return redirect()->back()->with('successToast', 'Teacher Added Successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $teacher = Teacher::findOrFail($id);
            $teacher->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'age' => $request->age,
                'contact' => $request->contact,
                'email' => $request->email,
            ]);
            GenerateUserSession::GenerateSession('Teacher Management', 'Updated '.$teacher->name, auth()->user());
            return redirect()->back()->with('successToast', 'Teacher Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $teacher = Teacher::findOrFail($id);
            $teacher->update([
                'isResigned' => 1,
            ]);
            GenerateUserSession::GenerateSession('Teacher Management', 'Resigned '.$teacher->name, auth()->user());
            return redirect()->back()->with('successToast', 'Teacher Resigned Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }
}
