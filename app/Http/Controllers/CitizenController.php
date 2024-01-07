<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CitizenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.dashboard.officer.citizenCrud.index', [
            'citizens' => Citizen::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.officer.citizenCrud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "national_id" => 'required|digits:12|unique:citizens,national_id',
            "name" => 'required|min:2',
            "email" => 'required|email|unique:citizens,email',
            "phone_number" => 'required|min:11|max:13|unique:citizens,phone_number',
            "address" => 'required|min:10',
            "password" => 'required|min:8',
            "confirm_password" => 'required|min:8|same:password',
        ]);

        $citizen = Citizen::create([
            'national_id' => $request->national_id,
            'name' => Str::lower($request->name),
            'email' => Str::lower($request->email),
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('citizens')->with('success', "Citizen $citizen->name created successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show($national_id)
    {
        return view('pages.dashboard.officer.citizenCrud.detail', [
            'citizen' => Citizen::where('national_id', $national_id)->firstOrFail(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($national_id)
    {
        return view('pages.dashboard.officer.citizenCrud.edit', [
            'citizen' => Citizen::where('national_id', $national_id)->firstOrFail(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $national_id)
    {
        $citizen = Citizen::where('national_id', $national_id)->firstOrFail();

        $request->validate([
            "national_id" => 'required|digits:12|unique:citizens,national_id,' . $citizen->id,
            "name" => 'required|min:2',
            "email" => 'required|email|unique:citizens,email,' . $citizen->id,
            "phone_number" => 'required|min:11|max:13|unique:citizens,phone_number,' . $citizen->id,
            "address" => 'required|min:10',
            "password" => $request->password ? 'min:8' : '',
            "confirm_password" => $request->password ? 'min:8|same:password' : '',
        ]);

        $citizen->update([
            'national_id' => $request->national_id,
            'name' => Str::lower($request->name),
            'email' => Str::lower($request->email),
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'password' => $request->password ? Hash::make($request->password) : $citizen->password,
        ]);

        return redirect()->route('citizens')->with('success', "Citizen $citizen->name has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($national_id)
    {
        $citizen = Citizen::where('national_id', $national_id)->firstOrFail();
        $citizen->delete();
        return redirect()->route('citizens')->with('successDelete', "Citizen $citizen->name has been deleted.");
    }
}
