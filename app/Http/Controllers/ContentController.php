<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contents;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.addContent');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payload = $request->all();
        $Validator = Validator::make($payload, [
            'title' => 'required',
            'counts' => 'required',
            'description' => 'required',
            'selectedIconInput' => 'required',
         ]);

         if ($Validator->passes()) {
            Contents::create([
                'title' => $payload['title'],
                'count' => $payload['counts'],
                'description' => $payload['description'],
                'icons' => $payload['selectedIconInput'],
            ]);

         }

        return redirect()->intended(route('dashboard'))->with('success', Session::get('addSuccess'));

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
        $user = Contents::find($id);

        if($user) {
            $user->delete();
            return redirect()->back()->with('success', Session::get('deleteSuccess'));;
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }
}
