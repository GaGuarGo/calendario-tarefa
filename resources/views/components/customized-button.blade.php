@if($link)

    <a href="{{$link}}" type="submit" class="bg-yellow-200 text-yellow-700 rounded-md p-2 hover:bg-yellow-400">
        {{$slot}}
    </a>
@else
<button type="submit" class="bg-{{$color}}-200 text-{{$color}}-700 rounded-md p-2 hover:bg-{{$color}}-400">
    {{$slot}}
</button>

@endif
