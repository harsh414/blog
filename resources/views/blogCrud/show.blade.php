@extends('layouts.app')
@section('content')
    <div class="flex flex-col-reverse md:flex-row md:space-x-36 items-center">
        <div class="md:w-1/6 flex-col justify-center items-center">
            <div class="mt-12 md:mt-0">
                <img src="{{$blog->user->img_url}}" alt="avatar" class="w-14 h-14 mx-auto rounded-full">
            </div>
            <div class="text-center font-semibold text-xl mt-4 mb-12">
                {{$blog->user->name}}
            </div>
            <div class="flex-col space-y-2 mt-2 md:mt-6 ">
                <div class="text-center sm:text-2xl md:text-6xl ">
                    {{$blog->num_likes($blog)->count()}}
                </div>
                <button class="text-center cursor-auto text-white bg-black transition ease-in md:ml-6  px-8 py-1 flex items-center focus:outline-none rounded-xl font-semibold">
                    Claps <img src="https://img-premium.flaticon.com/png/128/1478/premium/1478192.png?token=exp=1633457108~hmac=2711a92a4a10affa91ee924bdf4bb33b" class="h-10 w-10 ml-2" alt="">
                </button>
            </div>
        </div>

        <div class="description md:w-5/6 mt-12 md:mt-0 mx-4 md:mx-0">
            <div class="title justify-center">
                <span class="title text-3xl font-bold">{{$blog->title}}</span>
            </div>
            <div class="mt-8 md:mt-12">
                {!! $blog->description !!}
            </div>
        </div>
    </div>
@endsection
