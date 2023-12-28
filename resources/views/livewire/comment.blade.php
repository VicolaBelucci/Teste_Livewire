<div>
    <div class="d-flex flex-start mb-4">
        <img src="{{ asset('storage/'.$comment->user->photo) }}" class="rounded-circle shadow-1-strong me-3" width="65" height="65" loading="lazy" alt="avatar">
        <div class="flex-grow-1 flex-shrink-1">
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="mb-1">
                        {{$comment->user->name}} 
                        <span class="small">- há {{$comment->created_at->diffForHumans()}}</span>
                    </p>

                    <div>
                        <a href="#" wire:click.prevent="replyTo({{$comment->id}})"><i class="fas fa-reply fa-xs"> </i>
                            <span class="small">
                                <i class="bi bi-reply-fill"></i>
                            
                            </span>
                        </a>

                        <a href="#" wire:click.prevent="delete({{$comment->id}})"><i class="fas fa-reply fa-xs"> </i>
                            <span class="small">
                            
                                <i class="bi bi-trash3-fill"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <p class="small mb-0">
                    {{$comment->comment}}
                </p>
            </div>

            @foreach($comment->replies as $reply)
                @livewire('reply', ['reply' => $reply], key($reply->id))
            @endforeach

        </div>
    </div>
</div>
