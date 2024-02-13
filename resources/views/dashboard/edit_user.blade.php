<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="/public">
    @include('dashboard.dashbcss')
</head>
<body>
{{--    <img class="db-pic-icon" alt="" src="./public/db-pic@2x.png" />--}}
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="dashboard">
        <img class="db-pic-icon" alt="" src="./public/db-pic@2x.png" />
        {{--        <main class="py-4">--}}
        {{--            @yield('content')--}}
        {{--        </main>--}}
        <section class="post-page-section">
            <h1 class="post_title">Update User</h1>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <div>
                <form action="{{ url('/Update_user', $user->id) }}" method="POST">
                    @csrf
                    <div class="div_center">
                        <label>User name</label>
                        <input type="text" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="div_center">
                        <label>User email</label>
                        <input type="email" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="div_center">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </section>


        <div class="navigate">
            <div class="navi"></div>
            <div class="blog-frame-parent">
                <div class="blog-frame">
                    <div class="ellipse-shape"></div>
                </div>
                <div class="nested-blog-frame">
                    <div class="blog">
                        <a href="{{url('my_post')}}">
                            <div class="blog1"></div>
                            <div class="blog2">BLOG</div>
                    </div>
                    <div class="addpost" >
                        <a href="{{url('post_page')}}">
                            <div class="blog1"></div>
                            <div class="add-post">POST</div>
                        </a>
                    </div>
                    <div class="addpost" >
                        <a href="{{url('manage_user')}}">
                            <div class="blog1"></div>
                            <div class="add-post">MANAGE USER</div>
                        </a>
                    </div>
                    <div class="addpost" >
                        <a href="{{url('backtohomepage')}}">
                            <div class="blog1"></div>
                            <div class="add-post">HOME</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="logout-text">
                <div class="logout" id="lOGOUTText">LOGOUT</div>
            </div>
        </div>
    </div>
</div>
{{--<script>--}}
{{--    var addPostLink = document.querySelector('.addpost');--}}
{{--    if (addPostLink) {--}}
{{--        addPostLink.addEventListener('click', function (e) {--}}
{{--            e.preventDefault();--}}
{{--            window.location.href = "{{ url('post_page') }}";--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}
</body>
</html>



