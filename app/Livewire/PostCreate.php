<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PostCreate extends Component
{
    

    #[Rule('required|min: 3')]
    public string $title;

    #[Rule('required|min: 10')]
    public string $content; 


    public function mount()
    {
        // $this->title = "Saaalve";
    }

    public function create()
    {

        // $this->validate([
        //     'title' => 'required|min: 3',
        //     'content' => 'required|min:10'
        // ]);

        $this->validate();

        sleep(2);

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => 1
        ]);

        $this->reset();

        session()->flash('success', 'Post criado meu parssa!!');

        $this->redirect('/post', navigate:true);
    }

    public function render()
    {
        return view('livewire.post-create');
    }


    //Método messages é para customizar as mensagens de validação, tem que seguir esse padrão aí, cada validação (required, min, max) tem que ter sua própria mensagem, se não dá erro!!
    public function messages()
    {
        return [
            'title' => [
                'required' => 'O campo é obrigatório amigão...',
                'min' => 'Pelo menos :min caracteres parssa...'
            ],
            'content' =>[
                'required' => 'O campo é obrigatório parssa...',
                'min' => 'Pelo menos :min caracteres brow'
            ]
            ];
    }
}
