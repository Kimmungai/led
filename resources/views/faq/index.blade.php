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
        @Component('components.structure.page-title',['title'=>'All costs'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'specified'=>'Advertising costs'])
        @endcomponent

        <!--custom page design starts-->
        <div class="table-responsive">
          <table class="table">
            <thead>
              <th>#</th>
              <th>Question</th>
              <th>Answer</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php $count = 1 ?>
              @forelse($faqs->data as $faq)
              <tr>
                <form class="" action="{{route('faq.update',$faq->id)}}" method="post">
                  @csrf
                  @method('PUT')
                  <td><a href="#" onclick="event.preventDefault();confirm_modal('deleteFaq{{$faq->id}}ConfirmModal')" title="Delete faq" style="color:inherit"><span class="fa fa-times-circle"></span></a> {{$count}}.</td>
                  <td>
                    <textarea name="name" class="form-control"  >{{$faq->name}}</textarea>
                  </td>
                  <td> <textarea name="value" class="form-control"  >{{$faq->value}}</textarea></td>
                  <td> <button type="submit" class="btn btn-default btn-sm" title="save details">Update</button> </td>
                </form>
              </tr>
              @Component('components.modals.confirm',['title'=>'Delete Faq','question'=>'Are you sure you want to delete this faq ?','modalID'=>'deleteFaq'.$faq->id.'ConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm delete','formID'=>'delete-faq-'.$faq->id.'-form'])@endcomponent
              <form class="d-none hidden" id="delete-faq-{{$faq->id}}-form" action="{{route('faq.destroy',$faq->id)}}" method="post">
                @csrf
                @method('DELETE')
              </form>
              <?php $count++ ?>
              @empty

              @endforelse

              <tr>
                <form class="" action="{{route('faq.store')}}" method="post">
                  @csrf
                  <td></td>
                  <td><textarea name="name" class="form-control"  ></textarea> </td>
                  <td> <textarea name="value" class="form-control"  ></textarea> </td>
                  <td> <button type="submit" class="btn btn-default" title="save details">Add new</button> </td>
                </form>
              </tr>

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
