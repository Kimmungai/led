@extends('layouts.app')

@section('content')
 <body class="sticky-header left-side-collapsed">
    <section>

    <!-- left side start-->
    @Component('components.structure.side-menu')
    @endcomponent
    <!-- left side end-->

		<!-- main content start-->
		<div class="main-content">

			<!-- header-starts -->
      @Component('components.structure.header-menu')
      @endcomponent
		 <!-- //header-ends -->

     <!--body wrapper start-->
			<div id="page-wrapper">
        @Component('components.structure.page-title',['title'=>'Inventory'])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Download','href'=>'#','toolTip'=>'Download list','icon'=>'fas fa-download','classes'=>'btn btn-default btn-xs pull-right','click'=>'confirm_modal("deleteOrgConfirmModal")'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'specified'=>'Inventory'])
        @endcomponent

        <!--custom page design starts-->
        <div class="row">

          <div class="col-md-12">
            <div class="products-selection-section">

              

              <!--@Component('components.pos.tabs',['type'=>$type])@endcomponent-->

              <!--products-->
                <div class="row">
                  <!--@foreach($products as $product)
                    @Component('components.products.single',['paragraph'=>'','product'=>$product])@endcomponent
                  @endforeach-->
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <th>Code</th>
                          <th>Name</th>
                          <th>Price (Ksh.)</th>
                          <th>Inventory (Kg)</th>
                        </thead>
                        <tbody id="stock-prods">
                          @foreach( $products as $product )

                            <tr id="stock-prods-{{$product->id}}">
                              <td><span class="fas fa-times-circle pointer" onclick="remove_row_and_submit('stock-prods-{{$product->id}}','stock-prods-{{$product->id}}-remove-form')"></span> {{$product->id}}</td>
                              <td><input class="form-control1" type="text" value="{{$product->name}}" onchange="update_prod({{$product->id}},this.value,'name')"></td>
                              <td><input class="form-control1" type="number" value="{{$product->salePrice}}" onchange="update_prod({{$product->id}},this.value,'salePrice')" min="0"></td>
                              <td><input class="form-control1" type="number" value="{{$product->Inventory->availableQuantity}}" onchange="update_prod({{$product->id}},this.value,'availableQuantity')" min="0"></td>
                            </tr>

                            <form class="d-none hidden" id="stock-prods-{{$product->id}}-remove-form" action="{{route('stock.destroy',$product->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                            </form>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>

                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  {{$products->links()}}
                </div>
              </div>
              <!--products end-->

              <!--<a href="#" class="btn btn-info br0 pull-right">
                Update
              </a>-->

            </div>


        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
