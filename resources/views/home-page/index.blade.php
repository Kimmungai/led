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
              <th>Section</th>
              <th>Content</th>
              <th>Action</th>
            </thead>
            <tbody>
              <?php $count = 1 ?>
              <?php $recent_show = 0; ?>
              <?php $stats_show = 0; ?>
              @forelse($homeSettings->data as $homeSetting)
                @if( $homeSetting->name == 'recent_show'  ) <?php $recent_show = $homeSetting->value ?>  @endif
                @if( $homeSetting->name == 'stats_show'  ) <?php $stats_show = $homeSetting->value ?>  @endif
                @if( $homeSetting->name == 'recent_show' ||  $homeSetting->name == 'stats_show')
                <?php continue ?>
                @endif
              <tr>
                <form class="" action="{{route('home-page.update',$homeSetting->id)}}" method="post">
                  @csrf
                  @method('PUT')
                  <td><a href="#" onclick="event.preventDefault();confirm_modal('deleteHomeSetting{{$homeSetting->id}}ConfirmModal')" title="Delete setting" style="color:inherit"><span class="fa fa-times-circle"></span></a> {{$count}}.</td>
                  <td>
                    @if( $homeSetting->name == 'featured_title'  ) Featured section heading  @endif
                    @if( $homeSetting->name == 'welcome_image'  ) Welcome section image url @endif
                    @if( $homeSetting->name == 'welcome_title'  ) Welcome section heading  @endif
                    @if( $homeSetting->name == 'welcome_sub_title'  ) Welcome section sub heading  @endif
                    @if( $homeSetting->name == 'welcome_text'  ) Welcome section content  @endif
                    @if( $homeSetting->name == 'cta'  ) Welcome section button @endif
                    @if( $homeSetting->name == 'cta_url'  ) Welcome section button url  @endif
                    @if( $homeSetting->name == 'recent_title'  ) Recent section heading  @endif
                    @if( $homeSetting->name == 'stats_title'  ) Statistics section heading  @endif
                    @if( $homeSetting->name == 'stats_text'  ) Statistics section content  @endif


                  </td>
                  <td> <textarea name="value" class="form-control"  >{{$homeSetting->value}}</textarea></td>
                  <td> <button type="submit" class="btn btn-default btn-sm" title="save details">Update</button> </td>
                </form>
              </tr>
              @Component('components.modals.confirm',['title'=>'Delete Home Setting','question'=>'Are you sure you want to delete this home-page ?','modalID'=>'deleteHomeSetting'.$homeSetting->id.'ConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm delete','formID'=>'delete-home-page-'.$homeSetting->id.'-form'])@endcomponent
              <form class="d-none hidden" id="delete-home-page-{{$homeSetting->id}}-form" action="{{route('home-page.destroy',$homeSetting->id)}}" method="post">
                @csrf
                @method('DELETE')
              </form>
              <?php $count++ ?>
              @empty

              @endforelse

              <tr>
                <form class="" action="{{route('home-page.store')}}" method="post">
                  @csrf
                  <td> <input type="hidden" name="name" value="recent_show"> </td>
                  <td>Show featured listings section?</td>
                  <td><input type="radio" name="value" value="1" @if($recent_show) checked @endif> Yes &nbsp;&nbsp;&nbsp;<input type="radio" name="value" value="0" @if(!$recent_show) checked @endif> No</td>
                  <td><button type="submit" class="btn btn-default btn-sm" title="save details">Update</button></td>
               </form>
              </tr>

              <tr>
                <form class="" action="{{route('home-page.store')}}" method="post">
                  @csrf
                  <td> <input type="hidden" name="name" value="stats_show"> </td>
                  <td>Show statistics section?</td>
                  <td><input type="radio" name="value" value="1" @if($stats_show) checked @endif> Yes &nbsp;&nbsp;&nbsp;<input type="radio" name="value" value="0" @if(!$stats_show) checked @endif> No</td>
                  <td><button type="submit" class="btn btn-default btn-sm" title="save details">Update</button></td>
               </form>
              </tr>

              <tr>
                <form class="" action="{{route('home-page.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <td></td>
                  <td>
                    <select class="form-control" name="name" onchange="determineInputType(this.value,'settingsInput')">
                      <optgroup label="Featured listings section">
                        <option value="featured_title">Heading</option>
                      </optgroup>
                      <optgroup label="Welcome section">
                        <option value="welcome_image">Image</option>
                        <option value="welcome_title">Heading</option>
                        <option value="welcome_sub_title">Sub heading</option>
                        <option value="welcome_text">Content</option>
                        <option value="cta">Button text</option>
                        <option value="cta_url">Button link</option>
                      </optgroup>
                      <optgroup label="Recent listings section">
                        <option value="recent_title">Heading</option>
                      </optgroup>
                      <optgroup label="Statistics section">
                        <option value="stats_title">Heading</option>
                        <option value="stats_text">Content</option>
                      </optgroup>
                    </select>
                  </td>
                  <td><input  name="value" class="form-control"  /> </td>
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
