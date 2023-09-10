@extends('app.basic')

@section('content')

    <div class="container">
        <header>
            <h1>Faktura</h1>
            <address>
                <p>Twoja nazwa firmy</p>
                <p>Adres: Twój adres</p>
                <p>Tel: +48 123 456 789</p>
                <p>NIP:</p>
            </address>
        </header>
        <article>
            <h1>Odbiorca</h1>
            <table class="address">
                <tr>
                    <td>
                        <b>Nazwa firmy:</b> {{ $invoice->company_name }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>NIP:</b> {{ $invoice->nip }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Kod pocztowy:</b> {{ $invoice->zip_code }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Adres:</b> {{ $invoice->address }}
                    </td>
                </tr>

            </table>
            <table class="meta">
                <tr>
                    <th><label for="invoiceNumber">Nr. Faktury</label></th>
                    <td>
                        {{ $invoice->invoice_number }}
                    </td>
                </tr>
                <tr>
                    <th><label for="invoiceDate">Data wystawienia</label></th>
                    <td>
                        {{ $invoice->invoice_date }}
                    </td>
                </tr>
                <tr>
                    <th><label for="paymentMethod">Forma płatności</label></th>
                    <td>
                        {{ $invoice->payment_method }}
                    </td>
                </tr>
            </table>
            <table class="table">
                <thead>
                <tr>
                    <th><span>Przedmiot / Usługa</span></th>
                    <th><span>Netto sztuka</span></th>
                    <th><span>VAT</span></th>
                    <th><span>Brutto sztuka</span></th>
                    <th><span>Ilość</span></th>
                    <th><span>Suma netto</span></th>
                    <th><span>Suma brutto</span></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->unit_net }} PLN</td>
                        <td>{{ $item->vat }} %</td>
                        <td>{{ $item->unit_gross }} PLN</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->net_amount }} PLN</td>
                        <td>{{ $item->gross_amount }} PLN</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <table class="balance">
                <tr>
                    <th><span>Łącznie</span></th>
                    <td><span id="totalGrossSpan"></span><span data-prefix>{{ $balance['amountGross'] }} PLN</span></td>
                </tr>
                <tr>
                    <th><span >Łącznie VAT</span></th>
                    <td><span id="totalVatSpan"></span><span data-prefix>{{ $balance['amountVat'] }} PLN</span></td>
                </tr>
                <tr>
                    <th><label for="paid">Zapłacone</label></th>
                    <td>
                        {{ $invoice->paid }} PLN
                    </td>
                </tr>
                <tr>
                    <th><span>Do zapłaty</span></th>
                    <td><span id="amountDueSpan"></span><span data-prefix>{{ $balance['amountDue'] }} PLN</span></td>
                </tr>
            </table>
        </article>
        <aside>
            <div class="signature-container">
                <div class="signature-field">
                    <h3 class="header">Nadawca</h3>
                    <!-- Pole do odręcznego podpisu po lewej stronie -->
                </div>
                <div class="signature-field">
                    <h3 class="header">Odbiorca</h3>
                    <!-- Pole do odręcznego podpisu po prawej stronie -->
                </div>
            </div>
        </aside>
    </div>

@endsection
