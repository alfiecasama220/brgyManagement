<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Models\Certificate;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.certificate');
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
            'birthdate' => 'required',
            'purpose' => 'required',
        ]);

        if($validator) {
            $cert = new Certificate();

            $cert->name = $request->name;
            $cert->email = $request->email;
            $cert->address = $request->address;
            $cert->contact = $request->contactNo;
            $cert->birthdate = $request->birthdate;
            $cert->purpose = $request->purpose;

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
