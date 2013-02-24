
            @foreach($brands as $brand)
                <tr>
                  <td></td>
                  <td><a href="#" data-pk="{{$brand->id}}">{{ $brand->name }}</a></td>
                  <td><a href="#delete-brand-modal" data-toggle="modal" data-id="{{$brand->id}}" class="btn-danger delete-brand-btn">Delete</a></td>
                </tr>
            @endforeach

