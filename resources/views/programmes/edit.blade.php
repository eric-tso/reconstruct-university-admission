<x-app>
    <section class="py-8 max-w-4xl mx-auto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header uppercase">
                            Edit Programme
                        </div>

                        <div class="card-body">        
                            <x-forms.edit-programme :programme="$programme"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>