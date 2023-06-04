@extends('app.basic')

@section('content')

    <main class="content">
        <div class="container-fluid p-0">

            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">Informacje o firmie</h1>
            </div>
            <div class="row">
                <div class="col-md-4 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-body text-center">
                            <img src="../img/avatars/avatar-4.jpg" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                            <h5 class="card-title mb-0">Kowalski-Bud</h5>
                            <div class="text-muted mb-2">Usługi murarskie</div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <h5 class="h6 card-title">Dane firmy</h5>
                            <div class="col-md-4 col-xl-6">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>NIP:</td>
                                        <td>1234567891</td>
                                    </tr>
                                    <tr>
                                        <td>Adres:</td>
                                        <td>Mickiewicza 2</td>
                                    </tr>
                                    <tr>
                                        <td>Miejscowość:</td>
                                        <td>Kraków</td>
                                    </tr>
                                    <tr>
                                        <td>Kod pocztowy:</td>
                                        <td>01-100</td>
                                    </tr>
                                    <tr>
                                        <td>Nr. rachunku bankowego:</td>
                                        <td>12 3456 7890 1234 5678 8901 2312 4120</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <h5 class="h6 card-title">Odnośniki</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-1"><a href="#">Strona firmowa</a></li>
                                <li class="mb-1"><a href="#">Youtube</a></li>
                                <li class="mb-1"><a href="#">Facebook</a></li>
                                <li class="mb-1"><a href="#">Instagram</a></li>
                                <li class="mb-1"><a href="#">LinkedIn</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

{{--            <div class="container px-5 my-5">--}}
{{--                <form id="contactForm" data-sb-form-api-token="API_TOKEN">--}}
{{--                    <div class="form-floating mb-3">--}}
{{--                        <input class="form-control" id="nazwaFirmy" type="text" placeholder="Nazwa Firmy" data-sb-validations="required" />--}}
{{--                        <label for="nazwaFirmy">Nazwa Firmy</label>--}}
{{--                        <div class="invalid-feedback" data-sb-feedback="nazwaFirmy:required">Nazwa Firmy is required.</div>--}}
{{--                    </div>--}}
{{--                    <div class="form-floating mb-3">--}}
{{--                        <input class="form-control" id="nip" type="text" placeholder="NIP" data-sb-validations="required" />--}}
{{--                        <label for="nip">NIP</label>--}}
{{--                        <div class="invalid-feedback" data-sb-feedback="nip:required">NIP is required.</div>--}}
{{--                    </div>--}}
{{--                    <div class="form-floating mb-3">--}}
{{--                        <input class="form-control" id="adresEMail" type="email" placeholder="Adres E-mail" data-sb-validations="required,email" />--}}
{{--                        <label for="adresEMail">Adres E-mail</label>--}}
{{--                        <div class="invalid-feedback" data-sb-feedback="adresEMail:required">Adres E-mail is required.</div>--}}
{{--                        <div class="invalid-feedback" data-sb-feedback="adresEMail:email">Adres E-mail Email is not valid.</div>--}}
{{--                    </div>--}}
{{--                    <div class="form-floating mb-3">--}}
{{--                        <input class="form-control" id="adres" type="text" placeholder="Adres" data-sb-validations="required" />--}}
{{--                        <label for="adres">Adres</label>--}}
{{--                        <div class="invalid-feedback" data-sb-feedback="adres:required">Adres is required.</div>--}}
{{--                    </div>--}}
{{--                    <div class="form-floating mb-3">--}}
{{--                        <input class="form-control" id="nrBudynkuLokalu" type="text" placeholder="Nr. budynku / lokalu" data-sb-validations="required" />--}}
{{--                        <label for="nrBudynkuLokalu">Nr. budynku / lokalu</label>--}}
{{--                        <div class="invalid-feedback" data-sb-feedback="nrBudynkuLokalu:required">Nr. budynku / lokalu is required.</div>--}}
{{--                    </div>--}}
{{--                    <div class="form-floating mb-3">--}}
{{--                        <input class="form-control" id="kodPocztowy" type="text" placeholder="Kod pocztowy" data-sb-validations="required" />--}}
{{--                        <label for="kodPocztowy">Kod pocztowy</label>--}}
{{--                        <div class="invalid-feedback" data-sb-feedback="kodPocztowy:required">Kod pocztowy is required.</div>--}}
{{--                    </div>--}}
{{--                    <div class="form-floating mb-3">--}}
{{--                        <input class="form-control" id="miejscowosc" type="text" placeholder="Miejscowość" data-sb-validations="required" />--}}
{{--                        <label for="miejscowosc">Miejscowość</label>--}}
{{--                        <div class="invalid-feedback" data-sb-feedback="miejscowosc:required">Miejscowość is required.</div>--}}
{{--                    </div>--}}
{{--                    <div class="form-floating mb-3">--}}
{{--                        <input class="form-control" id="nrKonta" type="text" placeholder="Nr. konta" data-sb-validations="required" />--}}
{{--                        <label for="nrKonta">Nr. konta</label>--}}
{{--                        <div class="invalid-feedback" data-sb-feedback="nrKonta:required">Nr. konta is required.</div>--}}
{{--                    </div>--}}
{{--                    <div class="d-none" id="submitSuccessMessage">--}}
{{--                        <div class="text-center mb-3">--}}
{{--                            <div class="fw-bolder">Form submission successful!</div>--}}
{{--                            <p>To activate this form, sign up at</p>--}}
{{--                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="d-none" id="submitErrorMessage">--}}
{{--                        <div class="text-center text-danger mb-3">Error sending message!</div>--}}
{{--                    </div>--}}
{{--                    <div class="d-grid">--}}
{{--                        <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--            <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>--}}

        </div>
    </main>

@endsection
