@extends('layouts.app')
@section('content')
    <div class="search-dropdown">
        <livewire:search-dropdown/>
    </div>
    <div class="experiences-container my-6 space-y-10" x-data="{flashMessage:true}">
        @if(session()->has('removal_success'))
            <div class="bg-indigo-900 text-center py-2 lg:px-4 mb-4" x-show="flashMessage">
                <div class="p-1 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                    <span class="font-semibold mr-2 text-left flex-auto">{{session()->get('removal_success')}}</span>
                    <svg @click="flashMessage=false" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer h-6 w-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
        @endif

        @foreach($blogs as $blog)
            <div class="blogs-container flex flex-col-reverse sm:flex-col-reverse md:flex-row bg-white rounded-xl">
                <!--     |votes| |profile| |all other information|     flex flow   -->
                @if(auth()->user())
                    <livewire:like-update :blog="$blog"/>
                @else
                    <div class="border-r border-gray-100 px-5 py-4 sm:py-4 md:py-12 flex flex-col items-center text-center bg-gray-200 md:w-1/6"> <!-- likes container-->
                        <div class="text-center sm:text-2xl md:text-3xl font-extrabold">
                            {{$blog->num_likes($blog)->count()}}
                        </div>

                        <img src="https://img-premium.flaticon.com/png/128/1478/premium/1478192.png?token=exp=1633457108~hmac=2711a92a4a10affa91ee924bdf4bb33b" class="h-10 w-10 md:mt-2" alt="">
                        <div class="mt-3 sm:mt-3 md:mt-8">
                            <a href="{{route('login')}}">
                                <button class="text-center border border-gray-300  px-5 py-2 focus:outline-none rounded-xl font-semibold">
                                    Clap <img src="https://img-premium.flaticon.com/png/128/1478/premium/1478192.png?token=exp=1633457108~hmac=2711a92a4a10affa91ee924bdf4bb33b" class="h-4 w-4 ml-2" alt="">
                                </button>
                            </a>
                        </div>
                    </div>
                @endif

                <div class="profile-container bg-gray-100 border-r text-center border-gray-100 px-2 py-5 md:w-1/6"> <!-- profile container-->
                    <div>
                        <img src="" alt="avatar" class="w-10 h-10 mx-auto rounded-full">
                    </div>
                    <div class="text-center font-semibold text-xs mt-2">
                           asdsdsd a sd
                    </div>
                    <div class="mt-2 sm:mt-2 text-center md:mt-4 text-xs md:w-28">
                        asdasd
                    </div>
                </div>

                <div class="description py-2 pl-1 pr-3 md:w-4/6">
                    <div class="flex-col">
                        <div class="flex justify-between px-2  text-xs border-b border-gray-100">
                            <div class="font-semibold">
                                Category:
                                <span class="font-normal"></span>
                            </div>
                            <div class="font-semibold ml-8 sm:ml-8 md:ml-28">
                                Company:
                                <span class="font-normal"></span>
                            </div>
                        </div>

                        <div class="description px-3 py-3">
                            <div class="title text-lg font-semibold mt-2">
                                sdasdasd asdsd
                            </div>
                            <div class="mt-3 text-sm">
                                asdasdkj sandas dasdsd s
                            </div>
                        </div>

                        <div class="flex items-center justify-start px-4 md:mt-6 ml-4">
                            <div class="text-gray-500 text-xs space-x-2">{{$blog->created_at->diffForHumans()}}</div>
                            <div class="flex ml-52 sm:ml-52 md:ml-28">
                                <a href="">
                                    <button class="bg-gray-300 focus:outline-none rounded-xl font-semibold px-4 py-0.5 mb-1">
                                        Open
                                    </button>
                                </a>
                                @if(auth()->user())
                                    <button class="relative bg-gray-100 focus:outline-none rounded-full h-7 px-2 py-0.5 ml-3" x-data="{toggleOpen:false}"
                                            @click="toggleOpen = !toggleOpen">
                                        <svg fill="currentColor" width="24" height="6"><path fill="#73767a" d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                                        <ul @click.away="toggleOpen=false" class="absolute text-left space-y-2 pl-2 ml-12 w-36 sm:w-36 md:w-44 shadow-lg bg-white rounded-xl py-2" x-show="toggleOpen">
                                            @if(auth()->user())
                                                <form action="" method="POST">
                                                    {{@csrf_field()}}
                                                    <li>
                                                        <a class="bg-white hover:bg-gray-200 block transition duration-150 ease-in" onclick="$(this).closest('form').submit();">

                                                        </a>
                                                    </li>
                                                </form>
                                            @endif
                                            @if(auth()->user())
                                                <form action="" method="POST">
                                                    {{@csrf_field()}}
                                                    <li>
                                                        <a class="bg-white hover:bg-gray-200 block transition duration-150 ease-in" onclick="$(this).closest('form').submit();">
                                                            Delete Experience  <!--if it belongs to auth user -->
                                                        </a>
                                                    </li>
                                                </form>
                                            @endif
                                        </ul>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
