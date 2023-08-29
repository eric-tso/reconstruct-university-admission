<x-app>
    <section class="py-8 max-w-4xl mx-auto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">            
                    <div class="card overflow-x-auto relative shadow-md sm:rounded-lg">
                        <div class="card-header uppercase">
                            Interview Management
                            <a class="bg-blue-500 text-white uppercase font-semibold text-xs py-1 px-4 rounded-2xl hover:bg-blue-600" style="float:right" href="/interviewPeriods/create">Create Interview Period</a>          
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs bg-gray-100 rounded">
                                <li class="nav-item">
                                    <a class="nav-link @if(request()->is('interviewPeriods')) active @endif" href="/interviewPeriods">Interview Period</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if(request()->is('waitingArrange')) active @endif" href="/waitingArrange">Waiting Arrange</a>
                                </li>
                                <li class="nav-item" >
                                    <a class="nav-link @if(request()->is('changingTimeRequest')) active @endif" href="/changingTimeRequest">Change Time Request</a>
                                </li>  
                            </ul>
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">Application No.</th>
                                        <th scope="col" class="py-3 px-6">Applicant ID</th>
                                        <th scope="col" class="py-3 px-6">Applied Programme</th>
                                        <th scope="col" class="py-3 px-6">Applied Year</th>
                                        <th scope="col" class="py-3 px-6">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appliedProgrammes as $appliedProgramme)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <td class="py-4 px-6">A{{ $appliedProgramme->user->application->id }}-R{{ $appliedProgramme->rank }}</td>
                                        <td class="py-4 px-6"><a href="/applications/{{ $appliedProgramme->user->application->id }}" style="color:blue">{{ $appliedProgramme->user->id }}</a></td>
                                        <td class="py-4 px-6">{{ $appliedProgramme->programme->name }}</td>
                                        <td class="py-4 px-6">{{ $appliedProgramme->year }}</td>
                                        <td class="py-4 px-6">
                                            <a href="interviews/{{ $appliedProgramme->interview->id }}/edit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                                            Handle
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                @if ($appliedProgrammes->isEmpty())
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700"> 
                                        <th colspan="6" style="text-align:center">
                                            No Any Changing Time Request
                                        </th> 
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-flash />
</x-app>