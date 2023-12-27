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

    public $canReplyTo;

    public $replyToComment;

    public $usuarioAtivo; 

    public string $comment;

    public string $reply;

    public function mount()
    {
        $this->usuarioAtivo = auth()->user();
    }

    public function replyTo(int $commentId)
    {
        // dd($commentId);
        if($this->canReplyTo != $commentId){
            $this->canReplyTo = $commentId;
            $this->replyToComment = $this->post->comments->find($commentId);
            // dd($this->usuarioAtivo->photo);
        }else{
            $this->canReplyTo = null;
        }

        $this->js(<<<JS
            window.scrollTo({
                top:document.querySelector('#comments-form').offsetTop,
                behavior: "smooth",
            })
        JS);
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

    public function replyComment()
    {
        $this->validate([
            'reply' => 'required | min: 10'
        ]);

        Reply::create([
            'user_id' => auth()->id(),
            'post_id' => $this->post->id,
            'comment_id' => $this->replyToComment->id,
            'reply' => $this->reply,
        ]);

        $this->comment = ''; 

        $this->js(<<<JS
            swal.fire({
                title: 'Resposta adicionada com sucesso!',
                icon: 'success',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })
        JS);

        $this->reply = '';
    }

    public function render()
    {

        $comments = Comment::where('post_id', $this->post->id)
            ->with(['user', 'replies.user'])
            ->paginate(10);
        return view('livewire.comments-section', ['comments' => $comments]);
    }
}
