<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EMS\Specialization;
use App\Models\EMS\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sy_id = session()->get('sy_id');
        $getTotalPerSpecialization = Specialization::select('id', 'specialization')
        ->withCount('studentEnrollments as students_count')
        ->whereHas('studentEnrollments', function ($query) use ($sy_id) {
            $query->where('school_year_id', $sy_id);
        })
        ->get();
        $studentsCount = Student::count();
        $teachersCount = Teacher::count();
        return view('SMS.backend.pages.dashboard.index', compact('getTotalPerSpecialization', 'studentsCount','teachersCount'));
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
