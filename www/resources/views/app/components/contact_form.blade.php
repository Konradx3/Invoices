@extends('app.basic')

@section('content')
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Formularz kontaktowy</h1>
        <div class="container px-5 my-5">
            <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                <div class="form-floating mb-3">
                    <input class="form-control" id="imie" type="text" placeholder="Imię" data-sb-validations="required" />
                    <label for="imie">Imię</label>
                    <div class="invalid-feedback" data-sb-feedback="imie:required">Imię is required.</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="temat" type="text" placeholder="Temat" data-sb-validations="required" />
                    <label for="temat">Temat</label>
                    <div class="invalid-feedback" data-sb-feedback="temat:required">Temat is required.</div>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="tresc" type="text" placeholder="Treść" style="height: 10rem;" data-sb-validations="required"></textarea>
                    <label for="tresc">Treść</label>
                    <div class="invalid-feedback" data-sb-feedback="tresc:required">Treść is required.</div>
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
