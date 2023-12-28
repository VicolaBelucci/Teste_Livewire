<?php

namespace App\Livewire;

use App\Models\Reply;
use Livewire\Component;
use Illuminate\Support\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class ReplyModal extends Component
{
    public $replyToComment;

    public $usuarioAtivo;

    #[Rule('required|max:255', as: 'resposta')]
    public $reply;

    public function mount()
    {
        $this->usuarioAtivo = auth()->user();
    }

    #[On('open-modal')]
    public function openModal($comment, $user)
    {
        // dd($comment);
        $this->replyToComment = $comment;


        $this->js(<<<JS
            window.__replyModal = new bootstrap.Modal(document.getElementById('replyModal'));
            __replyModal.show();
        JS);

    }

    public function replyComment()
    {
        // dd($this->replyToComment['id']);
        $this->validate();
        Reply::create([
            'comment_id' => $this->replyToComment['id'],
            'user_id' => auth()->id(),
            'post_id' => $this->replyToComment['post_id'],
            'reply' => $this->reply,
        ]);

        $this->js(<<<JS
            swal.fire({
                title: 'Reply added successfully',
                icon: 'success',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            })

            __replyModal.hide();
        JS);
        $this->dispatch('refresh');
        $this->reply = '';
    }

    public function render()
    {
        return view('livewire.reply-modal');
    }
}
