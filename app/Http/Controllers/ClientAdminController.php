<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientAdminController extends Controller
{
    public function clients() {
        return view('admin.pages.clients');
    }

    public function verification(string $id) {
        
    }
}
