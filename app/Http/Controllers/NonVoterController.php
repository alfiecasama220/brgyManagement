<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Voter;
use App\Models\Population;

class NonVoterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Population::whereIn('voterSelect', ['0'])->paginate(6);
        return view('admin.pages.non-voters', compact('tables'));
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
            'voterID' => 'required',
            'name' => 'required',
            'address' => 'required',
            'age' => 'required',
        ]);

        if($validator->passes()) {
            $voters = new Voter();

            $voters->voterID = $request->voterID;
            $voters->name = $request->name;
            $voters->address = $request->address;
            $voters->age = $request->age;
            $voters->save();

            return redirect()->back()->with('success', Session::get('addSuccess'));
        } else {
            return redirect()->back()->with('error', Session::get('addError'));
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
