<div class="modal fade" tabindex="-1" id="replyModal" wire:ignore.self>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            Reply To 
            @if(isset($replyToComment))
                {{$replyToComment['user']['name']}} <img src="{{ asset('storage/'.$replyToComment['user']['photo']) }}" alt="avatar" width="40" height="40" class="rounded-circle shadow-1-strong me-3">
            @endif
           
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-footer py-3 border-0">
                    
                    <form action="" wire:submit="replyComment">
                        
                        <div class="d-flex flex-start w-100">
                            <img src="{{ asset('storage/'. $usuarioAtivo->photo ) }}" alt="avatar" width="40" height="40" class="rounded-circle shadow-1-strong me-3">
                            
                            <div class="form-outline w-100">
                                
                                <textarea name="" id="textAreaExample" cols="30" rows="4" class="form-control" wire:model.live.debounce.350ms='reply'></textarea>
                                @error('reply')
                                    <span class="text text-danger mb-3">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Responder</button>
                          </div>
                    </form>
                </div>
            </div>
        </div>
        
      </div>
    </div>
  </div>