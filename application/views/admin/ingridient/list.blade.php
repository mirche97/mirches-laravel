
            @foreach($ingridients as $ingridient)
                <tr>
                  <td></td>
                  <td><a href="#" data-pk="{{$ingridient->id}}">{{ $ingridient->name }}</a></td>
                  <td><a href="#delete-ingridient-modal" data-toggle="modal" data-id="{{$ingridient->id}}" class="btn-danger delete-ingridient-btn">Delete</a></td>
                </tr>
            @endforeach

