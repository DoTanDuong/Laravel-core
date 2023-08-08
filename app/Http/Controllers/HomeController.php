<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return redirect()->route('account.dashboard');
    }

    public function store(Request $request)
    {
        if ( $request->isValid()) {
            Account::create($request);
        }

    }
}
