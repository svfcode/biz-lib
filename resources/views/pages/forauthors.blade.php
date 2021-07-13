@extends('layouts.default')

@section('title', 'Для правообладателей')
@section('description', 'Удаляем вашу книгу из библиотеки по вашему желанию при первом обращении')

@section('content')
    @include('components.metrika')

    <div class="md:container md:mx-auto px-4 mt-8">
        <h1 class="text-2xl text-center">Информация для правообладателей</h1>

        <div>
            <h2 class="mt-16">
                Уважаемые авторы!
            </h2>
            <p class="my-2">
                Все книги взяты из открытых источников в интернете и собраны на сайте исключительно для
                ознакомления пользователей.
            </p>
            <p class="my-2">
                Удаляем вашу книгу по вашему желанию при первом обращении, также есть возможность
                размещения вашей рекламной информации на страницах с вашей книгой.
            </p>
            <p class="my-2">
                Электронная почта для приема обращений
                <a href="mailto:libteka@mail.ru" class="text-purple-700 hover:underline">libteka@mail.ru</a>
            </p>
        </div>
    </div>
@endsection
