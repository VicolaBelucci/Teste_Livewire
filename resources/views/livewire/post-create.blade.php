<div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                   
                    <div class="card-header">
                        Create Post
                    </div>
                    <div class="card-body">
                        <form wire:submit = 'create'>
                            @error('title')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input wire:model.live = "title" type="text" class="form-control" id="title" placeholder="Digite o título">
                            </div>
                            
                            @error('content')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea wire:model.live = "content" type="text" class="form-control" id="content" placeholder="Digite o conteúdo"></textarea>
                            </div>
                            
                            <div wire:loading wire:target = 'create'>Carregando....</div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
