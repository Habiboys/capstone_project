<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function view()
    {
        return view('admin.tugas');
    }
}
