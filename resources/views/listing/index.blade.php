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
        @Component('components.structure.page-title',['title'=>'All listings'])@endcomponent

        <div class="row">
          <div class="col-xs-12">
            @Component('components.form-inputs.link',['title'=>'New listing','href'=>route('listing.create'),'toolTip'=>'Create a new listing','icon'=>'fas fa-home','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent
          </div>
        </div>

        @Component('components.structure.breadcrump',['home'=>route('home'),'specified'=>'Listings'])
        @endcomponent

        <!--custom page design starts-->
        <div class="table-responsive">
          <table class="table">
            <thead>
              <th>ID</th>
              <th>Title</th>
              <th>Type</th>
              <th>Price</th>
              <th>Landmark</th>
              <th>Listed on</th>
              <th>Expires on</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php $count = 1; ?>
              @forelse( $listings->data as $listing )
              <tr>
                <td><a href="#" onclick="event.preventDefault();confirm_modal('deleteClient{{$listing->id}}ConfirmModal')" title="Delete  {{$listing->title}} " style="color:inherit"><span class="fa fa-times-circle"></span></a> {{$listing->id}}</td>
                <td class="text-capitalize"> <a href="{{route('listing.show',$listing->id)}}" style="color:inherit">{{$listing->title}}</a> </td>
                @if( $listing->type == 1 )
                  <td>Commercial</td>
                @elseif( $listing->type == 2 )
                  <td>Residential</td>
                @elseif( $listing->type == 3 )
                  <td>Agricultural</td>
                @elseif( $listing->type == 4 )
                  <td>Industrial</td>
                @endif
                @if($listing->listingType == 1)
                  <td>KES {{number_format($listing->monthlyRent,2)}} <span class="label label-default" style="font-size:8px">For rent</span> </td>
                @elseif( $listing->listingType == 2 )
                  <td>KES {{number_format($listing->salePrice,2)}} <span class="label label-default" style="font-size:8px">For sale</span> </td>
                @elseif( $listing->listingType == 3 )
                  <td>KES {{number_format($listing->leasePrice,2)}} <span class="label label-default" style="font-size:8px">For lease</span> </td>
                @endif
                @if( $listing->landmark )
                  <td>{{$listing->landmark}} </td>
                @elseif( $listing->city )
                  <td>{{$listing->city}} </td>
                @else
                  <td>{{$listing->country}} </td>
                @endif
                <td>{{date('d M Y',strtotime($listing->startDate))}}</td>
                <td>{{date('d M Y',strtotime($listing->endDate))}}</td>
                <td> <a href="{{route('listing.show',$listing->id)}}" class="btn btn-sm btn-default" title="Open  {{$listing->title}}"><span class="fa fa-eye"></span> open</a> </td>
                @Component('components.modals.confirm',['title'=>'Delete payment','question'=>'Are you sure you want to delete record?','modalID'=>'deleteClient'.$listing->id.'ConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm delete','formID'=>'delete-payment-'.$listing->id.'-form'])@endcomponent
                <form class="d-none hidden" id="delete-payment-{{$listing->id}}-form" action="{{route('listing.destroy',$listing->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                </form>
              </tr>
              <?php $count++; ?>
              @empty
              <tr>
                <td colspan="5"></td>
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
