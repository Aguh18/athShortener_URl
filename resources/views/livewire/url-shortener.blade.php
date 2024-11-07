<main class="  bg-gradient-to-br from-[#5FC1FE] overflow-hidden   to-[#397398]  ">
    @include('components.nav')

    <section class="h-screen flex-col  w-full flex overflow-hidden  z-0  py-[5%] relative   ">
        <div class="w-full my-[4%]  flex flex-col gap-7 items-center justify-center z-10 ">
            <h1 class="text-5xl text-center text-white ">AthShortener Url</h1>
            <p class="text-xl text-center text-white ">Shorten your long URLs for a more efficient and shareable
                experience.</p>
        </div>
        <div class="z-10 flex items-center justify-center ">
            <form wire:submit='generateShortUrl' class="w-1/3 ">

                <div class="relative ">

                    <input type="text" id="originalUrl" wire:model="originalUrl"
                        class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Put Our Url Here" required />
                    <button type="submit"
                        class="absolute bottom-0 w-1/5 h-full px-4 text-sm font-medium text-white bg-[#A3BEFB] rounded-lg end-0 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">Submit</button>
                </div>
            </form>
        </div>
        @if ($shortCode)
        <div class="z-10 w-full h-full " >
            <div class="flex items-center  text-sm  mx-[25%] mt-10 rounded-lg   text-gray-500 border  border-gray-300 bg-gray-50  h-14   " >
                <div class="flex items-center justify-center w-[90%] h-full text-center  " > {{ $shortCode }}</div>
                <div class="flex items-center justify-center w-[10%] h-full p-2 bg-pink-50 " > <button  x-clipboard.raw="{{ $shortCode  }}" class="w-auto h-full "> <img class="w-auto h-full " src=" images/copy.png " alt=""> </button> </div>
            </div>

        </div>
        @endif


        <img class="absolute  bottom-auto z-0  w-[100%] h-auto -right-0  top-0  pointer-events-none  "
            src="images/Group 5.svg" alt="">
    </section>
    <section class="top-0 z-20 w-screen h-screen ">

    </section>


    {{-- Allert error --}}
    @foreach ($errors as $alert)
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
            class="fixed bottom-0 right-[3%] z-50 flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 animate-slideUpAndFade"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Error</span>
            <div class="text-xl">{{ $alert }}</div>
        </div>
    @endforeach

    {{-- Allert success --}}
    <template x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition
        class="fixed bottom-0 right-[3%] z-50 flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 animate-slideUpAndFade"
        role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Error</span>
        <div class="text-xl">babi kalian</div>
    </template>




</main>
