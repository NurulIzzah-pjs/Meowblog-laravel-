<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
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
            <div>
                <h2 class="post_title">Manage User</h2>
                @if(session()->has('message'))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>
                @endif
                <table class="table_design">
                    <tr Class="th_deg">
                        <th>Id</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    @foreach($user as $meowpost)
                        <tr Class="td_deg">
                            <td>{{$meowpost->id}}</td>
                            <td>{{$meowpost->name}}</td>
                            <td>{{$meowpost->email}}</td>
                            <td>
                                <a href="{{url('delete_user',$meowpost->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')">Delete</a>
                            </td>
                            <td>
                                <a href="{{url('edit_user',$meowpost->id)}}" class="btn btn-success" onclick="return confirm('Are you sure to update this?')">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

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
