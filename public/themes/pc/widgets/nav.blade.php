<ul>
    @foreach($navs as $key => $item)
    <li class="{{ active_class($item->active) }}">
        <a href="{{ $item->url }}">{{ $item->name }}</a>
        @if(isset($item->sub) && count($item->sub) > 0)
        <dl>
            @foreach($item->sub as $sub_key => $sub_item)
            <dd><a href="{{ $sub_item->url }}">{{ $sub_item->name }}</a></dd>
            @endforeach
        </dl>
        @endif
    </li>
    @endforeach
</ul>