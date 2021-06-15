@extends('layouts.default')

@section('title', 'Part Admin create')



@section('content')

    @include('admin.components.nav')

    <div class="md:container md:mx-auto px-4 mt-8">
        <h2 class="text-2xl text-center">Part Admin Create</h2>

        <form action="/admin/parts/store" method="POST">
            @csrf
            <table>
                <tr>
                    <td><label for="title">title</label></td>
                    <td><input type="text" name="title" id="title" class="border rounded p-2"></td>
                </tr>
                <tr>
                    <td><label for="subtitle">subtitle</label></td>
                    <td><input type="text" name="subtitle" id="subtitle" class="border rounded p-2"></td>
                </tr>
                <tr>
                    <td><label for="slug">slug</label></td>
                    <td><input type="text" name="slug" id="slug" class="border rounded p-2"></td>
                </tr>
                <tr>
                    <td><label for="description" class="mr-2">description</label></td>
                    <td>
                        <textarea name="description" id="description"
                            cols="50" rows="3" class="border rounded p-2"></textarea>
                    </td>
                </tr>
            </table>
        </form>

    </div>
@endsection
