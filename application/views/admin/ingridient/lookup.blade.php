<select id="ingridient_lookup" name="ingridient_id">
@foreach ($ingridients as $ing)
<option value="{{$ing->id}}">{{$ing->name}}</option>
@endforeach
</select>