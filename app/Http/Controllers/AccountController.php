<?php

namespace App\Http\Controllers;

class AccountController extends Controller
{
    public function index()
    {
        return redirect()->route('account');
    }
}
