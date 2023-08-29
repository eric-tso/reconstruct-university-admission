<x-app>
    <section class="py-8 max-w-4xl mx-auto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header uppercase">
                            Instruction
                        </div>

                        <div class="card-body">        
                            <form method="POST" action="/applications">
                                @csrf
                                
                                <ul class="my-2 mx-4" style="list-style-type:disc">
                                    <li>Each Account only can create ONCE Application.</li>
                                    <li>User should input information correctly.</li>
                                    <li>User can apply the programme at the last part of application.</li>
                                    <li>User can apply 3 programmes in maximum.</li>
                                </ul>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="bg-green-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-green-600 mx-1">Agree</button>
                                    <a class="bg-red-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-red-600 mx-1" href="/">Disagree</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-flash />
</x-app>