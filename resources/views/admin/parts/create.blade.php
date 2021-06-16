@extends('layouts.default')

@section('title', 'Part Admin create')



@section('content')

    <div class="md:container md:mx-auto px-4 mt-8">
        @include('admin.components.nav')

        @include('admin.components.errors', [$errors])

        <h2 class="text-2xl text-center">Part Admin Create</h2>

        <form action="/admin/parts" method="POST" enctype="multipart/form-data">
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
                <tr>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button
                            type="submit"
                            class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline"
                        >
                        Save
                        </button>
                    </td>
                </tr>
            </table>
        </form>

    </div>
@endsection
