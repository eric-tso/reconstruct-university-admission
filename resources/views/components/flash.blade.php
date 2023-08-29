@if (session()->has('success'))
    <div x-data="{ show: true }"
        x-show="show"
        class="alert alert-success fixed bottom-3 right-3"
    >
        {{ session('success') }}

        <button class="close" @click="show = false"><span aria-hidden="true">&times;</span></button>
    </div>
@endif

@if (session()->has('warning'))
    <div x-data="{ show: true }"
        x-show="show"
        class="alert alert-warning fixed bottom-3 right-3"
    >
        {{ session('warning') }}

        <button class="close" @click="show = false"><span aria-hidden="true">&times;</span></button>
    </div>
@endif