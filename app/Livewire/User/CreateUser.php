<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateUser extends Component
{
    public $showModal = false;
    
    #[Rule('required')]
    public $email = '';

    #[Rule('required|min:6')]
    public $password = '';

    #[Rule('required')]
    public $name = '';

    public function createUser()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        $this->reset(['name', 'email', 'password']);

        $this->js(<<<JS
                swal.fire({
                    icon:'success',
                    toast: true,
                    showConfirmButton: false,
                    text: 'You created a new user!',
                    position: 'top-end',
                    timer: 3000,
                    timerProgressBar: true,
                })
            JS);

        $this->dispatch('refresh-user');

        // dd($this->name, $this->email, $this->password);
    }
    public function render()
    {
        return view('livewire.user.create-user');
    }
}
