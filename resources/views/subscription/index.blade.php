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
        @Component('components.structure.page-title',['title'=>'All subscriptions packages'])@endcomponent

        <div class="row">
          <div class="col-xs-12">
            @Component('components.form-inputs.link',['title'=>'New subscription','href'=>route('subscription.create'),'toolTip'=>'Create a new subscription','icon'=>'fas fa-gift','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent
          </div>
        </div>

        @Component('components.structure.breadcrump',['home'=>route('home'),'specified'=>'Subscription packages'])
        @endcomponent

        <!--custom page design starts-->
        <div class="table-responsive">
          <table class="table">
            <thead>
              <th>ID</th>
              <th>Title</th>
              <th>Price</th>
              <th>Period</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php $count = 1; ?>
              @forelse( $subscriptions->data as $subscription )
              <tr>
                <td><a href="#" onclick="event.preventDefault();confirm_modal('deleteSubscription{{$subscription->id}}ConfirmModal')" title="Delete @if(isset($subscription->firstName)) {{$subscription->firstName}} {{$subscription->lastName}} @endif" style="color:inherit"><span class="fa fa-times-circle"></span></a> {{$subscription->id}}</td>
                <td class="text-capitalize"> <a href="{{route('subscription.show',$subscription->id)}}" style="color:inherit"> {{$subscription->type}} </a></td>
                <td>{{$subscription->currency}} {{$subscription->price}}</td>
                <td>{{$subscription->period}}</td>
                <td> <a href="{{route('subscription.show',$subscription->id)}}" class="btn btn-sm btn-default" title="Open {{$subscription->type}}"><span class="fa fa-eye"></span> open</a> </td>
                @Component('components.modals.confirm',['title'=>'Delete subscription','question'=>'Are you sure you want to delete '.$subscription->type.'?','modalID'=>'deleteSubscription'.$subscription->id.'ConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm delete','formID'=>'delete-subscription-'.$subscription->id.'-form'])@endcomponent
                <form class="d-none hidden" id="delete-subscription-{{$subscription->id}}-form" action="{{route('subscription.destroy',$subscription->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                </form>
              </tr>
              <?php $count++; ?>
              @empty
              <tr>
                <td colspan="4">No subscriptions found. <a href="{{route('subscription.create')}}">create new subscription?</a> </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <!--custom page design ends-->

        <div class="row">
          <div class="col-md-12">

          </div>
        </div>

			</div>
			 <!--body wrapper end-->
		</div>

@endsection
