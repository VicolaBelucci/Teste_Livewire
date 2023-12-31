<div x-data="{
    showModal: false,
    email: '',
    password: '',
    name: '',

    resetForm(){
        this.email = '',
        this.password = '',
        this.name = ''
    }
    }" 
    
    x-on:refresh-user.window="showModal = false"

    x-init="
        window.addEventListener('refresh-user', () => {
            resetForm();
            console.log('oi');
        });
"
>
    <button class="btn btn-primary" @click="showModal = !showModal" x-on:click="resetForm" >Create User Alpine</button>

    <template x-if="showModal">

            <div class="modal show" tabindex="-1" role="dialog" style="display: block;" x-transition>
                <div class="modal-dialog" role="document">    
                    <div class="modal-content">
                        <div class="modal-body">
            
                                <!-- Title -->
                                <h2>Criar Usuário</h2>
            
                                <form class="form" x-on:submit.prevent="$wire.createUser" >
                                    <!-- Card -->
                                    <div class="card-body text-center">
                                        <div class="mt-0 md:mt-0 md:col-span-4">

                                            <div class="mb-3">
                                                <label  class="form-label">Name</label>
                                                <input x-model="$wire.name = name" type="text" class="form-control" >
                                            
                                                @error('name')
                                                    <span class="text text-danger">{{$message}}</span>
                                                 @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Email address</label>
                                                <input x-model="$wire.email = email" type="email" class="form-control">
                                                @error('email')
                                                    <span class="text text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <input x-model="$wire.password = password" type="password" class="form-control" >
                                            </div>
                                                @error('password')
                                                    <span class="text text-danger">{{$message}}</span>
                                                @enderror

                                            

                                            <div class="d-flex justify-content-between">
                                                <button type="submit" class="btn btn-primary" >Submit</button>
                                                <button type="button" class="btn btn-secondary" @click="showModal = false">Cancelar</button>
                                            </div>
                                        </div>
            
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>

    </template>

    <template x-if="showModal" x-transition>
        <div class="modal-backdrop fade show"></div>
    </template>

</div>
