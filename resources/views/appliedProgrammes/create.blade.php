<x-app>
    <section class="py-8 max-w-4xl mx-auto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card overflow-x-auto relative shadow-md sm:rounded-lg">
                        <div class="card-header uppercase">
                            Apply Programme
                        </div>
                        <div class="card-body">  
                            @if($requirement ?? false)
                                Before applying the programmes, you require:
                                {!! $requirement !!}
                                </div>
                            @else
                                <x-forms.create-applied-programme :programmes="$programmes" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>