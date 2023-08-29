<x-app>
    <section class="py-8 max-w-4xl mx-auto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">                               
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">Rank</th>
                                    <th scope="col" class="py-3 px-6">Applied Programme</th>
                                    <th scope="col" class="py-3 px-6">Applied Year</th>
                                    <th scope="col" class="py-3 px-6">Status</th>
                                    <th scope="col" class="py-3 px-6">Interview</th>
                                    <th scope="col" class="py-3 px-6">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($appliedProgrammes->isEmpty())
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700"> 
                                        <th colspan="6" style="text-align:center">
                                            No Any Applied Programmes<br>
                                        <a href="/appliedProgrammes/create" style="color:blue">>>> Go to Apply Programmes <<<</a>
                                        </th> 
                                    </tr>
                                @endif

                                @foreach ($appliedProgrammes as $appliedProgramme)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $appliedProgramme->rank }}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{ $appliedProgramme->programme->name }}
                                        </td>
                                        <td class="py-4 px-6">
                                            Year {{ $appliedProgramme->year }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $appliedProgramme->status }}
                                        </td>
                                        @if ($appliedProgramme->status == "Approved")
                                            @if ($appliedProgramme->autoAssigned == "true")
                                                @if ($appliedProgramme->interview ?? false)
                                                    @if ($appliedProgramme->interview->userAccepted == "Requesting")
                                                        <td class="py-4 px-6">
                                                            Arranged
                                                        </td>
                                                        <td class="py-4 px-6">
                                                            <button class="btn-block bg-yellow-300 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-yellow-400 mb-2" data-toggle="modal" data-target="#checkInterviewDetailModal{{ $appliedProgramme->id }}">Interview Detail</button>
                                                            <button class="btn-block bg-green-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-green-600 mb-2" data-toggle="modal" data-target="#acceptInterviewModal{{ $appliedProgramme->id }}">Accept Interview</button>
                                                            <button class="btn-block bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-600 mb-2" data-toggle="modal" data-target="#rejectInterviewModal{{ $appliedProgramme->id }}">Reject Interview</button>
                                                            @if ($appliedProgramme->changingTime == "false")
                                                            <button class="btn-block bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600" data-toggle="modal" data-target="#changeInterviewTimeModal{{ $appliedProgramme->id }}">Change Time</button>
                                                            @endif
                                                        </td>
                                                    @elseif ($appliedProgramme->interview->userAccepted == "Accepted")
                                                        <td class="py-4 px-6">
                                                            Accepted
                                                        </td>
                                                        <td class="py-4 px-6">
                                                            <button class="btn-block bg-yellow-300 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-yellow-400 mb-2" data-toggle="modal" data-target="#checkInterviewDetailModal{{ $appliedProgramme->id }}">Interview Detail</button>
                                                        </td>
                                                    @endif
                                                @else
                                                    <td class="py-4 px-6">
                                                        Rejected
                                                    </td>
                                                    <td class="py-4 px-6">
                                                        <button class="btn-block bg-gray-400 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl" disabled>No Action</button>
                                                    </td>
                                                @endif
                                            @else
                                                <td class="py-4 px-6">
                                                    @if ($appliedProgramme->changingTime == "false")
                                                        Arranging
                                                    @else
                                                        Re-Arranging
                                                    @endif
                                                </td>
                                                <td class="py-4 px-6">
                                                    <button class="btn-block bg-gray-400 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl" disabled>No Action</button>
                                                </td>
                                            @endif
                                        @else
                                            <td class="py-4 px-6">
                                                N.A.
                                            </td>
                                            <td class="py-4 px-6">
                                                <button class="btn-block bg-gray-400 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl" disabled>No Action</button>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach ($appliedProgrammes as $appliedProgramme)
        @if ($appliedProgramme->status == "Approved")
            @if ($appliedProgramme->autoAssigned == "true" && $appliedProgramme->interview ?? false)
                @if ($appliedProgramme->interview->userAccepted == "Requesting")
                    <x-modals.check-interview-detail :appliedProgramme="$appliedProgramme" />
                    <x-modals.accept-interview :appliedProgramme="$appliedProgramme" />
                    <x-modals.reject-interview :appliedProgramme="$appliedProgramme" />
                    @if ($appliedProgramme->changingTime == "false")
                        <x-modals.change-interview-time :appliedProgramme="$appliedProgramme" />
                    @endif
                @elseif ($appliedProgramme->interview->userAccepted == "Accepted")
                    <x-modals.check-interview-detail :appliedProgramme="$appliedProgramme" />
                @endif
            @endif
        @endif
    @endforeach

    <x-flash />
</x-app>