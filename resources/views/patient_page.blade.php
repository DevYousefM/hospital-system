<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informations</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
</head>

<body class=" mx-3 mt-3">
    <div class="space-y-1">
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                                this.closest('form').submit();"
                class="btn btn-danger">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>
    </div>
    @foreach ($data as $item)
        <table class="table mb-0">
            <thead>
                <tr>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Patient Id</th>
                    <th scope="col">Patient Age</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $item->patient_name }}</td>
                    <td>{{ $item->patient_id }}</td>
                    <td>{{ $item->patient_age }}</td>
                </tr>
            </tbody>
        </table>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Opration</th>
                    <th scope="col">Contract</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $item->opration_name}}</td>
                    <td>{{ $item->contract_type }}</td>
                    <td>{{ $item->doctor_name }}</td>
                    <td>{{ $item->entry_date }}</td>
                </tr>
            </tbody>
        </table>
    @endforeach
    <div class="reports">
        @foreach ($reports as $item)
            <div class="btn btn-primary no-underline">
                <a href={{ asset('app/' . $item->path) }} class=" text-white no-underline">Download Reports</a>
            </div>
        @endforeach
    </div>
    <div class="w-full mt-2">
        <h2>Videos</h2>
        <div class="w-full" style="display: flex;justify-content: center;">
            @foreach ($vids as $item)
                <video src="{{ asset('app/' . $item->path) }}" style="width: 85%;" controls></video>
            @endforeach
        </div>
    </div>
</body>

</html>
