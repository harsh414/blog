<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <livewire:styles/>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script> <!--ckeditor-->
</head>
<body class="font-sans bg-gray-background text-gray-900" x-data="{top:true}">
<header class="fixed bg-gray-500 sm:bg-gray-500 z-50 flex flex-col top-0 left-0 right-0 md:flex-row items-center text-white justify-center md:space-x-12 px-8 md:py-3"
        :class="{'bg-black sm:bg-black md:bg-black lg:bg-black ': !top}"
        @scroll.window="top= (window.pageYOffset)>20 ? false : true">
    <a href="{{route('home')}}" class="flex items-center justify-between space-x-2 hover:text-gray-200" style="text-decoration: none">
        <img src="https://res.cloudinary.com/dkerurdbc/image/upload/v1633546223/BlogArena_Logo_1_e86duh.gif" class="h-12 w-12 rounded-full" alt="">
        <div class="pl-2 text-lg tracking-widest">Blogging Arena</div>
    </a>
    <a href="{{route('addBlog')}}" class="flex items-center justify-between space-x-2 hover:text-gray-200" style="text-decoration: none">
        <div class="pl-4 text-lg tracking-widest">Add Blog</div>
    </a>
    <div class="flex items-center justify-between">
        @if (Route::has('login'))
            <div class="px-6 py-4 sm:block">
                @auth
                    <div class="flex justify-between space-x-6">
                        <div>{{auth()->user()->name}}</div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{route('logout')}}" style="text-decoration: none" class="hover:text-white"
                               onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" style="text-decoration: none" class="hover:text-white">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" style="text-decoration: none" class="ml-4 hover:text-white">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <a href="">
            @if(auth()->user())
                <img src="{{auth()->user()->img_url}}" alt="avatar" class="w-10 h-10 rounded-full">
            @endif
        </a>
    </div>
</header>
<div class="container md:mt-24 max-w-custom mx-auto pt-36 sm:pt-36 md:pt-8">
    @yield('content')
</div>

@yield('scripts')
<livewire:scripts/>
</body>

