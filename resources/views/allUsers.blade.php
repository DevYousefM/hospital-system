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
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Rule</th>
                        @if (auth()->user()->user_type === 'super')
                            <th>Delete</th>
                        @endif

                    </tr>
                </thead>

                <tbody>

                    @foreach ($users as $item)
                        @if (!($item->user_type === 'patient'))
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->user_type === 'super' ? 'Super Admin' : 'Doctor' }}</td>
                            @if (auth()->user()->user_type === 'super')
                                <td><a href={{ route('deleteUser', ['id' => $item->username]) }}><button class='delBtn'
                                            onclick="return confirm('Delete This Patient?');">Delete</button></a>
                                </td>
                        </tr>
                        @endif
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-app-layout>

</body>

</html>
