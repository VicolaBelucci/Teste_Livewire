<x-layouts.app>
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="card-body text-center">
            <div class="mt-0 md:mt-0 md:col-span-4">

                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" name="email" id="email" class="form-control">
                    @error('email')
                        <span class="text text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" >
                
                    @error('password')
                        <span class="text text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary" >Submit</button>
                    <button type="button" class="btn btn-secondary" >Cancelar</button>
                </div>
            </div>
    </form>
</x-layouts-app>
