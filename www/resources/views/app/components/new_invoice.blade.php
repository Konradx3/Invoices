@extends('app.basic')

@section('content')
<div class="container">
    <form method="POST" action="{{route('app.store')}}">
        @csrf
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
                        <input class="has-validation @error('companyName') is-invalid @enderror" type="text" name="companyName" placeholder="Nazwa firmy" required>
                        @error('companyName')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="has-validation @error('nip') is-invalid @enderror" type="text" name="nip" placeholder="NIP">
                        @error('nip')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="has-validation @error('zipCode') is-invalid @enderror" type="text" name="zipCode" placeholder="Kod pocztowy i miejscowość" required>
                        @error('zipCode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="has-validation @error('address') is-invalid @enderror" type="text" name="address" placeholder="Adres" required>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>

            </table>
            <table class="meta">
                <tr>
                    <th><label for="invoiceNumber">Nr. Faktury</label></th>
                    <td>
                        <input class="has-validation @error('invoiceNumber') is-invalid @enderror" type="text" name="invoiceNumber" id="invoiceNumber" placeholder="FA/31/07/2023" required>
                        @error('invoiceNumber')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th><label for="invoiceDate">Data wystawienia</label></th>
                    <td>
                        <input class="has-validation @error('invoiceDate') is-invalid @enderror" type="date" name="invoiceDate" id="invoiceDate" placeholder="12-07-2023" required>
                        @error('invoiceDate')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th><label for="paymentMethod">Forma płatności</label></th>
                    <td>
                        <div class="col-8 col-md-4">
                            <select class="custom-select custom-select-sm has-validation @error('paymentMethod') is-invalid @enderror" id="paymentMethod" name="paymentMethod">
                                <option selected value="cash">Gotówka</option>
                                <option value="transfer7">Przelew 7 dni</option>
                                <option value="transfer14">Przelew 14 dni</option>
                            </select>
                            @error('paymentMethod')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </td>
                </tr>
            </table>
            <table class="inventory">
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
                <tr>
                    <td>
                        <a class="cut">Usuń</a>
                        <input class="has-validation @error('productName') is-invalid @enderror" type="text" name="productName[]" placeholder="Konsultacja" required>
                        @error('productName')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                    <td>
                        <input class="has-validation @error('unitNetPrice') is-invalid @enderror" type="text" name="unitNetPrice[]" placeholder="100.00" required><span data-prefix> PLN</span>
                        @error('unitNetPrice')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                    <td>
                        <input class="has-validation @error('vat') is-invalid @enderror" type="number" name="vat[]" placeholder="23" required><span> %</span>
                        @error('vat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                    <td><span class="unitGrossPrice"></span><span data-prefix> PLN</span></td>
                    <td>
                        <input class="has-validation @error('quantity') is-invalid @enderror" type="number" name="quantity[]" placeholder="2" required>
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                    <td><span class="rowNetPrice"></span><span data-prefix> PLN</span></td>
                    <td><span class="rowGrossPrice"></span><span data-prefix> PLN</span></td>
                </tr>
                </tbody>
            </table>
            <a class="add">Dodaj kolejny</a>
            <table class="balance">
                <tr>
                    <th><span>Łącznie</span></th>
                    <td><span id="totalGrossSpan"></span><span data-prefix> PLN</span></td>
                </tr>
                <tr>
                    <th><span >Łącznie VAT</span></th>
                    <td><span id="totalVatSpan"></span><span data-prefix> PLN</span></td>
                </tr>
                <tr>
                    <th><label for="paid">Zapłacone</label></th>
                    <td>
                        <input class="has-validation @error('paid') is-invalid @enderror" type="text" name="paid" id="paymentInput" value="0" placeholder="00.00"><span data-prefix> PLN</span>
                        @error('paid')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th><span >Do zapłaty</span></th>
                    <td><span id="amountDueSpan"></span><span data-prefix> PLN</span></td>
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
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-primary mt-4" type="submit">Generuj fakturę</button>
        </div>
    </form>
</div>


@endsection
