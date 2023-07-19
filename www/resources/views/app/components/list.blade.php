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
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->created_at }}</td>
                                <td class="d-none d-xl-table-cell">{{ $invoice->invoice_number }}</td>
                                <td class="d-none d-xl-table-cell">{{ $invoice->company_name }}</td>
                                <td><span class="badge bg-success">{{ $invoice->status }}</span></td>
                                <td class="d-none d-md-table-cell">
                                    <div class="btn-group">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Small button
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
