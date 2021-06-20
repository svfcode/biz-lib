@extends('layouts.default')

@section('title', 'Admin - Login')

@section('content')
    <div class="md:container md:mx-auto px-4 mt-8">

        @include('admin.components.errors', [$errors])

        <h2 class="text-2xl text-center">Admin Login</h2>

        <form action="/admin/login" method="POST">
            @csrf
            <div class="login_form_wrap max-w-sm m-auto">
                <div class="relative w-full mb-3">
                    <input type="text" name="name" class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Name" style="transition: all 0.15s ease 0s;" />
                    <small class="p-2 text-red-500">* Name</small>
                </div>
                <div class="relative w-full mb-3">
                    <input type="password" name="password" class="border-0 p-4 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Password" style="transition: all 0.15s ease 0s;" />
                    <small class="p-2 text-red-500">* Password</small>
                </div>
                <div class="text-center mt-6">
                    <input type="submit" name="signin" id="signin" value="Sign In" class="p-3 rounded-lg bg-purple-600 outline-none text-white shadow w-32 justify-center focus:bg-purple-700 hover:bg-purple-500">
                </div>
            </div>
        </form>

    </div>
@endsection
