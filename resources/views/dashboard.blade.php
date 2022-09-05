<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashborad</title>
    <link rel="stylesheet" href={{ asset('css/patients.css') }}>
</head>

<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="anal">
            <form method="GET" class="input-group mb-3" action="{{ route('dashboard') }}">
                @csrf
                @method('POST')
                <input type="text" class="form-control" name="search" placeholder="Search By ID Or Name"
                    aria-label="Recipient's username" aria-describedby="button-addon2" required>
                <input class="btn btn-outline-primary" type="submit" id="button-addon2" name="searchById"
                    value="ID" />
                <input class="btn btn-outline-primary" type="submit" id="button-addon2" name="searchByName"
                    value="Name" />
                <a class="btn btn-outline-primary allP" href={{ route('dashboard') }}>All
                    Patients
                </a>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Id</th>
                        <th>Opreation</th>
                        <th>Contract</th>
                        <th>Doctor</th>
                        @if (auth()->user()->user_type === 'super')
                            <th>Delete</th>
                        @endif

                    </tr>
                </thead>

                <tbody>
                    @isset($patients)

                        @foreach ($patients as $item)
                            <tr>
                                <td><a href={{ route('patient.show', ['id' => $item->patient_id], false) }}
                                        class="show">{{ $item->patient_name }}</a></td>
                                <td>{{ $item->patient_age }}</td>
                                <td>{{ $item->patient_id }}</td>
                                <td>{{ $item->opration_name }}</td>
                                <td>{{ $item->contract_type }}</td>
                                <td>{{ $item->doctor_name }}</td>
                                @if (auth()->user()->user_type === 'super')
                                    <td><a href={{ route('delete', ['id' => $item->patient_id]) }}><button
                                                class='delBtn'>Delete</button></a></td>
                                @endif
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
            @isset($message)
                <div class="alert alert-danger mt-4" role="alert">
                    {{ $message }}
                </div>
            @endisset
        </div>
    </x-app-layout>

</body>

</html>
