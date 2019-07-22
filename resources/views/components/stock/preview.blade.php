<?php $count = 1; ?>
@foreach( $products as $product )
<tr>
  <th><a href="#" style="color:inherit"></a> {{$count}}</th>
  <td>{{$product->id}}</td>
  <td>{{$product->name}}</td>
  <td> <input type="number" value="{{$product->salePrice}}" /> </td>
  <td><input type="number" value="{{$product->inventory->availableQuantity}}" /></td>
</tr>
<?php $count++; ?>
@endforeach
