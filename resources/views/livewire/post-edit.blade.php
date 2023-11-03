<div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    @if(session()->has('success'))
                        <span class="text text-success">{{session()->get('success')}}</span>
                    @endif
                    <div class="card-header">
                        Edit Post
                    </div>
                    <div class="card-body">
                        <form wire:submit = 'update'>
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
                            
                            <div class="row">
                                <div class="mt-2">
                                    @if($photo)
                                        <img src="{{ $photo->temporaryUrl() }}" width="100%">
                                    @endif
                                </div>
                            </div>              

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    @error('photo')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror

                                        <div
                                        x-data="{ uploading: false, progress: 0 }"
                                        x-on:livewire-upload-start="uploading = true"
                                        x-on:livewire-upload-finish="uploading = false"
                                        x-on:livewire-upload-error="uploading = false"
                                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                                        >

                                            <div x-show="uploading">
                                                <progress max="100" x-bind:value="progress"></progress>
                                            </div>
                                        

                                            <div class="input-group mt-3">
                                                <input type="file" wire:model='photo' name="photo">
                                            </div>

                                        </div>

                                        <br>
                                        <div wire:loading wire:target = 'create'>Carregando....</div>
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                </div>
                            </div>
                            

                         


                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
