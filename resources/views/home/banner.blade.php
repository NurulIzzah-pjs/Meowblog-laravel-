
<div class="peakpx-rectangle">
    @foreach($post as $blogpost)
<div class="niki-text">
    <img
        class="peakpx-icon"
        loading="eager"
        alt=""
        src="/postimage/{{$blogpost->image}}"
    />
<h4 class="caption">{{$blogpost->title}}</h4>
    <p class="postby" >Post by <b>{{$blogpost->name}}</b></p>
    <button class="frame-text">
        <div class="niki"><a href="{{url('post_details',$blogpost->id)}}">Read More</a></div>
    </button>
</div>

    @endforeach

</div>
</section>
</div>
