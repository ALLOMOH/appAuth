@extends('welcome')

@section("content")

    <div class="w-full h-screen  flex justify-center items-center">
        <div class="w-1/2 backdrop:blur-[10px] grid place-items-center bg-gray-400 rounded-2xl p-4" >
            <form action="{{ route('auth.doRegister') }}" class="flex w-full flex-col gap-5 rounded-2xl"  method="POST">
                <legend class="text-2xl font-bold text-white text-center border-bottom-3" > S'inscrire </legend>
                @csrf
                <div class="flex flex-col space-y-3">
                    <label for="name">Nom</label>
                    <input type="text" class="p-2 w-full outline-0  bg-gray-500 rounded-2xl" name="name" id="name" value="{{ old('name') }}" required>
                    @error("name")
                        <span> Entre le nome </span>
                    @enderror
                </div>
                <div class="flex flex-col space-y-3">
                    <label for="email">Email</label>
                    <input type="email" class="p-2 w-full outline-0  bg-gray-500 rounded-2xl" name="email" id="email" value="{{ old('email') }} " required>
                    @error("email")
                       Entre le mail inclure le @
                    @enderror
                </div>
                <div class="flex flex-col space-y-3">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="p-2 w-full outline-0  bg-gray-500 rounded-2xl" name="password" id="password" required >
                
                </div>
                <div class="flex flex-col space-y-3">
                    <label for="comfirm_password">Comfirmation de Mot de passe</label>
                    <input type="password" class="p-2 w-full outline-0  bg-gray-500 rounded-2xl" name="password" id="password" >
                </div>
                <button class="bg-blue-800 outline-0 p-2 rounded-2xl hover:stroke-blue-50 transition ease-in duration-150 text-white bold">S'inscrire</button>
            </form>
        </div>
    </div>

@endsection

