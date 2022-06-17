<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/content.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        @include('components.header-container')
        <section>
            <p>
                Welkom bij De Gouden Draak. Klik op deze tekst om de aanbiedingen van deze week te zien!
            </p>
        </section>
        @include('components.header-container')
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
            @include('components.image-container')
            <section class="content">
                <section>
                    <h1>Chinees Indische Specialiteiten</h1>
                    <h1>De Gouden Draak</h1>
                </section>
                <nav>
                    <div class="box">
                        <a href="{{ route('menu') }}">Menukaart</a>
                    </div>
                    <div class="box">
                        <a href="{{ route('news') }}">Nieuws</a>
                    </div>
                    <div class="box">
                        <a href="{{ route('contact') }}">Contact</a>
                    </div>
                </nav>
            </section>
            @include('components.image-mirror-container')
        </section>
        <section class="content-container">
            @yield('content')
        </section>
    </main>
    <footer>
        <p><a href="">Naar contact</a></p>
    </footer>
</body>

</html>