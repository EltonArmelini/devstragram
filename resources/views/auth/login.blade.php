@extends('layouts.app')

@section('titulo')
    Login
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="imagen_login_usuarios">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-lg ">
            <form method="POST" {{ route('login.store') }} novalidate>
                @csrf
                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
                @endif
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="text" id="email" name="email" placeholder="Tu Email" value="{{ old('email') }}"
                        class="border p-3 w-full rounded-lg  @error('username') border-red-500 @enderror">
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
                    <input type="checkbox" id="remember">
                    <label for="remember"
                        class=" text-gray-500 text-sm ">Recordarme</label>
                </div>
                <input type="submit" value="Iniciar Sesion"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full text-white rounded-lg p-3">
            </form>
        </div>
    </div>
@endsection
