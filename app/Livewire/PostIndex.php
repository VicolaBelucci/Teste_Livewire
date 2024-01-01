<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostIndex extends Component
{

    public $posts; 

    public function render()
    {   
        // auth()->logout();
        // $this->middleware('auth');
        // auth()->loginUsingId(1);
        // dd(auth()->id());
        $this->posts = Post::all();
        return view('livewire.post-index');
    }
}
