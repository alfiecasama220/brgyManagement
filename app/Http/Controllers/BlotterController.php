<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Blotter;

class BlotterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.blotter');
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'addres' => 'required',
            'contactNo' => 'required',
            'purpose' => 'required',
            'image' => 'nullable|file|max:7128',
        ]);

        if($validator) {
            $cert = new Blotter();

            $path = $request->file('image')->store('images','public');

            $cert->name = $request->name;
            $cert->email = $request->email;
            $cert->address = $request->address;
            $cert->contact = $request->contactNo;
            $cert->purpose = $request->purpose;
            $cert->image = $path;

            $cert->save();

            return redirect()->back()->with('success', 'Success! Your request has been added');
            
        } else {
            return redirect()->back()->with('error', 'Failed! Your request is not added');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
