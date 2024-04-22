<section class="w-full flex flex-col justify-center items-center">
    <div class="text-center">
        <h3 class="font-bold text-xl uppercase text-red-300">Produtos</h3>
        <h2 class="pacifico-regular text-6xl mt-1 text-neutral-800">As Melhores Peças</h2>
    </div>
    <div class="sm:w-[60%] grid grid-cols-4 grid-rows-3 gap-8 my-12 rounded-[29px]">
        @foreach ($roupas as $roupa)
            @livewire('produto-card', ['roupa' => $roupa], key($roupa->id))
        @endforeach
    </div>
</section>
