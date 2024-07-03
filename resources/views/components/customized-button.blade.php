@if($link)

    <a href="{{$link}}" type="submit" class="{{$color}} {{$textColor}} rounded-md p-2 hover:bg-{{$hover}}-400">
        {{$slot}}
    </a>
@else
<button type="submit" class="{{$color}} {{$textColor}} rounded-md p-2 hover:bg-{{$hover}}-400">
    {{$slot}}
</button>

@endif
