<div>
    <section>
        <div class="row d-flex" id="comments-form">
            <div class="col-md-12 col-lg-10 col-xl-8">
                @if($canReplyTo)
                    @include('replyForm')
                @else
                    @include('commentForm')
                @endif
            </div>
        </div>
    </section>

    <div class="container my-5 py-5">
        <div class="row d-flex">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card">
                    <div class="card-body p-4">
                        <h4 class="text-center mb-4 pb-2">Comments Section({{$comments->total()}})</h4>
                        <div class="row">
                            <div class="col">
                        
                        @forelse($comments as $comment)

                                <div class="d-flex flex-start mb-4">
                                    <img src="{{ asset('storage/'.$comment->user->photo) }}" class="rounded-circle shadow-1-strong me-3" width="65" height="65" loading="lazy" alt="avatar">
                                    <div class="flex-grow-1 flex-shrink-1">
                                        <div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-1">
                                                    {{$comment->user->name}} 
                                                    <span class="small">- há {{$comment->created_at->diffForHumans()}}</span>
                                                </p>

                                                <a href="#" wire:click.prevent="replyTo({{$comment->id}})"><i class="fas fa-reply fa-xs"> </i>
                                                    <span class="small">
                                                        @if($canReplyTo && $comment->id == $replyToComment->id)
                                                            Hide Reply
                                                        @else
                                                            Reply
                                                        @endif
                                                    </span>
                                                </a>
                                            </div>
                                            <p class="small mb-0">
                                                {{$comment->comment}}
                                            </p>
                                        </div>

                                        @foreach($comment->replies as $reply)
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
                                                    </div>
                                                    <p class="small mb-0">
                                                        {{$reply->reply}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                    
                        @empty
                            <p>No comment here, be the first</p>
                        @endforelse

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
