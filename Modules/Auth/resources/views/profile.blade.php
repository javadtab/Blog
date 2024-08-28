<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href=""><strong>{{ Auth::user()->name }}</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Home Page</a>
                    </li>
                    @can('create post')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/posts/create') }}">Create Post</a>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Posts List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profile/edit') }}">Edit Profile</a>
                    </li>
                    @can('read user')
                        <li class="nav-item">
                            <a class= "nav-link" href= "/users">Users</a>
                        </li>
                    @endcan
                </ul>
                <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                    @csrf
                    @method ('Delete')
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div style="margin: auto">
        <h1><strong> ▶️Personal information :</strong></h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">IP</th>
                    <th scope="col">Email</th>
                    <th scope="col">PhoneNumber</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ Auth::user()->name }}</td>
                    <td>{{ Auth::user()->ip }}</td>
                    <td>{{ Auth::user()->email }}</td>
                    <td>{{ Auth::user()->phonenumber }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    <hr>
    <h1><strong> ▶️Location information :</strong></h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Country Name</th>
                <th scope="col">Country Code</th>
                <th scope="col">Region Code</th>
                <th scope="col">Region Name</th>
                <th scope="col">Neighborhood</th>
                <th scope="col">Zipcode</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $data->countryName }}</td>
                <td>{{ $data->countryCode }}</td>
                <td>{{ $data->regionCode }}</td>
                <td>{{ $data->regionName }}</td>
                <td>{{ $data->cityName }}</td>
                <td>{{ $data->zipCode }}</td>
                <td>{{ $data->latitude }}</td>
                <td>{{ $data->longitude }}</td>
            </tr>
        </tbody>
    </table>
    <img style="display:block  ;margin: auto;background-color: hsl(0, 0%, 90%);"
        src="data:image/png;base64,{{ $map }}">
    <!--تبدیل کد باینری به عکس و نشان دادن اون 👆👆-->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>
