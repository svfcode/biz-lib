@extends('layouts.default')

@section('title', 'Для правообладателей')
@section('description', 'Удаляем вашу книгу из библиотеки по вашему желанию при первом обращении')

@section('content')
    @include('components.metrika')

    <div class="md:container md:mx-auto mt-8">

        <h1 class="text-2xl text-center">Карта сайта</h1>

        <div class="w-full px-2 mx-auto mt-8 md:w-3/5">
            <section class="shadow row">
                <div class="tabs">

                    @foreach ($parts as $part)

                    <div class="border-b tab">
                        <div class="border-l-2 border-transparent relative">
                            <input class="w-full h-full absolute z-10 cursor-pointer opacity-0" type="checkbox" id="chck1">
                            <header class="flex justify-between items-center p-5 pl-8 pr-8 cursor-pointer select-none tab-label" for="chck1">
                                <div class="flex flex-wrap items-end">
                                    <h2 class="text-grey-darkest font-thin text-xl">
                                        {{ $part->title }}
                                    </h2>
                                    <a href="/parts/{{science}}" class="ml-4 text-blue-400 hover:text-blue-900 hover:underline z-20 text-sm">[ Перейти в раздел ]</a>
                                </div>
                                <div class="rounded-full border border-grey w-7 h-7 flex items-center justify-center test">
                                    <!-- icon by feathericons.com -->
                                    <svg aria-hidden="true" class="" data-reactid="266" fill="none" height="24" stroke="#606F7B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                        <polyline points="6 9 12 15 18 9">
                                        </polyline>
                                    </svg>
                                </div>
                            </header>
                            <div class="tab-content">
                                <div class="pl-8 pr-8 pb-5 text-grey-darkest">

                    @foreach ($cats as $cat)
                    @if ($cat->part_id == $part->id)
                    <div class="border-b tab">
                        <div class="border-l-2 border-transparent relative">
                            <input class="w-full h-full absolute z-10 cursor-pointer opacity-0" type="checkbox" id="chck1">
                            <header class="flex justify-between items-center p-5 pl-8 pr-8 cursor-pointer select-none tab-label" for="chck1">
                                <div class="flex flex-wrap items-end">
                                    <h3 class="text-grey-darkest font-thin text-base">
                                        {{ $cat->title }}
                                    </h3>
                                    <a href="/" class="ml-4 text-blue-400 hover:text-blue-900 hover:underline z-20 text-sm">[ Перейти в категорию ]</a>
                                </div>
                                <div class="rounded-full border border-grey w-7 h-7 flex items-center justify-center test">
                                    <!-- icon by feathericons.com -->
                                    <svg aria-hidden="true" class="" data-reactid="266" fill="none" height="24" stroke="#606F7B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                        <polyline points="6 9 12 15 18 9">
                                        </polyline>
                                    </svg>
                                </div>
                            </header>
                            <div class="tab-content">
                                <div class="pl-8 pr-8 pb-5 text-grey-darkest">



                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
            </section>
        </div>





    </div>
@endsection
