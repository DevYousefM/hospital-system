<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex mt-8" style="justify-content: space-evenly">
        <div class="card bg-white text-center shadow" style="width: 18rem;padding:15px">
            <div class="card-body">
                <h1 class="card-title text-blue-400" style="font-size: 50px;color:rgb(0, 149, 255)">
                    {{ $operation_a }}</h1>
                <p class="card-text">Operation PCI</p>
            </div>
        </div>
        <div class="card bg-white text-center shadow" style="width: 18rem;padding:15px">
            <div class="card-body">
                <h1 class="card-title text-blue-400" style="font-size: 50px;color:rgb(0, 149, 255)">
                    {{ $operation_b }}</h1>
                <p class="card-text">Operation Diagnostic</p>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex mt-6" style="justify-content: space-evenly">
        <div class="card bg-white text-center shadow" style="width: 18rem;padding:15px">
            <div class="card-body">
                <h1 class="card-title text-blue-400" style="font-size: 50px;color:rgb(0, 149, 255)">
                    {{ $operations }}</h1>
                <p class="card-text">The Patients</p>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex mt-6" style="justify-content: space-evenly">
        <div class="card bg-white text-center shadow" style="width: 18rem;padding:15px">
            <div class="card-body">
                <h1 class="card-title text-blue-400" style="font-size: 50px;color:rgb(0, 149, 255)">
                    {{ $state_expense }}</h1>
                <p class="card-text">State Expense</p>
            </div>
        </div>
        <div class="card bg-white text-center shadow" style="width: 18rem;padding:15px">
            <div class="card-body">
                <h1 class="card-title text-blue-400" style="font-size: 50px;color:rgb(0, 149, 255)">
                    {{ $health_insurance }}</h1>
                <p class="card-text">Health Insurance</p>
            </div>
        </div>
    </div>

</x-app-layout>
