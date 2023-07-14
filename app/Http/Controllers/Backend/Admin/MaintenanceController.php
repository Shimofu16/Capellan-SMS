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
        try {
            $school_year = SchoolYear::create([
                'name' => date('Y', strtotime($request->start_date)) . '-' . date('Y', strtotime($request->end_date)),
                'start_date' => date('Y-m-d', strtotime($request->start_date)),
                'end_date' => date('Y-m-d', strtotime($request->end_date)),
                'semester_id' => 1,
            ]);
            return redirect()->back()->with('successToast', 'School year added successfully!');
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
    public function update(Request $request,  $id)
    {
        try {
            $latestActiveSy = SchoolYear::where('is_active', 1)->first();
            if ($latestActiveSy->is_active == 1) {
                $latestActiveSy->is_active = 0;
                $latestActiveSy->save();
            }
            $school_year = SchoolYear::find($id);
            $school_year->name = date('Y', strtotime($request->start_date)) . '-' . date('Y', strtotime($request->end_date));
            $school_year->start_date = date('Y-m-d', strtotime($request->start_date));
            $school_year->end_date = date('Y-m-d', strtotime($request->end_date));
            $school_year->semester_id = $request->semester_id;
            $school_year->is_active = $request->is_active;
            $school_year->save();
            return redirect()->back()->with('successToast', 'School year updated successfully!');
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
