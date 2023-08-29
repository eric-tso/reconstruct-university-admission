<form method="POST" action="/users">
    @csrf

    <input type="hidden" name="role" value="officer">

    <x-form.input name="name" label="Name" :value="old('name')" />
    <x-form.input name="email" type="email" label="email" :value="old('email')"/>
    <x-form.input name="password" type="password" label="password" :value="old('password')" />
    <x-form.input name="password_confirmation" type="password" label="Confirm Password" :value="old('password')" />
  
    <div class="d-flex justify-content-center">
        <x-form.button>Create</x-form.button>
    </div>
</form>