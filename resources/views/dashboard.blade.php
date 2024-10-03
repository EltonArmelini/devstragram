@extends('layouts.app')
@section('titulo')
    Perfil de: {{ $user->username }}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class="w-8/12 lg:w-6/12 px-5">
                <img src=" {{ $user->images ? asset('img/profiles/' . $user->images) : asset('img/user-profile.svg') }}"
                    alt="default profile photo" class="rounded-full">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10">
                <div class="flex items-center gap-2">
                    <p class="text-gray-700 text-2xl">{{ $user->username }} </p>
                    @if (Auth::check() && Auth::user()->id == $user->id)
                        <a href="{{ route('profile.index') }}" class="hover:cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="size-4" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>

                        </a>
                    @endif
                </div>
                <p class="text-gray-800 text-sm mb-3 mt-5 font-bold">@choice('Seguidor|Seguidores', $user->followers->count()): <span class="font-normal">
                        {{ $user->followers->count() }} </span> </p>
                <p class="text-gray-800 text-sm mb-3 font-bold">Siguiendo: <span
                        class="font-normal">{{ $user->following->count() }}</span></p>
                <p class="text-gray-800 text-sm mb-3 font-bold">Publicaciones: <span
                        class="font-normal">{{ $posts->count() }}</span></p>
                @auth
                    @if (Auth::id() != $user->id)
                        @if (!$user->isFollowing(Auth::user()))
                            <form action="{{ route('users.follow', $user) }}" method="post">
                                @csrf
                                <input type="submit" value="Seguir"
                                    class="bg-blue-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer w-full">
                            </form>
                        @else
                            <form action="{{ route('users.unfollow', $user) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Dejar de seguir"
                                    class="bg-red-600 text-white uppercase rounded-lg px-3 py-1 text-xs font-bold cursor-pointer">
                            </form>
                        @endif
                    @endif
                @endauth
            </div>
        </div>
    </div>


    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
    </section>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <x-list-post :posts="$posts" />
    </div>
@endsection
