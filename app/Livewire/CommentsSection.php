<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Comments;
use App\Models\Post;
use App\Models\Reply;
use Livewire\Component;

class CommentsSection extends Component
{
    public Post $post;

    public $usuarioAtivo; 

    public string $comment;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function mount()
    {
        $this->usuarioAtivo = auth()->user();
    }

    public function commentTo()
    {
        $this->validate([
            'comment' => 'required | min: 10'
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $this->post->id,
            'comment' => $this->comment,
        ]);

        $this->comment = ''; 

        $this->js(<<<JS
            swal.fire({
                title: 'Comentário adicionado com sucesso!',
                icon: 'success',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
        JS);
    }

    // public function replyComment()
    // {
    //     $this->validate([
    //         'reply' => 'required | min: 10'
    //     ]);

    //     Reply::create([
    //         'user_id' => auth()->id(),
    //         'post_id' => $this->post->id,
    //         'comment_id' => $this->replyToComment->id,
    //         'reply' => $this->reply,
    //     ]);

    //     $this->comment = ''; 

    //     $this->js(<<<JS
    //         swal.fire({
    //             title: 'Resposta adicionada com sucesso!',
    //             icon: 'success',
    //             toast: true,
    //             position: 'top-end',
    //             showConfirmButton: false,
    //             timer: 3000,
    //             timerProgressBar: true,
    //         })
    //     JS);

    //     $this->reply = '';
    // }

    public function render()
    {

        $comments = Comment::where('post_id', $this->post->id)
            ->with(['user', 'replies.user'])
            ->paginate(10);
        return view('livewire.comments-section', ['comments' => $comments]);
    }
}
