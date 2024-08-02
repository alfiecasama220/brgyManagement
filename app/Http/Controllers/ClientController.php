<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Officials;
use App\Models\Positions;

class ClientController extends Controller
{
    public function index() {
        $tables = Announcement::all();
        $officials = Officials::with('position')->get();
        return view('client.index', compact(['tables', 'officials']));
    }

    public function about() {
        return view('client.about');
    }
}
