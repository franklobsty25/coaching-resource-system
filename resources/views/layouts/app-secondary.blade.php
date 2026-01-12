<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Details | Resources</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="shortcut icon" href="{{ asset('../assets/images/logo/favicon.png') }}" type="image/x-icon">
</head>

<body class="theme-light" id="themeBody">

<!-- Top Bar -->
<nav class="navbar px-3 border-bottom" style="background:var(--bodybg-color)">
    <a class="navbar-brand fw-bold">Resource Content</a>
    <span class="small ms-3">{{ $title ?? '' }}</span>
    <div class="ms-auto d-flex gap-2">
{{--        <button class="btn btn-outline-primary btn-sm">Get certificate</button>--}}
        <button class="btn btn-outline-primary btn-sm"><i class="bi bi-share"></i></button>
        <button class="btn btn-outline-primary btn-sm"><i class="bi bi-three-dots-vertical"></i></button>
    </div>
</nav>

<div class="container-fluid">
    {{ $slot }}
</div>

<!-- FLOATING THEME BUTTON -->
<button id="themeToggle" class="btn btn-outline-secondary shadow">
    <i class="bi bi-moon-fill"></i>
</button>

<!-- Footer -->
<footer class="app-footer mt-5">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-9 col-12">
                <ul class="footer-text mb-0">
                    <li>
                        <p class="mb-0">
                            Copyright © <span id="year"></span> Cyclux. All rights reserved
                        </p>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="footer-text text-md-end mb-0">
                    <li>
                        <a href="#">Need Help <i class="bi bi-question-circle"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const body = document.getElementById('themeBody');
    const toggleBtn = document.getElementById('themeToggle');

    if (localStorage.getItem('theme') === 'dark') {
        body.classList.replace('theme-light','theme-dark');
    }

    toggleBtn.addEventListener('click', () => {
        body.classList.toggle('theme-dark');
        body.classList.toggle('theme-light');

        const theme = body.classList.contains('theme-dark') ? 'dark' : 'light';
        localStorage.setItem('theme', theme);

        toggleBtn.innerHTML = body.classList.contains('theme-dark')
            ? '<i class="bi bi-sun-fill"></i>'
            : '<i class="bi bi-moon-fill"></i>';

        body.classList.contains('theme-dark')
            ? categories.classList.remove('bg-light')
            : categories.classList.add('bg-light');

        body.classList.contains('theme-dark')
            ? hero.classList.remove('hero')
            : hero.classList.add('hero');
    });
</script>

</body>
</html>
