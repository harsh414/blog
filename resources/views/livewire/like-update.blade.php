<div class=" px-5 py-4 flex flex-col items-center sm:py-4 md:py-12 text-center md:w-1/6"> <!-- votes container-->
    <div class="text-center sm:text-2xl md:text-3xl font-extrabold">
        {{$blog->num_likes($blog)->count()}}
    </div>

    <img src="https://img-premium.flaticon.com/png/128/1478/premium/1478192.png?token=exp=1633457108~hmac=2711a92a4a10affa91ee924bdf4bb33b" class="h-12 w-12" alt="">
    <div class="mt-3 sm:mt-3 md:mt-8">
        @if($blog->ifLikedBy(auth()->user(), $blog))
            <button wire:click="likeUpdate" class="text-center text-white bg-black transition ease-in  px-5 py-2 focus:outline-none rounded-xl font-semibold">
                You Clapped
            </button>
        @else
            <button wire:click="likeUpdate" class="text-center border border-gray-300 bg-gray-200 px-5 py-2 focus:outline-none rounded-xl font-semibold">
                Clap <img src="https://img-premium.flaticon.com/png/128/1478/premium/1478192.png?token=exp=1633457108~hmac=2711a92a4a10affa91ee924bdf4bb33b" class="h-4 w-4 ml-2" alt="">
            </button>
        @endif
    </div>
</div>
