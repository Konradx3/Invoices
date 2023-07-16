<?php

namespace App\Http\Requests;

use App\Models\Invoice;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAppRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'companyName' => 'required|string|min:2',
            'nip' => 'string|regex:/^\d{10}$/',
            'zipCode' => 'required|string',
            'address' => 'required|string',
            'invoiceNumber' => 'required|string|min:2',
            'invoiceDate' => 'required|date',
            'paymentMethod' => [
                'required',
                Rule::in(Invoice::getAvailablePaymentMethod()),
            ],
            'paid' => 'numeric|min:0',
            'item.productName.*' => 'required|string',
            'item.unitNetPrice.*' => 'required|numeric|min:0.01|regex:/^\d+(\.\d{1,2})?$/',
            'item.vat.*' => 'required|numeric',
            'item.quantity.*' => 'required|numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'companyName.required' => 'To pole jest wymagane.',
            'companyName.string' => 'To pole może zawierać tylko ciąg znaków.',
            'companyName.min' => 'To pole musi zawierać minimum :min znaki.',
            'nip.string' => 'To pole może zawierać tylko ciąg znaków.',
            'nip.regex' => 'Nieprawidłowy format NIP.',
            'zipCode.required' => 'To pole jest wymagane.',
            'zipCode.string' => 'To pole może zawierać tylko ciąg znaków.',
            'address.required' => 'To pole jest wymagane.',
            'address.string' => 'To pole może zawierać tylko ciąg znaków.',
            'invoiceNumber.required' => 'To pole jest wymagane.',
            'invoiceNumber.string' => 'To pole może zawierać tylko ciąg znaków.',
            'invoiceNumber.min' => 'To pole musi zawierać minimum :min znaki.',
            'invoiceDate.required' => 'To pole jest wymagane.',
            'invoiceDate.date' => 'Nieprawidłowy format daty.',
            'paymentMethod.required' => 'To pole jest wymagane.',
            'paymentMethod.in' => 'Nieprawidłowa metoda płatności.',
            'paid.numeric' => 'To pole musi być liczbą.',
            'paid.min' => 'To pole musi być większe lub równe :min.',
            'productName.*.required' => 'To pole jest wymagane.',
            'productName.*.string' => 'To pole może zawierać tylko ciąg znaków.',
            'unitNetPrice.*.required' => 'To pole jest wymagane.',
            'unitNetPrice.*.numeric' => 'To pole musi być liczbą.',
            'unitNetPrice.*.min' => 'To pole musi być większe lub równe :min.',
            'unitNetPrice.*.regex' => 'Nieprawidłowy format ceny jednostkowej.',
            'vat.*.required' => 'To pole jest wymagane.',
            'vat.*.numeric' => 'Nieprawidłowy format podatku VAT.',
            'quantity.*.required' => 'To pole jest wymagane.',
            'quantity.*.numeric' => 'Nieprawidłowy format ilości.',
        ];
    }
}
