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
        @Component('components.structure.page-title',['title'=>'All invoices'])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Generate report','href'=>route('suppliers.create'),'toolTip'=>'create new supplier','icon'=>'fas fa-file-pdf','classes'=>'btn btn-default btn-xs pull-right'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'invoices'=>''])
        @endcomponent

        <!--custom page design starts-->

        <form class="" action="index.html" method="post">
            <div class="row">

              <div class="col-sm-4">
                <div class="radio-inline"><label><input type="radio" name="status"> All</label></div>
                <div class="radio-inline"><label><input type="radio" name="status"> Paid only</label></div>
                <div class="radio-inline"><label><input type="radio" name="status" checked=""> Unpaid only</label></div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
          				<div class="col-md-12">
          					<div class="input-group input-icon right in-grp1">
          						<span class="input-group-addon">
          							<i class="fa fa-calendar-alt"></i>
          						</span>
          						<input id="email" class="form-control1" type="text" placeholder="Start date">
          					</div>
          				</div>
          				<div class="clearfix"> </div>
          			</div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
          				<div class="col-md-12">
          					<div class="input-group input-icon right in-grp1">
          						<span class="input-group-addon">
          							<i class="fa fa-calendar-alt"></i>
          						</span>
          						<input id="email" class="form-control1" type="text" placeholder="End date">
          					</div>
          				</div>
          				<div class="clearfix"> </div>
          			</div>
              </div>

            </div>
        </form>

        <div class="row">
        @foreach( $invoices as $invoice )
        <?php $color= '#f44336';$status = 'Upaid';?>
        <?php if( $invoice->status ){$color="#8BC34A";$status = 'Paid';} ?>
          @Component('components.dashboard.cta-icon',['title'=>$invoice->user->name,'icon'=>'fa fa-file-invoice-dollar','link'=>route('invoices.show',$invoice->id),'color'=>$color,'status'=>$status,'amount'=>$invoice->amount])@endcomponent
        @endforeach
        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
