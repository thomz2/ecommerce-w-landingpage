<div id="card{{ $key }}" class="bg-white rounded-xl shadow-md">
    <img class="rounded-t-xl" src="{{ url($product->img_url) }}" alt="">
    <div class="text-center rounded-b-xl" id="card_info{{ $key }}">
        <h3 class="pacifico-regular text-neutral-800 text-2xl pt-4">{{ $product->name }}</h3>
        <h3 class="text-[#9656a1] py-4 text-2xl font-black">R$ {{ intval($product->price) }},00</h3>
        <div class="hidden text-white">
            <div class="flex flex-row items-center justify-center text-xl gap-x-4">
                <button wire:click.prevent='decrementCount'>-</button>
                <p>{{ $this->count }}</p>
                <button wire:click.prevent='incrementCount'>+</button>
            </div>
        </div>
    </div>
</div>

@script
<script>
    // Selecionar o elemento card_info
    console.log('card_info' + $wire.key)
    const cardInfo = document.getElementById('card_info' + $wire.key);
    const card = document.getElementById('card' + $wire.key);

    // Adicionar evento de hover
    card.addEventListener('mouseover', function() {
        // Mostrar a div hidden
        cardInfo.querySelector('div').style.display = 'block';

        // Mudar a cor de fundo do card_info
        document.getElementById('card' + $wire.key).style.backgroundColor = '#55423d';
        cardInfo.style.backgroundColor = '#55423d';

        // Mudar a cor do segundo h3
        cardInfo.querySelector('h3:nth-of-type(2)').style.color = '#fff';

        // Esconder o primeiro h3
        cardInfo.querySelector('h3:nth-of-type(1)').style.display = 'none';
    });

    // Adicionar evento de quando o mouse sair
    card.addEventListener('mouseout', function() {
        // Esconder a div hidden
        cardInfo.querySelector('div').style.display = 'none';

        // Voltar ao fundo branco original do card_info
        cardInfo.style.backgroundColor = '#ffffff';

        // Voltar a cor original do segundo h3
        cardInfo.querySelector('h3:nth-of-type(2)').style.color = '#9656a1';

        // Mostrar o primeiro h3
        cardInfo.querySelector('h3:nth-of-type(1)').style.display = 'block';
    });
</script>
@endscript