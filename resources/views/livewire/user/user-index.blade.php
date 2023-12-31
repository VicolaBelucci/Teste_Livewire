<div>

    <div class="row mt-2 mb-2">
        <div class="input-group input-group-lg">
            <input wire:model.live = 'search' type="search" class="form-control form-control-lg rounded" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
        </div>
    </div>
    <div class="container-fluid d-flex justify-content-between">
        <p class="mb-0" style="color: #939597;">
            <span class="font-weight-bold pe-1">{{$users->count()}}</span>
            Results
        </p>
        @livewire('user.create-user')
    </div>
    <div wire:loading wire:target='search'>
        Procurando...
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
            @isset($users)
                @foreach($users as $user)
                    <tr wire:key = "user-{{$user->id}}">
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>

        <tfoot>
            <tr colspan="4">
                <td>{{$users->links()}}</td>
            </tr>
        </tfoot>
      </table>

</div>
