@if ($errors->any())
    <div class="text-red border p-4 m-4">
        <div class="-m-2 text-center">
            @foreach ($errors->all() as $error)
                <div class="p-2">
                    <div class="inline-flex items-center bg-white leading-none text-pink-600 rounded-full p-2 shadow text-teal text-sm">
                        <span class="inline-flex bg-pink-600 text-white rounded-full h-6 px-3 justify-center items-center">
                            [ERROR]
                        </span>
                        <span class="inline-flex px-2">
                            {{ $error }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
