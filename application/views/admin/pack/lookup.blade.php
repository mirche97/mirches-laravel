<select id="pack_lookup" name="pack_id">
@foreach ($packs as $pack)
<option value="{{$pack->id}}">{{$pack->amount}} {{$pack->uom}}</option>
@endforeach
</select>