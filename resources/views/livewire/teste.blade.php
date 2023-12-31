<div>
    <div x-data="{
        show: false,

    }" x-on:show-text.window="show= !show">
        <template x-if="show" >
            <div x-transition>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, error modi? Sapiente incidunt fugit dolor, beatae fuga corrupti sequi! Quo laborum ducimus voluptas eveniet necessitatibus itaque iste nesciunt atque. Laboriosam.</div>
        </template>
        {{-- <button @click=" show = !show ">Toggle</button> --}}
    </div>
</div>
