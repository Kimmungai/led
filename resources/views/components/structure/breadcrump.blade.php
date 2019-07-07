<ul class="breadcrumb">

  @if( isset($home) )
  <li>
    @if($home!='')
      <a href="{{$home}}">Home</a>
    @else
      Home
    @endif
  </li>
  @endif

  @if( isset($sales) )
  <li>
    @if($sales!='')
      <a href="{{$sales}}">Sales</a>
    @else
      Sales
    @endif
  </li>
  @endif

  @if( isset($newSale) )
  <li>
    @if($newSale!='')
      <a href="{{$newSale}}">New sale</a>
    @else
      New sale
    @endif
  </li>
  @endif

  @if( isset($newSalePayment) )
  <li>
    @if($newSalePayment!='')
      <a href="{{$newSalePayment}}">New sale payment</a>
    @else
      New sale payment
    @endif
  </li>
  @endif

</ul>
