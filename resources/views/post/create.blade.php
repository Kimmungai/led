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
        @if( count($errors) )
          @Component('components.error.error',['message'=>'Your form contains errors'])@endcomponent
        @endif
        @Component('components.structure.page-title',['title'=>'Create a blog post'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'specifiedLinked'=>route('post.index'),'specifiedText'=>'All posts','specified'=>'New post'])
        @endcomponent
        <form  id="blog-post-form" class="blog-form"  action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-8">
                @csrf
                <div class="mb-4">
                  <input type="text" name="title" class="form-control1 post-title-input" placeholder="Enter post title" value="{{old('title')}}">
                  @if ($errors->has('title'))
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                  @endif
                </div>
                <div class="mb-4">
                  <textarea id="main-editor" class="post-content" name="content" rows="8" placeholder="Post content">{{old('content')}}</textarea>
                  @if ($errors->has('content'))
                    <small class="text-danger">{{ $errors->first('content') }}</small>
                  @endif
                </div>

            </div>
            <div class="col-md-4">

              <div class="blog-form">
                @Component('components.form-inputs.publish-button',['title'=>'Create user'])@endcomponent
                <p>Post categories</p>
                @Component('components.form-inputs.post-attribute-input',['title' => 'Name','name'=>'post-category','type'=>'text','icon'=>'fas fa-crosshairs','placeholder' => 'Type a category','action'=>'Add category'])@endcomponent
                <div class="post-attributes-panel">
                  <?php $count = 1 ?>
                  <?php $postCategories = isset($post) ?  $post->categories : [] ?>
                  <?php $postCategories = old('post-category') ?  old('post-category') : $postCategories ?>
                  <ul id="post-category-list">
                    @foreach( $postCategories as $postCategory )
                      <li id="post-category-{{$count}}">
                        {{$postCategory}}
                        <span class="fa fa-times-circle" onclick="remove_post_attribute('post-category','post-category-{{$count}}')"></span>
                        <input id="post-category-{{$count}}-input" type="hidden" name="post-category[]" value="{{$postCategory}}" />
                      </li>
                      <?php $count++ ?>
                    @endforeach
                  </ul>
                </div>
                <p>Post tags</p>
                @Component('components.form-inputs.post-attribute-input',['title' => 'Tag','name'=>'post-tag','type'=>'text','icon'=>'fas fa-tag','placeholder' => 'Type a tag','action'=>'Add tag'])@endcomponent
                <div class="post-attributes-panel">
                  <?php $count = 1 ?>
                  <?php $postTags = isset($post) ?  $post->tags : [] ?>
                  <?php $postTags = old('post-tag') ?  old('post-tag') : $postTags ?>

                  <ul id="post-tag-list">
                    @foreach( $postTags as $postTag )
                      <li id="post-tag-{{$count}}">
                        {{$postTag}}
                        <span class="fa fa-times-circle" onclick="remove_post_attribute('post-tag','post-tag-{{$count}}')"></span>
                        <input id="post-tag-{{$count}}-input" type="hidden" name="post-tag[]" value="{{$postTag}}" />
                      </li>
                      <?php $count++ ?>
                    @endforeach
                  </ul>
                </div>
                <p>Post featured image</p>
                <!--<div class="avatar-preview">
                  <div class="profile-img-loading-preview hidden"><img class="loader" src="/placeholders/img-loader-green.gif"></div>
                  <img id="user-avatar" class="" src="@if( old('avatar') ) {{url(old('avatar'))}} @elseif( 0 ) {{url($user->avatar)}} @else /placeholders/avatar-male.png @endif" alt="" >
                  <input id="user-avatar-url" type="hidden" name="featured_img" value="@if( old('avatar') ) {{old('avatar')}} @elseif( 0 ) {{$user->avatar}} @else /placeholders/avatar-male.png @endif">
                </div>-->
                <input type="file" name="featured_img" value="">
                @if ($errors->has('featured_img'))
                  <small class="text-danger">{{ $errors->first('featured_img') }}</small>
                @endif
                <p>Post excerpt</p>
                @Component('components.form-inputs.side-textarea',['title' => 'Excerpt','name'=>'excerpt','icon'=>'fas fa-info-circle','placeholder' => 'Enter a summary of the post','rows'=>5,'cols'=>'','required'=>false,'value' =>null])@endcomponent

              </div>

            </div>

          </div>
        </form>
        <!--custom page design starts-->


        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Save new post','question'=>'Are you sure you want to publish post?','modalID'=>'newPostConfirmModal','cancelBtnTitle'=>'No','saveBtnTitle'=>'Yes','formID'=>'blog-post-form'])@endcomponent

    <script>
    tinymce.init({
      selector: '#main-editor',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
    });
  </script>

@endsection
