<!doctype html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fakturkowo') }}</title>
    <link rel="stylesheet" href="../../css/theme.min.css">

</head>
<body class="d-flex h-100 w-100 bg-black text-white" data-bs-spy="scroll" data-bs-target="#navScroll">
    <div class="h-100 container-fluid">
        <div class="h-100 row d-flex align-items-stretch">
            <div class="col-12 col-md-7 col-lg-6 col-xl-5 d-flex align-items-start flex-column px-vw-5">
                <header class="mb-auto py-vh-2 col-12">
                    <a class="navbar-brand pe-md-4 fs-4 col-12 col-md-auto text-center" href="{{ url('/') }}">
                        <span class="ms-md-1 mt-1 fw-bolder me-md-5">{{ __('layout.project-name') }}</span>
                    </a>
                </header>
                <main class="mb-auto col-12">
                    <h1>Zarejesrtuj nowe konto</h1>
                    <form class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control form-control-lg bg-gray-800 border-dark" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control form-control-lg bg-gray-800 border-dark" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3 form-check py-3">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">If you really don´t want any newsletter <strong>check this box</strong>. Then you just agree to receive our marketing mails and product stuff. If you check this box <strong>we will not send out our newsletter</strong> to you at all...on mondays.</label>
                            </div>
                            <button type="submit" class="btn btn-white btn-xl mb-4">Submit</button>
                        </div>
                    </form>
                </main>
            </div>
            <div class="col-12 col-md-5 col-lg-6 col-xl-7 gradient"></div>
        </div>
    </div>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>
