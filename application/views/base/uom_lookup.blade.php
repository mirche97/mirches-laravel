<select id="uom_lookup">
@foreach ($uom as $i)
    <option value="{{$i}}">{{$i}}</option>
@endforeach
</select>