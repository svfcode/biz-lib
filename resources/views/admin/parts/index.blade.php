@extends('layouts.default')

@section('title', 'Part Admin Index')

@section('content')
    <div class="md:container md:mx-auto px-4 mt-8">
        @include('admin.components.nav')

        <h2 class="text-2xl text-center">Part Admin Index</h2>
        @include('components.cards')
    </div>
@endsection
