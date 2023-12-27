<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostEdit extends Component
{
    use WithFileUploads;

    public Post $post;

    #[Rule('required|min: 3')]
    public $title;

    #[Rule('required|min: 10')]
    public $content; 

    #[Rule('nullable|image|max:1024', as: 'photo')]
    public $photo;

    public function mount()
    {
        
        $this->title = $this->post->title;
        $this->content = $this->post->content;

    }

    public function updatedPhoto()
    {
        // $this->validate([
        //     'photo' => 'nullable|image|max:1024', // Aqui a validação é aplicada diretamente
        // ]);

        if (!in_array($this->photo->extension(), ['png', 'jpeg', 'jpg', 'svg'])) {
            $this->photo = null;
            // dd($this->photo, 'hey');
            session()->flash('photo-error', 'A extensão do arquivo não é válida.');
        }
    }

    public function update()
    {
        $this->validate();

        if ($this->photo) {
            $path = $this->photo->store('images', 'public');
            $this->post->photo = $path; // Atualizamos o atributo photo do post com o novo caminho.
        }

        Post::where('id', $this->post->id)->update([
            'title' => $this->title,
            'content' => $this->content,
            'photo' => $this->photo ? $this->photo->store('photos', 'public') : $this->post->photo,
        ]);

        // $user_post = $this->post->user;

        User::where('id', 3)->update([
            'photo' => $this->photo ? $this->photo->store('photos', 'public') : $this->post->photo,
        ]);

        // dd($user_post->id);    

       

        session()->flash('success', 'Post editado meu parssa!!');

        $this->redirect('/post', navigate:true);

        // $this->js(<<<JS
        //     swal.fire('Post updated successfully','', 'success')
        //     JS);
    }

    public function render()
    {
        return view('livewire.post-edit');
    }
}
