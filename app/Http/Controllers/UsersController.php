<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AuthValidation;
use App\Http\Requests\UserRequest;

use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = User::all();
        return view('admin.pages.users', compact('tables'));
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
    public function store(Request $request, AuthValidation $requestInput)
    {

        $validator = Validator::make($request->all(), $requestInput->rules());

        if($validator->passes()) {
            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->role = $request->role;
            $user->save();

            return redirect()->back()->with('success', Session::get('addSuccess'));
        } else {
            return redirect()->back()->with('error', Session::get('addError'));
        } 

    }

    public function messages() {
        return [
            'email.unique' => 'This email was taken from another user',
        ];
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
        $user = User::find($id);

        if($user) {
            $user->delete();
            return redirect()->back()->with('success', Session::get('deleteSuccess'));;
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }
}
