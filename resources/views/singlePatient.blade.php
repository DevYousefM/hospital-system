<x-app-layout>
    {{-- <body class=" "> --}}
    <div class="mx-3 mt-3">

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
                        <td>{{ $item->opration_name }}</td>
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
                    <video src="{{ asset('app/' . $item->path) }}" class=" mx-1" style="width: 85%;" controls></video>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
