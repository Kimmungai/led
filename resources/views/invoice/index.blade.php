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

        @Component('components.form-inputs.link',['title'=>'Generate report','href'=>'#','toolTip'=>'Generate a report from invoices','icon'=>'fas fa-file-pdf','classes'=>'btn btn-default btn-xs pull-right','click'=>'confirm_modal("newReportConfirmModal")'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'invoices'=>''])
        @endcomponent

        <!--custom page design starts-->

        <form class="" action="{{route('invoices.index')}}" method="get">
            <div class="row">
              <input type="hidden" name="filter" value="1">

              <div class="col-sm-4">
                <div class="radio-inline"><label><input type="radio" name="status" value="-1" @if(isset($_GET['status'])) @if($_GET['status']==-1) checked @endif @else checked @endif > All</label></div>
                <div class="radio-inline"><label><input type="radio" name="status" value="1" @if(isset($_GET['status'])) @if($_GET['status']==1) checked @endif @endif > Paid only</label></div>
                <div class="radio-inline"><label><input type="radio" name="status" value="0" @if(isset($_GET['status'])) @if($_GET['status']==0) checked @endif @endif> Unpaid only</label></div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
          				<div class="col-md-12">
          					<div class="input-group input-icon right in-grp1">
          						<span class="input-group-addon">
          							<i class="fa fa-calendar-alt"></i>
          						</span>
          						<input id="start-date" name="start_date" class="form-control1" type="text" placeholder="Start date" value="@if(isset($_GET['start_date'])){{$_GET['start_date']}} @endif">
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
          						<input id="end-date" name="end_date" class="form-control1" type="text" placeholder="End date" value="@if(isset($_GET['end_date'])){{$_GET['end_date']}} @endif">
          					</div>
          				</div>
          				<div class="clearfix"> </div>
          			</div>
              </div>

            </div>

            <div class="row">

                <div class="col-md-8">
                  <?php $selected = ''; ?>
                  <?php if(isset($_GET['customer_id'])){$selected = $_GET['customer_id'];} ?>
                  @Component('components.form-inputs.model-select',['title' => 'Customer','name'=>'customer_id','icon'=>'fas fa-users','options'=>$customers,'required'=>false,'selected'=>$selected])@endcomponent
                </div>

              <div class="col-sm-4">
                <button class="pull-right" type="submit" name="button"><span class="fas fa-search"></span> Filter</button>
              </div>
            </div>

        </form>

        <div class="row">
        @forelse( $invoices as $invoice )
        <?php $color= '#f44336';$status = 'Upaid';?>
        <?php if( $invoice->status ){$color="#8BC34A";$status = 'Paid';} ?>

          @Component('components.dashboard.cta-icon',['title'=>$invoice->user->name,'icon'=>'fa fa-file-invoice-dollar','link'=>route('invoices.show',$invoice->id),'color'=>$color,'status'=>$status,'amount'=>$invoice->amount,'selectable'=>true,'invoice'=>$invoice])@endcomponent
        @empty
          <p>No invoices found!</p>
        @endforelse
        </div>
        <!--custom page design ends-->

        <div class="row">
          <div class="col-sm-12">
            {{$invoices->links()}}
          </div>
        </div>

        <form id="invoices-report-form" class="hidden" action="{{route('report.store')}}" method="post">
          @csrf
        </form>

			</div>
			 <!--body wrapper end-->
		</div>
    <script>
      $( function() {
        $( "#start-date" ).datepicker();
      } );

      $( function() {
        $( "#end-date" ).datepicker();
      } );
  </script>
  <!--modals-->
  @Component('components.modals.confirm',['title'=>'Generate report','question'=>'Are you sure you want to generate report?','modalID'=>'newReportConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'invoices-report-form'])@endcomponent

@endsection
