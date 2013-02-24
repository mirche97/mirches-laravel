<select id="brand_lookup" name="brand_id">
@foreach ($brands as $brand)
<option value="{{$brand->id}}">{{$brand->name}}</option>
@endforeach
</select>