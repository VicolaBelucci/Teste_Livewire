<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        
        <title>{{ $title ?? 'Page Title' }}</title>
        
    </head>
    <body>
        {{-- <ul class="nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route('user.index')}}">Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('post.index')}}">Posts</a>
            </li>
        
          </ul> --}}
          <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              
              <a class="navbar-brand" href="{{route('post.index')}}">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

              <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav">
                 
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('user.index')}}">Users</a>
                  </li>
                 
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('post.index')}}">Posts</a>
                  </li>

                </ul>
              
              </div>
              @livewire('login')
            </div>
          </nav>

          
        {{ $slot }}
    </body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('js')
</html>

