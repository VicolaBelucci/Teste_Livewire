<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostShow extends Component
{
    public Post $post;

    public $title;

    public $content; 

    public function mount()
    {
        $this->title = $this->post->title;
        $this->content = $this->post->content;
        
        // dd('oi', $this->post->user->name);

    }

    public function render()
    {
        return view('livewire.post-show');
    }
}
