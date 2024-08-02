<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Population;

class PopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Population::all();

        return view('admin.pages.populations', compact(['tables']));
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
            'address' => 'required',
            'birthdate' => 'required',
            'role' => 'required',
            'voterID' => 'nullable',
        ]);

        if($validator->passes()) {
            $populatioon = new Population();

            $populatioon->name = $request->name;
            $populatioon->address = $request->address;
            $populatioon->birthdate = $request->birthdate;
            $populatioon->voterSelect = $request->role;

            if($request->voterID == null) {
                $populatioon->voterID = "N/A";
            } else {
                $populatioon->voterID = $request->voterID;
            }
            
            $populatioon->save();

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
        $populations = Population::find($id);

        if($populations) {
            $populations->delete();
            return redirect()->back()->with('success', Session::get('deleteSuccess'));
        } else {
            return redirect()->back()->with('error', Session::get('addError'));
        }
    }
}
