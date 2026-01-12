<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resources Gallery</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>

<body class="theme-light" id="themeBody">

<nav class="navbar border-bottom px-4" style="background:var(--bodybg-color)">
    <a class="navbar-brand fw-bold">Resource Gallery</a>
</nav>

{{ $slot }}

<!-- THEME TOGGLE -->
<button id="themeToggle" class="btn btn-outline-secondary ms-2 btn-sm">
    <i class="bi bi-moon-fill"></i>
</button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const body = document.getElementById('themeBody');
    const toggleBtn = document.getElementById('themeToggle');

    if(localStorage.getItem('theme')==='dark'){
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
