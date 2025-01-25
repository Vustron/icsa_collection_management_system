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
        <a href="{{ route('dashboard.index') }}">1</a>
        <a href="{{ route('student_list.index') }}">2</a>
        <a href="{{ route('payment_management.index') }}">3</a>
        <a href="{{ route('collection_categories.index') }}">4</a>
        <a href="{{ route('transaction.index') }}">5</a>
        <a href="{{ route('reports.index') }}">6</a>
        <a href="{{ route('calendar.index') }}">7</a>
        <a href="{{ route('feedback.index') }}">8</a>
        <a href="{{ route('activity.user.index') }}">9.1</a>
        <a href="{{ route('activity.admin.index') }}">9.2</a>
        <a href="{{ route('activity.system.index') }}">9.3</a>
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
