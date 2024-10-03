@forelse ($posts as $post)
    <div>
        <a href="{{ route('posts.show', ['post' => $post, 'user' => Auth::user()]) }}">
            <img src="{{ asset('img/posts') . '/' . $post->image }}" alt="{{ $post->title }}">
        </a>
    </div>
@empty
    <p class="text-center">No hay publicaciones para mostrar</p>
@endforelse
