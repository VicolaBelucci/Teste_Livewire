<div>
    <div class="row">
        <div class="col-md-8 mb-4 mt-4">
            <section class="border-bottom mb-4">
                <div class="row align-items-center mb-4">
                    <div class="col-lg-6 text-center text-lg-start mb-3 m-lg-0">
                        <img src="{{asset('storage/'.$post->user->photo)}}" class="rounded-5 shadow-1-strong me-2" height="35" loading="lazy" alt="">
                        <span>Published - {{$post->created_at->diffForHumans()}} <u></u> by {{$post->user->name}}</span>
                        <a href="" class="text-dark"></a>
                    </div>
                </div>
            </section>


            <section>
                <h2>
                    Título: {{$post->title}}
                </h2>
            </section>

            <hr>

            <section class="border-bottom mb-4 pb-4">
                <div class="row">
                    <div class="col-3">
                        <img src="{{asset('storage/'.$post->user->photo)}}" class="rounded-5 shadow-1-strong me-2" width="100%" loading="lazy" >
                    </div>

                    <div class="col-9">
                        <p class="mb-2"><strong> {{$post->user->name}}</strong></p>
                        <a href="" class="text-dark"> <i class="fab fa-facebook-f me-1"></i></a>
                        <a href="" class="text-dark"> <i class="fab fa-twitter me-1"></i></a>
                        <a href="" class="text-dark"> <i class="fab fa-linkedin-f me-1"></i></a>
                        <p>
                            {{$post->content}}
                        </p>
                    </div>

                </div>
            </section>
        </div>
    </div>

    @if(auth()->guest())
    Você precisa estar logado...
    @else
        @livewire('comments-section', ['post' => $post])
    @endif
</div>
