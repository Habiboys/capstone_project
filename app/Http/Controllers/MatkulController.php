<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function view()
    {
        return view('admin.matkul');
    }
}
