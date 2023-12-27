<div class="card">
    <div class="card-footer py-3 border-0">
        <h3>Seu Comentário - {{$usuarioAtivo->name}}</h3>
        <form wire:submit="commentTo" action="">
            @error('comment')
                <span class="text text-danger mb-3">{{$message}}</span>
            @enderror
            <div class="d-flex flex-start w-100">
                <img src="{{ asset('storage/'. $usuarioAtivo->photo ) }}" alt="avatar" width="40" height="40" class="rounded-circle shadow-1-strong me-3">
                
                   

                <div class="form-outline w-100">
                    <textarea wire:model="comment" name="" id="textAreaExample" cols="30" rows="4" class="form-control"></textarea>
                    <label for="textAreaExample" class="form-label">Message</label>
                </div>
            </div>
            <div class="float-end mt-2 pt-1">
                <button class="btn btn-primary btn-sm" type="submit">Comentar</button>
            </div>
        </form>
    </div>
</div>