@extends('layouts.app')
@section('content')
    <div class="addnewblog-container my-6 space-y-10">
        <h1 class="text-center text-gray-600 font-bold tracking-widest text-3xl" style="font-family:'cursive'">ADD NEW BLOG</h1>
    </div>
    <p class="text-lg text-center text-gray-600 mt-4">Add new blogs and help the world grow</p>
    <div x-data="{flashMessage:true}" class="mt-12">
        @if($errors->any())
            <div class="bg-gray-500 text-center py-2 lg:px-4 mb-4" x-show="flashMessage">
                <div class="p-1 bg-gray-800 items-center text-white leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                    <span class="font-semibold mr-2 text-left flex-auto">{{$errors->first()}}</span>
                    <svg @click="flashMessage=false" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer h-6 w-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
        @endif
        @if(session()->has('message'))
            <div class="bg-gray-500 text-center py-2 lg:px-4 mb-4" x-show="flashMessage">
                <div class="p-1 bg-gray-800 items-center text-white leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                    <span class="font-semibold mr-2 text-left flex-auto">{{session()->get('message')}}</span>
                    <svg @click="flashMessage=false" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer h-6 w-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
        @endif
    </div>
    <form action="{{route('blog.update.store',$blog->id)}}" method="POST" enctype="multipart/form-data" class="px-3 py-6">
        {{@csrf_field()}}
        <div>
            <input type="text" name="title" value="{!! $blog->title !!}" id="title" class="bg-white text-sm border-none w-full text-sm rounded mt-4 placeholder-gray-500" placeholder="Enter Blog title" >
        </div>
        <div class="mt-12">
            <textarea name="blog-description" id="blog-description" rows="16" class="w-full z-10 bg-gray-100 rounded-xl border-none placeholder-gray-900 text-sm px-4 py-2" placeholder="Blog description goes here">{!! $blog->description !!}</textarea>
        </div>
        <div class="flex items-center justify-between space-x-3 mt-2">
            <button type="submit" class="flex items-center justify-center w-1/2 md:w-1/6 h-9 text-xs bg-blue-600 text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                <span class="ml-1">Update Now</span>
            </button>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#blog-description' ), {
                toolbar: ['heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList'],
            })
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
