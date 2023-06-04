<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{

    public function index()
    {
        return view('app.components.dashboard');
    }

    public function list()
    {
        return view('app.components.list');
    }

    public function new()
    {
        return view('app.components.new_invoice');
    }

    public function profile()
    {
        return view('app.components.profile');
    }


    public function contactForm()
    {
        return view('app.components.contact_form');
    }

}
