@extends('layouts.app')

@section('titulo')
    Editar Perfil
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow-lg p-6 rounded-md">
            <form class="mt-10 md:mt-0" method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Nombre de Usuario</label>
                    <input type="text" id="username" name="username" placeholder="Tu nuevo nombre de usuario"
                        value="{{ Auth::user()->username }}"
                        class="border p-3 w-full rounded-lg  @error('username') border-red-500 @enderror">
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="file" class="mb-2 block uppercase text-gray-500 font-bold">Foto de perfil</label>
                    <input type="file" id="file" name="file" accept=".jpg,.jpeg,.png"
                        class="border p-3 w-full rounded-lg">
                </div>
                <input type="submit" value="Guardar"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full text-white rounded-lg p-3">
            </form>

        </div>
    </div>
@endsection
