@extends('app.basic')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Nowa faktura</h1>

        <div class="container px-5 my-5">
        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
            <div class="form-floating mb-3">
                <input class="form-control" id="nrFaktury" type="text" placeholder="Nr. faktury" data-sb-validations="required" />
                <label for="nrFaktury">Nr. faktury</label>
                <div class="invalid-feedback" data-sb-feedback="nrFaktury:required">Nr. faktury is required.</div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="nazwaFirmy" type="text" placeholder="Nazwa Firmy" data-sb-validations="required" />
                <label for="nazwaFirmy">Nazwa Firmy</label>
                <div class="invalid-feedback" data-sb-feedback="nazwaFirmy:required">Nazwa Firmy is required.</div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="nip" type="text" placeholder="NIP" data-sb-validations="required" />
                <label for="nip">NIP</label>
                <div class="invalid-feedback" data-sb-feedback="nip:required">NIP is required.</div>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="adres" type="text" placeholder="Adres" data-sb-validations="" />
                <label for="adres">Adres</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="nrBudynkuLokalu" type="text" placeholder="Nr. budynku / lokalu" data-sb-validations="" />
                <label for="nrBudynkuLokalu">Nr. budynku / lokalu</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="kodPocztowy" type="text" placeholder="Kod pocztowy" data-sb-validations="" />
                <label for="kodPocztowy">Kod pocztowy</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="kraj" type="text" placeholder="Kraj" data-sb-validations="" />
                <label for="kraj">Kraj</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="miejscowosc" type="text" placeholder="Miejscowość" data-sb-validations="" />
                <label for="miejscowosc">Miejscowość</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="formaPlatnosci" aria-label="Forma płatności">
                    <option value="Przelew 7 dni">Przelew 7 dni</option>
                    <option value="Przelew 14 dni">Przelew 14 dni</option>
                    <option value="Gotówka">Gotówka</option>
                </select>
                <label for="formaPlatnosci">Forma płatności</label>
            </div>
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center mb-3">
                    <div class="fw-bolder">Form submission successful!</div>
                    <p>To activate this form, sign up at</p>
                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                </div>
            </div>
            <div class="d-none" id="submitErrorMessage">
                <div class="text-center text-danger mb-3">Error sending message!</div>
            </div>
            <div class="d-grid">
                <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
