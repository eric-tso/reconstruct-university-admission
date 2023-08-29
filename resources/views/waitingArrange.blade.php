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
                                        <th scope="col" class="py-3 px-6">Approved Applied Programme</th>
                                        <th scope="col" class="py-3 px-6">Waiting Arrange Intervew(s)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requireInterviews as $requireInterview)
                                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                            <td class="py-4 px-6">{{ $requireInterview->name }}</td>
                                            <td class="py-4 px-6">{{ $requireInterview->total }}</td>
                                        </tr>
                                    @endforeach
                                    @if ($requireInterviews->isEmpty())
                                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700"> 
                                            <th colspan="6" style="text-align:center">
                                                No Any Approved Applied Programme Waiting Arrange
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