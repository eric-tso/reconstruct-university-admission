<x-app>
    <section class="py-8 max-w-4xl mx-auto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">            
                    <div class="card overflow-x-auto relative shadow-md sm:rounded-lg">
                        <ul class="nav nav-tabs bg-gray-100 rounded text-gray-700">
                            <li class="nav-item">
                                <a class="nav-link @if( !request('filterStatus') ) active @endif" href="/officer/appliedProgrammes">Processing ({{ $countProcessing }})</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if( request('filterStatus') =='Approved') active @endif" href="/officer/appliedProgrammes?filterStatus=Approved">Approved ({{ $countApproved }})</a>
                            </li>
                            <li class="nav-item" >
                                <a class="nav-link @if( request('filterStatus') =='Rejected') active @endif" href="/officer/appliedProgrammes?filterStatus=Rejected">Rejected({{ $countRejected }})</a>
                            </li>  
                        </ul>
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">Application No.</th>
                                    <th scope="col" class="py-3 px-6">Applicant ID</th>
                                    <th scope="col" class="py-3 px-6">Applied Programme</th>
                                    <th scope="col" class="py-3 px-6">Applied Year</th>
                                    <th scope="col" class="py-3 px-6">Requirement</th>
                                    @if (!request()->query('filterStatus') ?? false)
                                        <th scope="col" class="py-3 px-6">Action</th>
                                    @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appliedProgrammes as $appliedProgramme)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <td class="py-4 px-6">A{{ $appliedProgramme->user->application->id }}-R{{ $appliedProgramme->rank }}</td>
                                    <td class="py-4 px-6"><a href="/applications/{{ $appliedProgramme->user->application->id }}" style="color:blue">{{ $appliedProgramme->user->id }}</a></td>
                                    <td class="py-4 px-6">{{ $appliedProgramme->programme->name }}</td>
                                    <td class="py-4 px-6">Year {{ $appliedProgramme->year}}</td>
                                    <td class="py-4 px-6">
                                        <button type="button" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600" data-toggle="modal" data-target="#checkRequirementModal{{ $appliedProgramme->id }}">
                                            Check
                                        </button>
                                    </td>
                                    @if ($appliedProgramme->status == "Processing")
                                        <td class="py-4 px-6">
                                            <button type="button" class="btn-block bg-green-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-green-600 mb-2" data-toggle="modal" data-target="#approveAppliedProgrammeModal{{ $appliedProgramme->id }}">
                                                Approve
                                            </button>
                                            <button type="button" class="btn-block bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-600 width-100" data-toggle="modal" data-target="#rejectAppliedProgrammeModal{{ $appliedProgramme->id }}">
                                                Reject
                                            </button>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            @if ($appliedProgrammes->isEmpty())
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700"> 
                                    <th colspan="6" style="text-align:center">
                                        No Any Applied Programmes Application
                                    </th> 
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    @foreach ($appliedProgrammes as $appliedProgramme)
        <x-modals.check-requirement :appliedProgramme="$appliedProgramme" />
        <x-modals.approve-appliedProgramme :appliedProgramme="$appliedProgramme" />
        <x-modals.reject-appliedProgramme :appliedProgramme="$appliedProgramme" />
    @endforeach

    <x-flash />
</x-app>