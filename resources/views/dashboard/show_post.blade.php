<div>
    <h2 class="post_title">Display Post</h2>
    <table class="table_design">
        <tr Class="th_deg">
            <th>Post Title</th>
            <th>Description</th>
            <th>Post By</th>
            <th>Post Status</th>
            <th>Image</th>
        </tr>
        @foreach($post as $meowpost)
        <tr Class="td_deg">
            <td>{{$meowpost->title}}</td>
            <td>{{$meowpost->title}}</td>
            <td>{{$meowpost->title}}</td>
            <td>HI</td>
            <td>HI</td>
        </tr>
        @endforeach
    </table>

</div>
