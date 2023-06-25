<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Specialization;
use App\Models\Strand;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($strand_id = null)
    {

        if ($strand_id) {
            $strand = Strand::with('specializations')->find($strand_id);
            $specializations = $strand->specializations;
        } else {
            $specializations = Specialization::all();
            $strand = null;
        }
        $strands = Strand::all();
        return view('SMS.backend.pages.academics.specialization.index', compact('specializations', 'strands', 'strand_id', 'strand'));
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
            Specialization::create([
                'name' => $request->name,
                'strand_id' => $request->strand_id,
            ]);
            return back()->with('successToast', 'Specialization successfully created!');
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
            $specialization = Specialization::find($id);
            $specialization->update([
                'name' => $request->name,
                'strand_id' => $request->strand_id,
            ]);
            return back()->with('successToast', 'Specialization successfully updated!');
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
            $specialization = Specialization::find($id);
            $specialization->delete();
            return back()->with('successToast', 'Specialization successfully deleted!');
        } catch (\Throwable $th) {
            return back()->with('errorAlert', $th->getMessage());
        }
    }
}
