<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Officials;
use App\Models\Positions;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OfficialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $tables = Officials::all();
        $position = Positions::all();
        $tables = Officials::with('position')->get();
        return view(('admin.pages.officials'), compact(['tables', 'position']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Positions::all();
        return view('admin.pages.positions', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'position' => 'required',
        ]);

        if($validator->passes()) {
            $officials = new Officials();
            $officials->name = $request->name;
            $officials->position_id = $request->position;
            $officials->save();

            return redirect()->back()->with('success', Session::get('addSuccess'));
        } else {
            return redirect()->back()->with('error', Session::get('addError'));
        }
    }

    public function storePosition(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if($validator->passes()) {
            $officials = new Positions();
            $officials->title = $request->name;
            $officials->save();

            return redirect()->back()->with('success', Session::get('addSuccess'));
        } else {
            return redirect()->back()->with('error', Session::get('addError'));
        }
    }

    public function deletePosition(string $id) {
        $id = Positions::findOrFail($id);

        if($id) {
            $id->delete();

            return redirect()->back()->with('success', Session::get('deleteSuccess'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        // return view('admin.pages.officials', compact('position'));  
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
        $id = Officials::findOrFail($id);

        if($id) {
            $id->delete();

            return redirect()->back()->with('success', Session::get('deleteSuccess'));
        }
    }
}
