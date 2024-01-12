<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h1>Hello, Factory!</h1>
    <a href="{{ url('trash') }}" class="btn btn-primary">Trash</a>
    <div class="container m-5">
        <div class="row">
            <div class="col-md-6 table-responsive-md">
                <h1>User Table</h1>
                <table class="table  table-bordered text-center caption-top">
                    <caption class="fw-bold text-primary">User</caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($a as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->name }}</td>
                                <td>{{ $a->email }}</td>
                                <td><a href="{{ url('delete?id=') . base64_encode($a->id) . '&type=' . base64_encode('trash') . '&modelName=' . base64_encode('User') }}"
                                        class="btn btn-danger">Trash</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 table-responsive-md">
                <h1>City Table</h1>
                <table class="table  table-bordered text-center caption-top">
                    <caption class="fw-bold text-primary">City</caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">City</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($b as $b)
                            <tr>
                                <td>{{ $b->id }}</td>
                                <td>{{ $b->city }}</td>
                                <td><a href="{{ url('delete?id=') . base64_encode($b->id) . '&type=' . base64_encode('trash') . '&modelName=' . base64_encode('City') }}"
                                        class="btn btn-danger">Trash</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
