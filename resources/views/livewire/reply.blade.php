<div>
    <div class="d-flex flex-start mt-4 mb-4">
        <a href="#" class="me-3">
            <img src="{{ asset('storage/'.$reply->user->photo) }}" alt="avatar" width="65" height="65" class="rounded-circle shadow-1-strong">
        </a>
        <div class="flex-grow-1 flex-shrink-1">
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="mb-1">
                        {{$reply->user->name}} -
                        <span class="small">{{$reply->created_at->diffForHumans()}}</span>
                    </p>

                    <a href="#" wire:click.prevent="delete({{$reply->id}})" ><i class="fas fa-reply fa-xs"> </i>
                        <span class="small">
                        
                            <i class="bi bi-trash3-fill"></i>
                        </span>
                    </a>
                </div>
                <p class="small mb-0">
                    {{$reply->reply}}
                </p>
            </div>
        </div>
    </div>
</div>
