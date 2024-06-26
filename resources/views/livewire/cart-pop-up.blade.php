<a 
    href="#"
    x-show="$wire.count > 0"
>
    <div class="fixed bottom-4 right-4 z-20">
        <div class="relative bg-amber-950 p-4 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
            </svg>
            <div class="h-6 w-6 text-xs bg-[#9656a1] rounded-full absolute top-0 right-0 flex justify-center items-center">
                <span class="text-white">{{ $this->count }}</span>
            </div>      
        </div>
    </div>
</a>
