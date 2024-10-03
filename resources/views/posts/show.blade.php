@extends('layouts.app')
@section('titulo')
    {{ $post->title }}
@endsection
@section('contenido')
    <div class="container mx-auto md:flex shadow-lg p-9">
        <div class="md:w-1/2">
            <img src="{{ asset('img/posts/' . $post->image) }}" alt="">
            <div class="p-3">
                <div class="my-5 flex gap-4">
                    @auth
                        <livewire:post-like :post="$post">
                        @endauth
                </div>
            </div>
            <div class="m-2">
                <p class="font-bold">{{ $user->username }} | <span class="text-sm font-light">
                        {{ $post->created_at->diffForHumans() }}</span></p>
                <p class="text-sm ">{{ $post->description }}</p>
            </div>
            @auth
                @if ($post->user_id == Auth::id())
                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Eliminar post"
                            class="bg-red-500 p-2 rounded hover:bg-red-600 text-white font-bold cursor-pointer">
                    </form>
                @endif

            @endauth
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                <p class="text-xl font-bold text-center mb-4">Comentarios</p>
                @if (session('message'))
                    <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                        {{ session('message') }}
                    </div>
                @endif
                @auth
                    <form action="{{ route('comments.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comment" class="mb-2 block uppercase text-gray-500 font-bold">Añade un
                                comentario</label>
                            <textarea type="text" id="comment" name="comment" placeholder="Comenta algo..."
                                class="border p-3 w-full rounded-lg resize-none @error('comment') border-red-500 @enderror"></textarea>
                            @error('comment')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="submit" value="Comentar"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full text-white rounded-lg p-3">
                    </form>
                @endauth
            </div>
            <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                @if ($post->comments->count())
                    @foreach ($post->comments as $comment)
                        <div class="p-5 border-gray-300 border-b mb-2">
                            <a href="{{ route('posts.index', $comment->user) }}"
                                class="font-bold p-5">{{ $comment->user->username }}</a>
                            <p class="">{{ $comment->comment }}</p>
                            <p class="text-sm text-gray-700">{{ $comment->created_at->diffForHUmans() }}</p>

                        </div>
                    @endforeach
                @else
                    <p class="p-10 text-center">No tiene comentarios</p>
                @endif
            </div>
        </div>
    </div>
@endsection
