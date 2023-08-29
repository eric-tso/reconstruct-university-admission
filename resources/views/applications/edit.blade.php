<x-app>
    <section class="py-8 max-w-4xl mx-auto">
        <div class="container">
            <div x-data="{ show: 'personal' }" class="row justify-content-center" >
                <div class="col-md-flex">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="font-semibold mb-4">Personal Information Forms</h4>
                            <div class="list-group">
                                <button x-on:click="show = 'personal'" class="list-group-item list-group-item-action">1. Personal Particular</a>
                                <button x-on:click="show = 'acade'" class="list-group-item list-group-item-action">2. Academic Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header uppercase">
                            <div x-show="show === 'personal'">1. Personal Particular</div>
                            <div x-show="show === 'acade'">2. Academic Profile</div>
                        </div>
                        <div class="card-body">
                            <div x-show="show === 'personal'">
                                <x-forms.personal :application="$application" />
                            </div>
                            <div x-show="show === 'acade'">
                                <x-forms.acade :application="$application" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-flash />
</x-app>