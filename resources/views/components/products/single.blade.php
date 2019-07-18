<div class="col-md-4">
    <div class="content_box"><a href="details.html">
       <img src="@if($product->img1) {{url($product->img1)}} @else /placeholders/s1.png @endif" class="img-responsive" alt="">
      </a>
    <h4><a href="details.html">{{$product->name}}</a></h4>
    @if( isset($paragraph) )
     <p class="text-center">{{$product->sku}}</p>
     <p class="text-center">{{$product->inventory->availableQuantity}}</p>
    @endif
   <div class="grid_1 simpleCart_shelfItem">
   <div class="item_add"><span class="item_price"><h6>Ksh. @if($product->cost) {{number_format($product->cost,2)}} @else - @endif</h6></span></div>
   <div class="item_add"><span class="item_price"><a data-id="{{$product->id}}" id="add-btn-for-prod-{{$product->id}}" href="#" @if(isset($addClik)) onclick="{{$addClik}}" @endif>{{env("PRODUCT_CTA","Add")}}</a></span></div>
   </div>
 </div>
</div>
