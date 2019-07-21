<ul class="breadcrumb mt-1">

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

  @if( isset($purchases) )
  <li>
    @if($purchases!='')
      <a href="{{$purchases}}">Purchases</a>
    @else
      Purchases
    @endif
  </li>
  @endif

  @if( isset($newPurchase) )
  <li>
    @if($newPurchase!='')
      <a href="{{$newPurchase}}">New purchase</a>
    @else
      New purchase
    @endif
  </li>
  @endif

  @if( isset($stock) )
  <li>
    @if($stock!='')
      <a href="{{$stock}}">Stock</a>
    @else
      Stock
    @endif
  </li>
  @endif

  @if( isset($customers) )
  <li>
    @if($customers!='')
      <a href="{{$customers}}">Customers</a>
    @else
      Customers
    @endif
  </li>
  @endif

  @if( isset($newCustomer) )
  <li>
    @if($newCustomer!='')
      <a href="{{$newCustomer}}">New Customer</a>
    @else
      New Customer
    @endif
  </li>
  @endif

  @if( isset($suppliers) )
  <li>
    @if($suppliers!='')
      <a href="{{$suppliers}}">Suppliers</a>
    @else
      Suppliers
    @endif
  </li>
  @endif

  @if( isset($newSupplier) )
  <li>
    @if($newSupplier!='')
      <a href="{{$newSupplier}}">New Supplier</a>
    @else
      New Supplier
    @endif
  </li>
  @endif

  @if( isset($invoices) )
  <li>
    @if($invoices!='')
      <a href="{{$invoices}}">Invoices</a>
    @else
      Invoices
    @endif
  </li>
  @endif

  @if( isset($newInvoice) )
  <li>
    @if($newInvoice!='')
      <a href="{{$newInvoice}}">New invoice</a>
    @else
      New invoice
    @endif
  </li>
  @endif

  @if( isset($staff) )
  <li>
    @if($staff!='')
      <a href="{{$staff}}">All staff</a>
    @else
      All staff
    @endif
  </li>
  @endif

  @if( isset($admins) )
  <li>
    @if($admins!='')
      <a href="{{$admins}}">All admins</a>
    @else
      All admins
    @endif
  </li>
  @endif

  @if( isset($users) )
  <li>
    @if($users!='')
      <a href="{{$users}}">Users</a>
    @else
      Users
    @endif
  </li>
  @endif

  @if( isset($newUser) )
  <li>
    @if($newUser!='')
      <a href="{{$newUser}}">New user</a>
    @else
      New user
    @endif
  </li>
  @endif

  @if( isset($detailedReport) )
  <li>
    @if($detailedReport!='')
      <a href="{{$detailedReport}}">Detailed report</a>
    @else
      Detailed report
    @endif
  </li>
  @endif

  @if( isset($quickReport) )
  <li>
    @if($quickReport!='')
      <a href="{{$quickReport}}">Quick report</a>
    @else
      Quick report
    @endif
  </li>
  @endif

  @if( isset($organisations) )
  <li>
    @if($organisations!='')
      <a href="{{$organisations}}">Organisations</a>
    @else
      Organisations
    @endif
  </li>
  @endif

  @if( isset($newOrganisation) )
  <li>
    @if($newOrganisation!='')
      <a href="{{$newOrganisation}}">New organisation</a>
    @else
      New organisation
    @endif
  </li>
  @endif

  @if( isset($trash) )
  <li>
    @if($trash!='')
      <a href="{{$trash}}">Trash</a>
    @else
      Trash
    @endif
  </li>
  @endif

  @if( isset($specifiedLinked) )
  <li>
    @if($specifiedLinked!='')
      <a href="{{$specifiedLinked}}">{{$specifiedText}}</a>
    @endif
  </li>
  @endif

  @if( isset($specified) )
  <li>
    {{$specified}}
  </li>
  @endif



</ul>
