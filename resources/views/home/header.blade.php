<img
    class="pic-icon"
    loading="eager"
    alt=""
    src="./public/pic@2x.png"
/>

<div class="blog-login-register">
    <div class="blog">HOME</div>
    @if (Route::has('login'))
        @auth
    <a href="{{url('my_post')}}"class="blog">BLOG</a>
            <a href="{{route('login')}}" class="blog">DASHBOARD</a>
        @else
    <a href="{{route('login')}}" class="blog">LOGIN</a>
    <a href="{{route('register')}}" class="blog">REGISTER</a>
        @endif
    @endif
</div>
<div class="pic-frame">
    <div class="contact-me-about-cat">
        <button class="contact-me">
            <div class="about-my-cat">Contact me</div>
        </button>
        <button class="contact-me2">
            <div class="about-my-cat">About My Cat</div>
        </button>
    </div>
</div>
</header>
