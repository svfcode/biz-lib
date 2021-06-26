@extends('layouts.default')

@section('title', 'Главная')

@section('content')
    <div class="md:container md:mx-auto px-4 mt-8">

        <div class="book_show max-w-2xl m-auto mt-4">
            <h2 class="text-2xl text-center my-2"> {{ $book->title }} </h2>
            <span class="bg-blue-400 border border-blue-700 p-1 rounded text-sm ml-2">
                {{ $book->year }}
            </span>
            <span class="bg-blue-400 border border-blue-700 p-1 rounded text-sm ml-2">
                {{ $book->author }}
            </span>
            <p class="mt-4 flex">
                <span class="">
                    <img src="/img/books/{{ $book->img }}" alt="{{ $book->imgalt }}" class="mr-4 mb-2 w-1/2 float-left">
                    {{ $book->description }}
                </span>
            </p>
            <div class="book_download">
                <button
                            class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline"
                        >
                        <a href="/{{ Request::path() }}/download">Скачать</a>
                        </button>
            </div>
        </div>

    </div>
@endsection
