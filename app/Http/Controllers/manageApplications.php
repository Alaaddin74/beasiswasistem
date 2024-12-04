<?php

namespace App\Http\Controllers;

use App\Models\ScholarshipApplication;
use Illuminate\Http\Request;

class manageApplications extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $applications = ScholarshipApplication::all();
        return view('admin.manageApplications', compact('applications'));
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
    public function edit($id)
    {
        //
        $application = ScholarshipApplication::findOrFail($id);
        return view('admin.editApplication', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $application = ScholarshipApplication::findOrFail($id);
        $validated = $request->validate([
            'status' => 'required|string|in:pending,approved,rejected',
        ]);
        $application->update($validated);
        return redirect()->route('manageApplications.index')->with('success', 'Application status updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
