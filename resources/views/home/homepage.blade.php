<!doctype html>
<html>
<head>
  @include('home.homecss')
</head>
<body>
<div class="home">
    <header class="frame-main">
       @include('home.header')
        <div class="blogpost">
        <section class="blog-post">
        <h3 class="blog-post1">Blog Post</h3>
       @include('home.banner')
        <main class="py-4">
            @yield('content')
        </main>
</div>
</body>
</html>
