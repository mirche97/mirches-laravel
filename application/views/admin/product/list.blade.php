
            @foreach($products as $product)
                <tr>
                  <td></td>
                  <td><a href="#" data-pk="{{$product->id}}">{{ $product->ingridient->name }}</a></td>
                  <td><a href="#" data-pk="{{$product->id}}">{{ $product->pack->amount }} {{ $product->pack->uom }}</a></td>
                  <td><a href="#" data-pk="{{$product->id}}">{{ $product->brand->name }}</a></td>
                  <td><a href="#delete-product-modal" data-toggle="modal" data-id="{{$product->id}}" class="btn-danger delete-product-btn">Delete</a></td>
                </tr>
            @endforeach

