<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');

        body {
            font-family: 'Open Sans', sans-serif
        }

        .search {
            top: 6px;
            left: 10px
        }

        .form-control {
            border: none;
            padding-left: 32px
        }

        .form-control:focus {
            border: none;
            box-shadow: none
        }

        .green {
            color: green
        }

    </style>
</head>

<body>
    <div class="container mt-5 px-2">
        <div class="mb-2 d-flex justify-content-between align-items-center">
            <div class="position-relative"> <span class="position-absolute search"><i class="fa fa-search"></i></span>
                <input class="form-control w-100" placeholder="Search by order#, name...">
            </div>
            <div class="px-2"> <span>Filters <i class="fa fa-angle-down"></i></span> <i
                    class="fa fa-ellipsis-h ms-3"></i> </div>
        </div>
        <div class="table-responsive">
            <a href="movies/create"><button class="btn btn-primary">Add</button></a>
            <table class="table table-responsive table-borderless">
                <thead>
                    <tr class="bg-light">
                        <th scope="col" width="5%">#</th>
                        <th scope="col" width="20%">Name</th>
                        <th scope="col" width="30%">Description</th>
                        <th scope="col" width="20%">Gener</th>
                        <th scope="col" class="text-end" width="10%">do</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movies as $movie)
                        <tr>
                            <td>{{ $movie->id }}</td>
                            <td>{{ $movie->movie_name }}</td>
                            <td>{{ $movie->movie_description }}</td>
                            <td>{{ $movie->movie_gener }}</td>
                            <td>
                                <a href="{{ route('movies.edit', $movie->id) }}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger ms-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
