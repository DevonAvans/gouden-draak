<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>
    <header>
        <div>De gouden draak</div>
        <div>Hier komt marquee</div>
        <div>De gouden draak</div>
    </header>
    <main>
        <section class="title-container">
            <section class="image-container">
                <img src="{{ asset('storage/images/gouden-draak.png') }}" alt="gouden draak">
            </section>
            <section class="content">
                <section>
                    <h1>Chinees Indische specialiteiten</h1>
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
            <section class="image-container mirror">
                <img src="{{ asset('storage/images/gouden-draak.png') }}" alt="gouden draak">
            </section>
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