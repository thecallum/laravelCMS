<header style="background: hsl(100, 50%, 50%); display:flex; ">
    <div>Heading</div>

   <ul style="display: flex; ">
       @foreach ($pages as $page)
           <li style="display: block; margin-right: 10px; ">
                <a href="{{ $page['url'] }}">{{ $page['name'] }}</a>
            </li>
       @endforeach
   </ul>
</header>