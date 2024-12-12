<?php

namespace App\Http\Controllers;
use App\Models\ScholarshipApplication;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    //
    public function create($scholarshipId)
    {
        $scholarship = Scholarship::findOrFail($scholarshipId);
        return view('mahasiswa.dafter', compact('scholarship'));
    }

    public function store(Request $request, )
    {
        if (ScholarshipApplication::where([['scholarship_id', $request->scholarshipId],['user_id', auth()->user()->id]])->exists()){
            return redirect()->back()->with('error', 'You have already applied!');
        }

        $request->validate([
            'scholarshipId' => 'required|exists:scholarships,id',
            'current_institution' => 'required|string|max:255',
            'program_of_study' => 'required|string|max:255',
            'current_gpa' => 'required|numeric|between:0,4.00',
            'past_education' => 'required|string',
            'documents.*' => 'file|mimes:pdf,jpg,png|max:4048',
        ]);



        // Handle file uploads
        $uploadedFiles = [];
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $path = $file->store('documents', 'public');
                $uploadedFiles[] = $path;
            }
        }

        // Create the application
        ScholarshipApplication::create([
            'user_id' => auth()->id(),
            'scholarship_id' => $request->input('scholarshipId'),
            'current_institution' => $request->input('current_institution'),
            'program_of_study' => $request->input('program_of_study'),
            'current_gpa' => $request->input('current_gpa'),
            'past_education' => $request->input('past_education'),
            'documents' => json_encode($uploadedFiles),
        ]);

        return redirect()->route('dafter', [$request->input('scholarshipId')])->with('success', 'Application submitted successfully!');
    }


    public function update(Request $request, $id)
{
    $application = ScholarshipApplication::where('id', $id)
                    ->where('user_id', auth()->id()) // Ensure user can edit only their applications
                    ->firstOrFail();

    $request->validate([
        'documents.*' => 'required|file|mimes:pdf,jpg,png|max:4048',
        // Add validations for other fields
        'current_institution' => 'required|string|max:255',
        'program_of_study' => 'required|string|max:255',
        'current_gpa' => 'required|numeric|between:0,4.00',
        'past_education' => 'required|string',
    ]);

    // Handle file uploads
    $uploadedFiles = $application->documents ? json_decode($application->documents, true) : [];
    if ($request->hasFile('documents')) {
        foreach ($request->file('documents') as $file) {
            $path = $file->store('documents', 'public');
            $uploadedFiles[] = $path;
        }
    }
    // Update the application
    $application->update([
        'current_institution' => $request->input('current_institution'),
        'program_of_study' => $request->input('program_of_study'),
        'current_gpa' => $request->input('current_gpa'),
        'past_education' => $request->input('past_education'),
        'documents' => json_encode($uploadedFiles),
    ]);

    return redirect()->route('home')->with('success', 'Application updated successfully!');
}

public function edit($id)
    {
        $application = ScholarshipApplication::where('id', $id)
                        ->where('user_id', auth()->id()) // Ensure user can edit only their applications
                        ->with('scholarship')
                        ->firstOrFail();
        return view('mahasiswa.edit', compact('application'));
    }

public function destroy($id)
    {
        // Find the application by ID
        $application = ScholarshipApplication::findOrFail($id);
        // Delete the application
        $application->delete();
        // Redirect with a success message
        return redirect()->route('home')->with('success', 'Application removed successfully.');
    }

}
