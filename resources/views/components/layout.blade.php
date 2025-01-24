<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page_title')</title> {{-- Default naa sa ride side --}}

    @yield('raw_css_links')
</head>

<body>
    <header>
        heder
    </header>

    <nav>
        nav
        <a href="{{ route('dashboard') }}">1</a>
        <a href="{{ route('student_list') }}">2</a>
        <a href="{{ route('payment_management') }}">3</a>
        <a href="{{ route('collection_categories') }}">4</a>
        <a href="{{ route('transaction') }}">5</a>
        <a href="{{ route('reports') }}">6</a>
        <a href="{{ route('calendar') }}">7</a>
        <a href="{{ route('feedback') }}">8</a>
        <a href="{{ route('activity.user') }}">9.1</a>
        <a href="{{ route('activity.admin') }}">9.2</a>
        <a href="{{ route('activity.system') }}">9.3</a>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer>
        puter
    </footer>

    @yield('js_links')
</body>

</html>
