<x-app>
    <section class="py-8 max-w-4xl mx-auto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">            
                    <div class="card overflow-x-auto relative shadow-md sm:rounded-lg">
                        <div class="card-header uppercase">
                            User Management
                            <a class="bg-blue-500 text-white uppercase font-semibold text-xs py-1 px-4 rounded-2xl hover:bg-blue-600" style="float:right" href="/users/create">Create Officer</a>          
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs bg-gray-100 rounded">
                                <li class="nav-item">
                                    <a class="nav-link @if( !request('filterRole') ) active @endif" href="/users">All ({{ $countAll }})</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if( request('filterRole') =='user') active @endif" href="/users?filterRole=user">User ({{ $countUsers }})</a>
                                </li>
                                <li class="nav-item" >
                                    <a class="nav-link @if( request('filterRole') =='officer') active @endif" href="/users?filterRole=officer">Officer ({{ $countOfficers }})</a>
                                </li>  
                            </ul>
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">User ID</th>
                                        <th scope="col" class="py-3 px-6">Name</th>
                                        <th scope="col" class="py-3 px-6">Email</th>
                                        <th scope="col" class="py-3 px-6">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                            <td class="py-4 px-6">{{ $user->id }}</td>
                                            <td class="py-4 px-6">{{ $user->name }}</td>
                                            <td class="py-4 px-6">{{ $user->email }}</td>
                                            <td class="py-4 px-6">
                                                <button type="button" class="bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-600" data-toggle="modal" data-target="#deleteModal{{ $user->id }}">
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
    
    @foreach ($users as $user)
        <x-modals.delete-user :user="$user" />
    @endforeach

    <x-flash />
</x-app>