<x-app>
    <section class="py-8 max-w-4xl mx-auto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">                               
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">Files</th>
                                    <th scope="col" class="py-3 px-6">Uploaded</th>
                                    <th scope="col" class="py-3 px-6">Last Modified</th>
                                    <th scope="col" class="py-3 px-6 text-center" colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white required">
                                        Post-Secondary Transcript
                                    </th>
                                    @if ($postSecondaryTranscript ?? false)
                                        <td class="py-4 px-6">Yes</td>
                                        <td class="py-4 px-6">{{ $postSecondaryTranscript->updated_at }}</td>
                                        <td class="py-4 px-6">
                                            <a href="/files/{{ $postSecondaryTranscript->id }}/edit?editFile=postSecondaryTranscript" 
                                                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600" 
                                            >Edit</a>
                                        </td>
                                        <td class="py-4 px-6">
                                            <a class="btn bg-gray-400 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl">Delete</a>
                                        </td>
                                    @else
                                        <td class="py-4 px-6">No</td>
                                        <td class="py-4 px-6">N.A.</td>
                                        <td class="py-4 px-6">
                                            <a href="/files/create?createFile=postSecondaryTranscript" 
                                                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600"
                                            >Upload</a>
                                        </td>
                                    @endif
                                </tr>

                                @foreach ($files as $file)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $file->name }}
                                        </th>
                                        <td class="py-4 px-6">Yes</td>
                                        <td class="py-4 px-6">{{ $file->updated_at }}</td>
                                        <td class="py-4 px-6">
                                            <a href="/files/{{ $file->id }}/edit" 
                                                class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600" 
                                            >Edit</a>
                                        </td>
                                        <td class="py-4 px-6">
                                            <button type="button" class="bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-600" data-toggle="modal" data-target="#deleteModal{{ $file->id }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <td class="py-4 px-6" colspan="5">
                                        <div style="text-align:center">
                                            <a href="/files/create" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600" >Upload Other Supplementary Document</a>
                                        </div>
                                    </td>
                                </tr>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach ($files as $file)
        <x-modals.delete-file :file="$file" />
    @endforeach

    <x-flash />
</x-app>