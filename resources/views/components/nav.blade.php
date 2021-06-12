
<header>
    <nav>
        <div id="nav_wrap" class="nav_wrap d-flex">
            <h1>@{{ message }}</h1>
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

