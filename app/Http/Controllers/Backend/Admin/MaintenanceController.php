<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use App\Models\SchoolYear;
use App\Models\Semester;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $billing = Billing::find(1);
        $school_years = SchoolYear::all();
        $semesters = Semester::all();
        return view('SMS.backend.pages.maintenance.index', compact('school_years', 'billing', 'semesters'));
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
    public function update(Request $request, string $table, string $id)
    {
        try {
            if ($table === 'billing') {
                $billing = Billing::find($id);
                $billing->fee = $request->fee;
                $billing->save();
                return redirect()->back()->with('success', 'Billing fee updated successfully!');
            } elseif ($table === 'school_year') {
                $school_year = SchoolYear::find($id);
                $school_year->name = $request->start_date . '-' . $request->end_date;
                $school_year->start_date = $request->start_date;
                $school_year->end_date = $request->end_date;
                $school_year->semester_id = $request->semester_id;
                $school_year->is_active = $request->is_active;
                $school_year->save();
                return redirect()->back()->with('success', 'School year updated successfully!');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('errorAlert', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
