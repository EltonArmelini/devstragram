@extends('layouts.app')
@section('titulo')
    Registro de Cuenta
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/registrar.jpg') }}" alt="imagen_registro_usuarios">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg ">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input type="text" id="name" name="name" placeholder="Tu nombre" value="{{ old('name') }}"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror">
                </div>
                @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input type="text" id="uesrname" name="username" placeholder="Tu nombre de usuario"
                        value="{{ old('username') }}"
                        class="border p-3 w-full rounded-lg  @error('username') border-red-500 @enderror">
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="email" id="email" name="email" placeholder="Tu email" value="{{ old('email') }}"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password"
                        class="mb-2 block uppercase text-gray-500 font-bold @error('password') border-red-500 @enderror">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Contraseña"
                        class="border p-3 w-full rounded-lg">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation"
                        class="mb-2 block uppercase text-gray-500 font-bold @error('password_confirmation') border-red-500 @enderror">Confirme
                        su
                        contraseña</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Reingresar contraseña" class="border p-3 w-full rounded-lg">
                    @error('password_confirmation')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" value="Crear cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full text-white rounded-lg p-3">
            </form>
        </div>



    </div>
@endsection
