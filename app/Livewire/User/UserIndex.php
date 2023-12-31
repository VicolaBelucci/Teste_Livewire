<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    // public $users;

    #[Url(as: 'search', keep:false)] //Estes atributos são para manter a pesquisa na URL da página
    public $search;

    protected $listeners = ['refresh-user'=> '$refresh'];

    public function updatedSearch()
    {
        $this->resetPage();
        /*
        Este método é importante porque é chamado toda vez que a propriedade search é alterada, para reiniciar a numeração de página de volta para a primeira
        sempre que o usuário digita algo na busca. Isto é bom porque se quisermos procurar algo da primeira página, mas estivermos na terceira página, nenhum
        retorno seria dado sem esse método.
        */
    }

    public function render()
    {

        if(!$this->search){
            $users = User::paginate(15);
        }else{
            $users = User::where(function($query){
                $query->where('name', 'like','%'.$this->search.'%')
                    ->orWhere('email', 'like', '%'.$this->search.'%');
            })
            ->paginate(5);
        }

        return view('livewire.user.user-index', ['users' => $users]);
    }
}
