<div>
    @if(session()->has('success'))
        <span class="text text-success">{{session()->get('success')}}</span>
    @endif
    <ul>
        @foreach($posts as $post)
            <li>{{$post->title}} - <a href="{{ route('post.edit', $post->id) }}">Editar</a>
                <a href="{{ route('post.show', $post->id) }}">Ver</a>
            </li>
        @endforeach
    </ul>

    <br>

    <br>

    <div>
        <a href="{{route('post.create')}}" class="btn btn-primary">Criar Post</a>
    </div>
</div>

