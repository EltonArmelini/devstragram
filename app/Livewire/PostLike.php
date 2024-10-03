<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PostLike extends Component
{
    public Post $post;
    public bool $isLiked;
    public int $likes;

    public function mount(Post $post)
    {
        $this->isLiked = $post->checkLike(Auth::user());
        $this->likes = $post->likes->count();
    }

    public function like()
    {
        if ($this->post->checkLike(Auth::user())) {
            $this->post->likes()->where('post_id',$this->post->id)->delete();
            $this->isLiked = false;
            $this->likes--;
        } else {
            $this->post->likes()->create([
                'user_id' => Auth::id()
            ]);
            $this->isLiked = true;
            $this->likes++;
        }
    }

    public function render()
    {
        return view('livewire.post-like');
    }
}
