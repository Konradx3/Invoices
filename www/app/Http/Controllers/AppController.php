<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppRequest;
use App\Models\Invoice;
use App\Models\Item;
use Illuminate\Support\Facades\DB;


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

    public function store(StoreAppRequest $request)
    {
        $formItems = $request->input('item');

        $items = [];
        foreach ($formItems['productName'] as $index => $productName)
        {
            $unitNetPrice = floatval($formItems['unitNetPrice'][$index]);
            $vat = floatval($formItems['vat'][$index]);
            $quantity = floatval($formItems['quantity'][$index]);

            $unitGrossPrice = $unitNetPrice * (1 + $vat / 100);
            $netAmount = $unitNetPrice * $quantity;
            $grossAmount = $unitGrossPrice * $quantity;

            $items[] = [
                'productName' => $productName,
                'unitNetPrice' => $unitNetPrice,
                'vat' => $vat,
                'unitGrossPrice' => $unitGrossPrice,
                'quantity' => $quantity,
                'netAmount' => $netAmount,
                'grossAmount' => $grossAmount,
            ];
        }

        DB::beginTransaction();

        try
        {
            $invoice = new Invoice();
            $invoice->invoice_number = $request->input('invoiceNumber');
            $invoice->invoice_date = $request->input('invoiceDate');
            $invoice->company_name = $request->input('companyName');
            $invoice->nip = $request->input('nip');
            $invoice->address = $request->input('address');
            $invoice->zip_code = $request->input('zipCode');
            $invoice->payment_method = $request->input('paymentMethod');
            $invoice->paid = $request->input('paid');
            $invoice->status = 'in-progress';
            $invoice->save();

            $invoiceId = $invoice->id;

            foreach ($items as $item) {
                $itemModel = new Item();
                $itemModel->invoice_id = $invoiceId;
                $itemModel->product_name = $item['productName'];
                $itemModel->unit_net = $item['unitNetPrice'];
                $itemModel->vat = $item['vat'];
                $itemModel->unit_gross = $item['unitGrossPrice'];
                $itemModel->quantity = $item['quantity'];
                $itemModel->net_amount = $item['netAmount'];
                $itemModel->gross_amount = $item['grossAmount'];
                $itemModel->save();
            }

            DB::commit();
            return redirect()->route('app.new')->with('successStore', 'Dane zostały zapisane.');
        }
        catch (\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with('errorStore', 'Wystąpił problem przy zapisie danych.');
        }

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
