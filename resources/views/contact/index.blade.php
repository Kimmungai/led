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
        @Component('components.structure.page-title',['title'=>'All contacts'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'specified'=>'Office contacts'])
        @endcomponent

        <!--custom page design starts-->
        <div class="table-responsive">
          <table class="table">
            <thead>
              <th>#</th>
              <th>Contact</th>
              <th>Details</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php $count = 1 ?>
              @forelse($contacts->data as $contact)
              <tr>
                <form class="" action="{{route('contact.update',$contact->id)}}" method="post">
                  @csrf
                  @method('PUT')
                  <td><a href="#" onclick="event.preventDefault();confirm_modal('deleteContact{{$contact->id}}ConfirmModal')" title="Delete contact" style="color:inherit"><span class="fa fa-times-circle"></span></a> {{$count}}.</td>
                  <td>
                    {{$contact->name}}
                    <input type="hidden" name="name" value="{{$contact->name}}">
                  </td>
                  <td> <input name="value" class="form-control" value="{{$contact->value}}"  required/></td>
                  <td> <button type="submit" class="btn btn-default btn-sm" title="save details">Update</button> </td>
                </form>
              </tr>
              @Component('components.modals.confirm',['title'=>'Delete Contact','question'=>'Are you sure you want to delete this contact ?','modalID'=>'deleteContact'.$contact->id.'ConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm delete','formID'=>'delete-contact-'.$contact->id.'-form'])@endcomponent
              <form class="d-none hidden" id="delete-contact-{{$contact->id}}-form" action="{{route('contact.destroy',$contact->id)}}" method="post">
                @csrf
                @method('DELETE')
              </form>
              <?php $count++ ?>
              @empty

              @endforelse

              <tr>
                <form class="" action="{{route('contact.store')}}" method="post">
                  @csrf
                  <td></td>
                  <td>
                    <select class="form-control" name="name">
                      <option value="Office hours">Office hours</option>
                      <option value="phone">Phone</option>
                      <option value="Email">Email</option>
                      <option value="Address">Address</option>
                    </select>
                  </td>
                  <td><input name="value" class="form-control"  required/> </td>
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
