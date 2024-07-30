<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class ClientController extends Controller
{
    public function index() {
        $tables = Announcement::all();
        return view('client.index', compact('tables'));
    }

    public function about() {
        return view('client.about');
    }
}
