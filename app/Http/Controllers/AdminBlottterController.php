<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blotter;

class AdminBlottterController extends Controller
{
    public function index() {
        $tables = Blotter::all();
        return view('admin.pages.blotter', compact('tables'));
    }

    public function deleteBlotter(string $id) {
        
    }
}
