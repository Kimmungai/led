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
        @Component('components.structure.page-title',['title'=>'All posts'])@endcomponent
        <div class="row">
          <div class="col-md-12">
            @Component('components.form-inputs.link',['title'=>'New','href'=>route('post.create'),'toolTip'=>'create new blog post','icon'=>'fas fa-plus-circle','classes'=>'btn btn-default btn-xs pull-right'])@endcomponent
          </div>
        </div>

        @Component('components.structure.breadcrump',['home'=>route('home'),'specified'=>'All posts'])
        @endcomponent

        <!--custom page design starts-->

          <div class="row">

            @forelse($posts as $post)
              @Component('components.dashboard.post',['title'=>$post->title,'icon'=>'fa fa-check-circle','link'=>route('post.show',1),'color'=>'#5cb85c','selectable'=>true])@endcomponent
            @empty
            <div class="col-md-12 no-records">
              <h2>No posts found <small><a href="{{route('post.create')}}">Create your first post</a></small></h2>
            </div>
            @endforelse
          </div>
          <div class="row">
            {{$posts->links()}}
          </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
