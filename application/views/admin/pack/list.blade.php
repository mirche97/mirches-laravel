
            @foreach($packs as $pack)
                <tr>
                  <td></td>
                  <td><a href="#" data-pk="{{$pack->id}}">{{ $pack->amount }}</a></td>
                  <td><a href="#" data-pk="{{$pack->id}}">{{ $pack->uom }}</a></td>
                  <td><a href="#delete-pack-modal" data-toggle="modal" data-id="{{$pack->id}}" class="btn-danger delete-pack-btn">Delete</a></td>
                </tr>
            @endforeach

