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
        @Component('components.structure.page-title',['title'=>'Trashed items'])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Empty','href'=>route('trash.empty'),'toolTip'=>'Empty trash can','icon'=>'fas fa-trash-alt','classes'=>'btn btn-default btn-xs pull-right','click'=>'confirm_modal("deleteOrgConfirmModal")'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'trash'=>''])
        @endcomponent

        <!--custom page design starts-->
        <div class="row">

          @if( isset($orgs) )
            @if( count($orgs) )
              @Component('components.dashboard.cta-icon',['title'=>'Organisations ('.count($orgs).')','icon'=>'fa fa-building','link'=>route('trash.org'),'color'=>'#333'])@endcomponent
            @endif
          @endif

          @if( isset($staffs) )
            @if( count($staffs) )
              @Component('components.dashboard.cta-icon',['title'=>'Staff ('.count($staffs).')','icon'=>'fa fa-user-tag','link'=>route('trash.staff'),'color'=>'#333'])@endcomponent
            @endif
          @endif

          @if( isset($admins) )
            @if( count($admins) )
              @Component('components.dashboard.cta-icon',['title'=>'Admins ('.count($admins).')','icon'=>'fa fa-user-tie','link'=>route('trash.admin'),'color'=>'#333'])@endcomponent
            @endif
          @endif

          @if( isset($suppliers) )
            @if( count($suppliers) )
              @Component('components.dashboard.cta-icon',['title'=>'Suppliers ('.count($suppliers).')','icon'=>'fa fa-user-check','link'=>route('trash.suppliers'),'color'=>'#333'])@endcomponent
            @endif
          @endif

          @if( isset($customers) )
            @if( count($customers) )
              @Component('components.dashboard.cta-icon',['title'=>'Customers ('.count($customers).')','icon'=>'fa fa-users','link'=>route('trash.customers'),'color'=>'#333'])@endcomponent
            @endif
          @endif
        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>

    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Empty trash','question'=>'Are you sure you want to permanently delete all items in trash?','modalID'=>'deleteOrgConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm permanent delete','url'=>route('trash.empty')])@endcomponent

@endsection
