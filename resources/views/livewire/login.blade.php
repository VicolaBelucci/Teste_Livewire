<div>
    @if(session()->has('error'))
        <span class="text text-danger">{{session()->get('error')}}</span>
    @endif

    @if(auth()->guest())
        <form action="" wire:submit.prevent="login">

            @error('email')
                <span class="text text-danger">{{$message}}</span>
            @enderror
            <input type="text" wire:model.live.debounce.500ms="email">
            
            @error('password')
                <span class="text text-danger">{{$message}}</span>
            @enderror
            <input type="text" wire:model.live.debounce.500ms="password">

            <button type="submit">Login</button>
        
        </form>
    @else
        Bem vindo, {{auth()->user()->name}} <button wire:click='logout'>Logout</button>
    @endif

    
</div>
