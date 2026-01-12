<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Learning | Resources</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('../assets/images/logo/favicon.png') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>

<body class="theme-light" id="themeBody">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg  shadow-sm py-3">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="#">Resources</a>

        <form class="d-none d-lg-flex w-50 mx-4">
            <input class="form-control rounded-pill" type="search" placeholder="Search for anything">
        </form>

        <div class="ms-auto d-flex align-items-center gap-3">
            {{--            <a href="#" class="text-decoration-none text-dark">Udemy Business</a>--}}
            {{--            <a href="#" class="text-decoration-none text-dark">Teach on Udemy</a>--}}
            @guest
            <a href="{{ route('login') }}" role="button" class="btn btn-outline-dark">Log in</a>
            <a href="{{ route('register') }}" role="button" class="btn btn-primary">Sign up</a>
            @endguest
        </div>
    </div>
    <button id="themeToggle" class="btn btn-outline-secondary ms-2 btn-sm">
        <i class="bi bi-moon"></i>
    </button>
</nav>

<!-- Hero -->
<section class="hero py-5" id="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="fw-bold display-5">
                    Learn without <span class="text-primary">limits</span>
                </h1>
                <p class="text-muted fs-5 mt-3">
                    Start, switch, or advance your career with more than 220,000 courses from world-class universities
                    and companies.
                </p>

                <div class="mt-4">
                    <a href="{{ route('register') }}" role="button" class="btn btn-primary btn-lg me-3">Join for Free</a>
                    <a href="{{ route('welcome') }}" role="button" class="btn btn-outline-dark btn-lg">Coaching Resources</a>
                </div>

                <div class="mt-4 small text-muted">
                    ⭐ 67M+ learners trust us
                </div>
            </div>

            <div class="col-lg-6 text-center">
                <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d"
                     class="img-fluid rounded shadow" alt="">
            </div>
        </div>
    </div>
</section>

<!-- Top Categories -->
<section class="py-5 bg-light" id="categories">
    <div class="container">
        <h3 class="fw-bold mb-4">Top Categories</h3>

        <livewire:resources.components.categories />
    </div>
</section>

<!-- Featured Courses -->
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h3 class="fw-bold">Featured Resources</h3>
{{--            <a href="#" class="text-primary fw-semibold">View all resources →</a>--}}
        </div>

        <livewire:resources.components.resources />
    </div>
</section>

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


<script>
    const body = document.getElementById('themeBody');
    const toggleBtn = document.getElementById('themeToggle');
    const hero = document.getElementById('hero');
    const categories = document.getElementById('categories');

    if (localStorage.getItem('theme') === 'dark') {
        body.classList.replace('theme-light', 'theme-dark');
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
