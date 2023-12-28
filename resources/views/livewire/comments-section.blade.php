<div>
    <section>
        <div class="row d-flex" id="comments-form">
            <div class="col-md-12 col-lg-10 col-xl-8">
                @include('commentForm')
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

                                
                                @livewire('comment', ['comment' => $comment, 'post' => $post], key(uniqId())) {{--Esse negocio do uniqId() é porque como o componente reply
                                                                                                                 tem relacionamentos com o componente comment, então passar 
                                                                                                                a key como o id de comment da erro, não se sabe porquê.... 
                                                                                                                Então tem que passar desse jeito aí--}}
                    
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
