<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class OrderManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.account.index');
    }
}
