<x-app>
    <section class="py-8 max-w-4xl mx-auto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">                               
                    <div class="card overflow-x-auto relative shadow-md sm:rounded-lg">
                        <div class="card-header uppercase">
                            Programme Management
                            <a class="bg-blue-500 text-white uppercase font-semibold text-xs py-1 px-4 rounded-2xl hover:bg-blue-600" style="float:right" href="/programmes/create">Create Programme</a>          
                        </div>
                        <div class="card-body">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">Category</th>
                                        <th scope="col" class="py-3 px-6">Name</th>
                                        <th scope="col" class="py-3 px-6">Year 1 Required CGPA</th>
                                        <th scope="col" class="py-3 px-6">Year 3 Required CGPA</th>
                                        <th scope="col" class="py-3 px-6 text-center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($programmes as $programme)
                                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                            <td class="py-4 px-6">{{ $programme->category }}</td>
                                            <td class="py-4 px-6">{{ $programme->name }}</td>
                                            <td class="py-4 px-6">{{ $programme->year1RequiredCgpa }}</td>
                                            <td class="py-4 px-6">{{ $programme->year3RequiredCgpa }}</td>
                                            <td class="py-4 px-6">
                                                <a href="/programmes/{{ $programme->id }}/edit" 
                                                    class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600" 
                                                >Edit</a>
                                            </td>
                                            <td class="py-4 px-6">
                                                <button type="button" class="bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-600" data-toggle="modal" data-target="#deleteModal{{ $programme->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    @foreach ($programmes as $programme)
        <x-modals.delete-programme :programme="$programme" />
    @endforeach

    <x-flash />
</x-app>