<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="{{ asset('css/kassa.css') }}" rel="stylesheet">
    <link href="{{ asset('css/content.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        @include('components.containers.header-container')
        <section class="marquee">
            <section>
                <p>Welkom bij De Gouden Draak. Klik hiervoor om de aanbiedingen van deze week!</p>
                <p>Welkom bij De Gouden Draak. Klik hiervoor om de aanbiedingen van deze week!</p>
            </section>
        </section>
        @include('components.containers.header-container')
    </header>
    <main>
        <section class="background-components">
            <section class="corner" data-position="top-left">
                @include('components.corner')
            </section>
            <section class="corner" data-position="top-right">
                @include('components.corner')
            </section>
            <section class="corner" data-position="bottom-left">
                @include('components.corner')
            </section>
            <section class="corner" data-position="bottom-right">
                @include('components.corner')
            </section>
            <section class="inner-border-container">
                <section class="inner-border"></section>
            </section>
        </section>
        <section class="title-container">
            @include('components.containers.image-container')
            <section class="content">
                <section>
                    <h1>Chinees Indische Specialiteiten</h1>
                    <h1>De Gouden Draak</h1>
                </section>
                <nav>
                    <div class="box">
                        <a href="{{ route('cashregister.order.create') }}">Bestelling Opnemen</a>
                    </div>
                    <div class="box">
                        <a href="{{ route('table.index') }}">Tafels</a>
                    </div>
                    <div class="box">
                        <a href="{{ route('notifications') }}">Notificaties</a>
                    </div>
                </nav>
            </section>
            @include('components.containers.image-mirror-container')
        </section>
        <section class="content-container">
            @yield('content')
        </section>
        <footer>
            <p><a href="{{ route('contact') }}">Naar contact</a></p>
        </footer>
    </main>
</body>

</html>
