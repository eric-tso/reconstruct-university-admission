<x-app>
<div class="mt-8" style="text-align:center"><a href="javascript:history.back()" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Back to Last Page</a></div> 
<section class="py-8 max-w-4xl mx-auto">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">            
                <div class="card overflow-x-auto relative shadow-md sm:rounded-lg">
                    <div class="w-full bg-white rounded-lg border shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="card-header">
                            Uploaded File of Applicant (User ID: {{ $files->first()->user_id }})
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Files</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($files as $file)
                                    <tr>
                                        <td>{{ $file->name }}</td>
                                        <td><a href="/document?path={{ $file->path }}&originalName={{ $file->originalName }}" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">View</a></td>
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
</div>
</x-app>