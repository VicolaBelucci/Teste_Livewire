<?php

namespace App\Livewire;

use Livewire\Component;

class Reply extends Component
{
    public $reply; 

    public function delete($replyId)
    {
        if($this->reply->user_id != auth()->id()){
            $this->js(<<<JS
            swal.fire({
                icon:'error',
                showConfirmButton: true,
                text: 'You are not allowed to delete this reply!',
            })
        JS);
        return;
        }    

        $this->reply->delete();

        $this->js(<<<JS
                swal.fire({
                    icon:'success',
                    toast: true,
                    showConfirmButton: false,
                    text: 'You deleted the reply!',
                    position: 'top-end',
                    timer: 3000,
                    timerProgressBar: true,
                })
            JS);

        $this->dispatch('refresh');

    }

    public function render()
    {
        return view('livewire.reply');
    }
}
