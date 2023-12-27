<div>
    <br>
    @if(session()->has('success'))
        <div class=".bg-success-subtle">{{session()->get('success')}}</div>
        {{-- <span class="text text-success"></span> --}}
    @endif
    <table class="table table-striped">
        <thead>
          <tr>
            {{-- <th scope="col">#</th> --}}
            <th scope="col">User</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr wire:key="post-{{$post->id}}">
                    {{-- <th scope="row">1</th> --}}
                    <td>{{$post->user->name}} - {{$post->user->email}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->content}}</td>
                    <td>
                        <a href="{{ route('post.edit', $post->id) }}">Editar</a> ||
                        <a href="{{ route('post.show', $post->id) }}">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>

    <br>

    <br>

    <div>
        <a href="{{route('post.create')}}" class="btn btn-primary">Criar Post</a>
</div>



