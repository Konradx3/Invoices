<?php

namespace App\Http\Controllers;

use App\Models\Invoice;

class AppController extends Controller
{

    public function index()
    {
        return view('app.components.dashboard');
    }

    public function list()
    {
        $invoices = Invoice::getInvoiceData();

        return view('app.components.list', ['invoices' => $invoices]);
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
