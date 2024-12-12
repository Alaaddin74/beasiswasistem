<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Models\Scholarship;
use App\Models\ScholarshipApplication; // Add this
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $user = User::find(Auth::id());
        $notifications = Notification::where("user_id", $user->id)->orderBy('created_at', 'DESC')->get();
        $notificationsIndcatior = $notifications->where('seen', 0)->count();
        $notificationsIndcatior = $notificationsIndcatior > 0 ? true : false;

        return view('mahasiswa.home', compact('notifications', 'notificationsIndcatior'));
    }

    public function scholarship()
    {
        $scholarships = scholarship::all();
        return view('mahasiswa.scholarship', compact('scholarships'));
    }

    public function dafter($scholarshipId)
    {
        $scholarship = Scholarship::findorfail($scholarshipId);
        return view('mahasiswa.dafter', ["scholarship" => $scholarship]);
    }

    public function application()
    {
        $users = User::all();

        $user = User::find(Auth::id());
        $scholarshipApplications = $user
            ->scholarshipApplications() // Remove the parentheses
            ->with('scholarship') // Eager load the scholarship relationship
            ->get();

        return view('mahasiswa.application', compact('scholarshipApplications'));
        // return view('mahasiswa.application');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('mahasiswa.profile', compact("user"));
    }

    public function storeProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|string|max:10',
            'nationality' => 'required|string|max:50',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            // 'city' => 'nullable|string|max:255',
            'email' => 'required|email',
        ]);
        // dd($request->all());

        // Convert date to YYYY-MM-DD format
        // $dateOfBirth = Carbon::createFromFormat('m/d/Y', $request->input('birthday'))->format('Y-m-d');

        $user = auth()->user();
        /** @var \App\Models\User $user */
        $user->update([
            'user_id' => auth()->id(),
            'name' => $request->input('name'),
            'date_of_birth' => $request->input('birthday'),
            'gender' => $request->input('gender'),
            'nationality' => $request->input('nationality'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);

        return redirect()->route('profile')->with('success', 'Application submitted successfully!');
    }

    public function changeSeenStates($id)
    {
        $notification = Notification::findorfail($id);
        $notification->seen = 1;
        $notification->save();
        return redirect()->route('home');
    }
}
