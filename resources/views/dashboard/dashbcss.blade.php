<meta charset="utf-8" />
<meta name="viewport" content="initial-scale=1, width=device-width" />

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'MEOW') }}</title>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

<link rel="stylesheet" href="./global.css" />
<link rel="stylesheet" href="./dashboard.css" />
<link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Itim:wght@400&display=swap"
/>
<link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Italianno:wght@400&display=swap"
/>
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
