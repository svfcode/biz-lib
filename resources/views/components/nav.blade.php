
<header>
    <nav class="flex bg-gray-100 shadow-lg">
        <div class="nav_logo p-2">
            <h1><a href="/" class="font-bold text-2xl">Libteka</a></h1>
        </div>
        <div id="nav_wrap" class="nav_wrap flex p-2 max-w-xs m-auto justify-between">
            <div class="nav_parts">
                <div class="nav_part_select cursor-pointer">Разделы</div>
            </div>
            <div class="nav_categories">
                <div class="nav_categories_select cursor-pointer pl-2">Категории</div>
            </div>
            {{-- search --}}
            {{-- forum --}}
        </div>
    </nav>

    <script>
        var app = new Vue({
            el: '#nav_wrap',
            data: {
                message: 'Libteka'
            }
        })
    </script>
</header>

