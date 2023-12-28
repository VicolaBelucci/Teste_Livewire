<?php

namespace App\Livewire;

use Livewire\Component;

class Comment extends Component
{
    public $comment; 

    public $replyToComment; 

    public $post;

    public function replyTo($commentId)
    {
        $this->replyToComment = $this->post->comments->find($commentId);

        $this->dispatch('open-modal', $this->replyToComment, $this->replyToComment->user);
    }

    public function delete($commentId)
    {
        $comment = $this->post->comments->find($commentId);

        if($comment->user_id !== auth()->id()){
            $this->js(<<<JS
                swal.fire({
                    icon:'error',
                    showConfirmButton: true,
                    text: 'You are not allowed to delete this comment!',
                })
            JS);
            return;
        }

        $comment->delete();

        $this->js(<<<JS
                swal.fire({
                    icon:'success',
                    toast: true,
                    showConfirmButton: false,
                    text: 'You deleted the comment!',
                    position: 'top-end',
                    timer: 3000,
                    timerProgressBar: true,
                })
            JS);

        $this->dispatch('refresh');

        

    }

    public function render()
    {
        return view('livewire.comment');
    }
}
