@props(['programmes'])

<form method="POST" action="/appliedProgrammes">
    @csrf
    <table class="table table-bordered">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th>Rank</th>
                <th>Apply Programme</th>
                <th class="flex">Apply Year</th>
            </tr>
        </thead>
        <tbody>
            <x-table.appliedProgrammes-row :number="1" :programmes="$programmes"/>
            <x-table.appliedProgrammes-row :number="2" :programmes="$programmes"/>
            <x-table.appliedProgrammes-row :number="3" :programmes="$programmes"/>
        </tbody>
    </table>  
    
    <div class="d-flex justify-content-center">
        <x-form.button>Submit</x-form.button>
    </div>
</form>