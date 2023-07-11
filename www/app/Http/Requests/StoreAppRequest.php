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
            'nip' => 'required|string|regex:/^\d{10}$/',
            'zipCode' => 'required|string',
            'address' => 'required|string',
            'invoiceNumber' => 'required|string|min:2',
            'invoiceDate' => 'required|date',
            'paymentMethod' => [
                'required',
                Rule::in(Invoice::getAvailablePaymentMethod()),
            ],
            'paid' => 'numeric|min:0',
        ];
    }
}
