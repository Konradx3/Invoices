<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Pierwszy plik</title>

    <link href="../css/invoice.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">

    <div class="main">

        <main class="content">

            <div class="container">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Date</th>
                        <th scope="col">Random</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <td>{{ $title }}</td>
                            <td>{{ $date }}</td>
                            <td>{{ $random }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </main>
    </div>
</div>

</body>
