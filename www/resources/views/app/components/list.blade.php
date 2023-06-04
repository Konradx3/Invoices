@extends('app.basic')

@section('content')

    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Lista wystawionych faktur</h1>

        <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
                <div class="card flex-fill">
                    <table class="table table-hover my-0">
                        <thead>
                        <tr>
                            <th>Data wystawienia</th>
                            <th class="d-none d-xl-table-cell">Numer Faktury</th>
                            <th class="d-none d-xl-table-cell">Nazwa firmy</th>
                            <th>Status</th>
                            <th class="d-none d-md-table-cell">Więcej</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>01/01/2021</td>
                            <td class="d-none d-xl-table-cell">FA/46/2023</td>
                            <td class="d-none d-xl-table-cell">Kowalski-Bud</td>
                            <td><span class="badge bg-success">Zakończona</span></td>
                            <td class="d-none d-md-table-cell">
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropdown link
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
