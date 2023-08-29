<x-app>
    <div class="mt-8" style="text-align:center"><a href="javascript:history.back()" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Back to Last Page</a></div> 
    <section class="py-8 max-w-4xl mx-auto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">            
                    <div class="card overflow-x-auto relative shadow-md sm:rounded-lg">
                        <div class="w-full bg-white rounded-lg border shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <div class="card-header">
                            Details of Interviews Period
                            </div>
                            <div class="card-body">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="py-3 px-6">Interview Date</th>
                                            <th scope="col" class="py-3 px-6">Interview Time</th>
                                            <th scope="col" class="py-3 px-6">User Accepted</th>
                                            <th scope="col" class="py-3 px-6">Applicant</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($interviews as $interview)
                                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                                <td class="py-4 px-6">{{ $interview->interviewPeriod->date }}</td>
                                                <td class="py-4 px-6">{{ $interview->time }}</td>
                                                @if ($interview->userAccepted ?? false)
                                                    <td class="py-4 px-6">{{ $interview->userAccepted }}</td>
                                                @else
                                                    <td class="py-4 px-6">N.A.</td>
                                                @endif
                                                @if ($interview->applied_programme_id ?? false)
                                                    <td class="py-4 px-6"><a href="/applications/{{ $interview->appliedProgramme->user->application->id }}" style="color:blue">{{ $interview->appliedProgramme->user->id }}</a></td>
                                                @else
                                                    <td class="py-4 px-6">Empty</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>