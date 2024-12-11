<?php

namespace App\Http\Controllers;

use App\Models\Notification;
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
        // Fetch messages associated with this application
        $messages = Notification::where('scholarship_application_id', $id)->get();

        // Combine all messages into a single string with newline separation
        $messagesText = $messages->pluck('message')->implode("\n");
        $application = ScholarshipApplication::findOrFail($id);
        // dd($application->id);
        return view('admin.editApplication', compact('application', 'messagesText'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $application = ScholarshipApplication::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|string|in:pending,approved,rejected',
        ]);

        // Check if a similar notification exists
        $messageExists = Notification::where('user_id', $application->user_id)
            ->where('scholarship_application_id', $application->id)
            ->where('message', $request->input('message'))
            ->exists();

        if (!$messageExists) {
            Notification::create([
                'user_id' => $application->user_id,
                'scholarship_application_id' => $application->id,
                'message' => $request->input('message'),
            ]);
        }

        $application->update($validated);

        return redirect()->route('manageApplications.index')->with('success', 'Application status updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $del = ScholarshipApplication::findOrFail($id);
        $del->delete();

        return redirect()->route('manageApplications.index')->with('success', 'Application status updated successfully.');
    }
}
