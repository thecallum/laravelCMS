<div>
    <ul style="margin:15px 0 0; padding:0; display:flex; ">
        @foreach ($paths as $path)
            <li style="margin:0 10px 0 0; padding:0; display:block; font-size:16px">
                <a href="#">{{ $path["name"] }}</a>
            </li>
        @endforeach
    </ul>
</div>
