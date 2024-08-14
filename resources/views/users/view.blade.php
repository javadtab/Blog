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
            <a class="navbar-brand" href=""><strong>{{ $user->name }} s' Profile</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-danger" href="{{ route('users') }}">Back</a>
                    </li>
            </div>
        </div>
    </nav>
    <div style="margin: auto">
        <h1 ><strong> 🙍‍♂️Personal information :</strong></h1>
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
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->ip }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phonenumber}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    <hr>
    <h1><strong> 🚩Location information :</strong></h1>
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
                <td>{{$data->countryName }}</td>
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
    <link rel="stylesheet" href="https://static.neshan.org/sdk/leaflet/v1.9.4/neshan-sdk/v1.0.8/index.css"/>
    <script src="https://static.neshan.org/sdk/leaflet/v1.9.4/neshan-sdk/v1.0.8/index.js"></script>

    <style>
        body {
            height: 100vh;
            width: 100vw;
            margin: 0;
        }

        #map {
            height: 50%;
            width: 90%;
        }
    </style>
</head>
<body>
<div id="map"></div>
<script>
    const map = new L.map("map", {
        key: "web.611a004ba12a434ebcaf3bcb33d19ce8",
        maptype: "neshan",
        zoom : 14.5,
        width : 620,
        height : 400,
        center: [{{ $data->latitude }},{{ $data->longitude }}],
        markerToken : "261142.bobkxMMW",
    });
    var marker = L.marker([{{ $data->latitude }},{{ $data->longitude }}]).addTo(map);

    var circle = L.circle([{{ $data->latitude }},{{ $data->longitude }}], {
    color: 'black',
    fillColor: '#f04',
    fillOpacity: 0.5,
    radius: 300
}).addTo(map);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
</body>
