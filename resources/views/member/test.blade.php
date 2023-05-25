@isset($data)
    @foreach (json_decode($data->popular) as $item)
        <span style="color: red;">{{ $item }}</span>
    @endforeach
@endisset
