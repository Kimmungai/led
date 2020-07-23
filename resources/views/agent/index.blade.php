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
        @Component('components.structure.page-title',['title'=>'All agents'])@endcomponent

        <div class="row">
          <div class="col-xs-12">
            @Component('components.form-inputs.link',['title'=>'New agent','href'=>route('agent.create'),'toolTip'=>'Create a new agent','icon'=>'fas fa-user','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent
          </div>
        </div>

        @Component('components.structure.breadcrump',['home'=>route('home'),'specified'=>'Agents'])
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
              @forelse( $agents->data as $agent )
              <tr>
                <td><a href="#" onclick="event.preventDefault();confirm_modal('deleteAgent{{$agent->id}}ConfirmModal')" title="Delete @if(isset($agent->user->firstName)) {{$agent->user->firstName}} {{$agent->user->lastName}} @endif" style="color:inherit"><span class="fa fa-times-circle"></span></a> {{$agent->id}}</td>
                <td>@if(isset($agent->user->firstName)) {{$agent->user->firstName}} {{$agent->user->lastName}} @endif</td>
                <td>@if(isset($agent->user->email)) {{$agent->user->email}}  @endif</td>
                <td>@if(isset($agent->user->phone)) {{$agent->user->phone}} @endif</td>
                <td> <a href="{{route('agent.show',$agent->id)}}" class="btn btn-sm btn-default" title="Open @if(isset($agent->user->firstName)) {{$agent->user->firstName}} {{$agent->user->lastName}} @endif"><span class="fa fa-eye"></span> open</a> </td>
                @Component('components.modals.confirm',['title'=>'Delete agent','question'=>'Are you sure you want to delete '.$agent->user->firstName.' '.$agent->user->lastName.'?','modalID'=>'deleteAgent'.$agent->id.'ConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm delete','formID'=>'delete-agent-'.$agent->id.'-form'])@endcomponent
                <form class="d-none hidden" id="delete-agent-{{$agent->id}}-form" action="{{route('agent.destroy',$agent->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                </form>
              </tr>
              <?php $count++; ?>
              @empty
              <tr>
                <td colspan="4">No agents found. <a href="{{route('agent.create')}}">create new agent?</a> </td>
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
