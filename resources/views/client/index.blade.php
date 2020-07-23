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
        @Component('components.structure.page-title',['title'=>'All clients'])@endcomponent

        <div class="row">
          <div class="col-xs-12">
            @Component('components.form-inputs.link',['title'=>'New client','href'=>route('client.create'),'toolTip'=>'Create a new client','icon'=>'fas fa-user','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent
          </div>
        </div>

        @Component('components.structure.breadcrump',['home'=>route('home'),'specified'=>'Clients'])
        @endcomponent

        <!--custom page design starts-->
        <div class="table-responsive">
          <table class="table">
            <thead>
              <th>ID</th>
              <th>Agent</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php $count = 1; ?>
              @foreach( $clients->data as $client )
              <tr>
                <td><a href="#" onclick="event.preventDefault();confirm_modal('deleteClient{{$client->id}}ConfirmModal')" title="Delete @if(isset($client->firstName)) {{$client->firstName}} {{$client->lastName}} @endif" style="color:inherit"><span class="fa fa-times-circle"></span></a> {{$client->id}}</td>
                <td>@if(isset($client->firstName)) {{$client->firstName}} {{$client->lastName}} @endif</td>
                <td>@if(isset($client->email)) {{$client->email}}  @endif</td>
                <td>@if(isset($client->phone)) {{$client->phone}} @endif</td>
                <td> <a href="{{route('client.show',$client->id)}}" class="btn btn-sm btn-default" title="Open @if(isset($client->firstName)) {{$client->firstName}} {{$client->lastName}} @endif"><span class="fa fa-eye"></span> open</a> </td>
                @Component('components.modals.confirm',['title'=>'Delete client','question'=>'Are you sure you want to delete '.$client->firstName.' '.$client->lastName.'?','modalID'=>'deleteClient'.$client->id.'ConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm delete','formID'=>'delete-client-'.$client->id.'-form'])@endcomponent
                <form class="d-none hidden" id="delete-client-{{$client->id}}-form" action="{{route('client.destroy',$client->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                </form>
              </tr>
              <?php $count++; ?>
              @endforeach
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
