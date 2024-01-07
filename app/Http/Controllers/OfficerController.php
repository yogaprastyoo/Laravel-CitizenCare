<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.officer.officerCrud.index', [
            'officers' => Officer::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.officer.officerCrud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required|min:2',
            "email" => 'required|email|unique:officers,email',
            "phone_number" => 'required|min:11|max:13|unique:officers,phone_number',
            "role" => 'required|in:admin,officer',
            "password" => 'required|min:8',
            "confirm_password" => 'required|min:8|same:password',
        ]);

        $officer = Officer::create([
            'name' => Str::lower($request->name),
            'email' => Str::lower($request->email),
            'phone_number' => $request->phone_number,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('officers')->with('success', "Officer $officer->name created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $officer = Officer::where('slug', $slug)->firstOrFail();
        return view('pages.dashboard.officer.officerCrud.detail', ['officer' => $officer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $officer = Officer::where('slug', $slug)->firstOrFail();
        return view('pages.dashboard.officer.officerCrud.edit', ['officer' => $officer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $officer = Officer::where('slug', $slug)->firstOrFail();

        $request->validate([
            "name" => 'required|min:2',
            "email" => 'required|email|unique:officers,email,' . $officer->id,
            "phone_number" => 'required|min:11|max:13|unique:officers,phone_number,' . $officer->id,
            "role" => 'required|in:admin,officer',
            "password" => $request->password ? 'min:8' : '',
            "confirm_password" => $request->password_confirmation ? 'required|min:8|same:password' : '',
        ]);

        $officer->update([
            'name' => Str::lower($request->name),
            'email' => Str::lower($request->email),
            'phone_number' => $request->phone_number,
            'role' => $request->role,
            'password' => $request->password ? Hash::make($request->password) : $officer->password,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('officers')->with('success', "Officer $officer->name updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $officer = Officer::where('slug', $slug)->firstOrFail();
        $officer->delete();
        return redirect()->route('officers')->with('successDelete', "Officer $officer->name has been deleted.");
    }
}
