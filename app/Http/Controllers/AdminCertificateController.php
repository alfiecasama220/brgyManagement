<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Certificate;

class AdminCertificateController extends Controller
{
    public function index() {
        $tables = Certificate::all();
        return view('admin.pages.certificates', compact('tables'));
    }

    public function certificatesDelete(string $id) {
        $id = Certificate::findOrFail($id);

        if($id) {
            $id->delete();
            return redirect()->intended(route('certificates'))->with('success', Session::get('deleteSuccess'));
        }
    }
}
