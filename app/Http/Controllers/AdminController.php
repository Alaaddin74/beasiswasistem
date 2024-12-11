<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;
use App\Models\ScholarshipApplication;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function home()
    {
        $users = User::where('role', 'user')->count();
        $scholarships = Scholarship::all()->count();
        $applications = ScholarshipApplication::all()->count();
        $accepted = ScholarshipApplication::where('status','approved')->count();
        $pending = ScholarshipApplication::where('status','pending')->count();
        $rejected = ScholarshipApplication::where('status','rejected')->count();

        // dd($scholarships);

        return view('admin.home', compact('users','scholarships','applications','accepted','pending','rejected'));
    }


    public function scholarshipForm()
    {
        $scholarships = Scholarship::all();

        return view('admin.scholarshipsform', compact('scholarships'));
    }
    public function editScholarshipForm($id)
    {
        $scholarship = Scholarship::findOrFail($id);

        return view('admin.editScholarship', compact('scholarship'));
    }

    // function to update
    public function updateScholarship(Request $request, $id)
        {
            // Find the scholarship by ID
            $scholarship = Scholarship::findOrFail($id);

            // Validate the incoming request
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:500',
                'requirement' => 'required|string|max:500',
                'deadline' => 'required|date|after:today',
            ]);
            $scholarship->update($request->all());
            // Update the scholarship
            // $scholarship->update([
            //     'title' => $request->input('title'),
            //     'description' => $request->input('description'),
            //     'requirement' => $request->input('requirement'),
            //     'deadline' => $request->input('deadline'),
            // ]);

            // Redirect back with a success message
            return redirect()
                ->route('admin.editScholarship', [$id])
                ->with('success', 'Scholarship updated successfully!');
        }

    public function createingView()
    {
        return view('admin.addScholarship'); // Return the 'create scholarship' view
    }

        public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'requirement' => 'required|string',
            'deadline' => 'required|date',
            'documents.*' => 'nullable|file|mimes:pdf,jpg,png|max:2048', // Adjust file types and size as needed
        ]);

        $scholarship = Scholarship::create($validated);

        // Handle file uploads if provided
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $path = $file->store('scholarship-documents', 'public');
                $scholarship->documents()->create(['path' => $path]);
            }
        }

        return redirect()->route('admin.scholarship')->with('success', 'Scholarship added successfully!');
    }

    public function destroy($id)
    {
        // Find the application by ID
        $scholarship = Scholarship::findOrFail($id);
        // Delete the application
        $scholarship->delete();
        // Redirect with a success message
        return redirect()->route('admin.scholarship')->with('success', 'Application removed successfully.');
    }
}
