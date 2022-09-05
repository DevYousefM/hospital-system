<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Patient</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href={{ asset('css/login.css') }}>

</head>

<body>
    <x-auth-card>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('patients.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="patient_name" :value="__('Patient Name')" />

                <x-input id="patient_name" class="block mt-1 w-full" type="text" name="patient_name"
                    :value="old('patient_name')" required autofocus />
            </div>
            {{-- Age --}}
            <div>
                <x-label for="patient_age" :value="__('Patient Age')" />

                <x-input id="patient_age" class="block mt-1 w-full" type="number" name="patient_age" :value="old('patient_age')"
                    required />
            </div>

            {{-- ID --}}
            <div>
                <x-label for="patient_id" :value="__('Patient ID')" />

                <x-input id="patient_id" class="block mt-1 w-full" type="number" name="patient_id" :value="old('patient_id')"
                    required />
            </div>

            {{-- Doctor Name --}}
            <div>
                <x-label for="doctor_name" :value="__('Doctor Name')" />

                <x-input id="doctor_name" class="block mt-1 w-full" type="text" name="doctor_name" :value="old('doctor_name')"
                    required autofocus />
            </div>

            {{-- Entry Date --}}
            <div>
                <x-label for="entry_date" :value="__('Entry Date')" />

                <x-input id="entry_date" class="block mt-1 w-full" type="date" name="entry_date" :value="old('entry_date')"
                    required autofocus />
            </div>

            {{-- Operation Name --}}
            <div class="mt-4">
                <x-label for="opration_name" :value="__('Operation')" />
                <input type="radio" name="opration_name" value="PCI">
                <label for="PCI">PCI</label>
                <input type="radio" name="opration_name" value="Diagnostic">
                <label for="Diagnostic">Diagnostic</label>
            </div>

            {{-- Contract Type --}}
            <div class="mt-4">
                <x-label for="contract_type" :value="__('Contract Type')" />
                <input type="radio" name="contract_type" value="State Expense">
                <label for="state_expense">State Expense</label>
                <input type="radio" name="contract_type" value="Health Insurance">
                <label for="health_insurance">Health Insurance</label>
            </div>

            {{-- PDF --}}
            <div>
                <x-label for="reports" :value="__('Reports')" />

                <x-input id="reports" class="block mt-1 w-full" type="file" name="reports" :value="old('reports')" />
            </div>

            {{-- Videos --}}
            <div>
                <x-label for="videos" :value="__('Videos')" />
                <x-input id="videos" class="block mt-1 w-full" type="file" name="videos[]" :value="old('videos')"
                    multiple />
            </div>

            <div class="progress mt-2" id="progress_bar" style="display:none;height:50px; line-height: 50px;">
                <div class="progress-bar" id="progress_bar_process" role="progressbar" style="width:0%;">0%</div>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('dashboard') }}">
                    {{ __('Dashboard') }}
                </a>
                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
        <x-slot name="footer">
            <p class="mt-3 footer" style="font-family: 'Almarai', sans-serif;font-size:18px;text-align:center">
                تحت إشراف د/ محمود معتوق
                <br>
                مشرف القسطرة أ/ صلاح دانيل
                <br>
                إعداد وتنفيذ أ/ احمد عاطف سنوسي
            </p>
        </x-slot>
    </x-auth-card>
    <script src="{{ url('js/upload_progress.js') }}"></script>

</body>
