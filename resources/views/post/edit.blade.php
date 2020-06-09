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
        <div class="row">
          <div class="col-md-12">
            @Component('components.form-inputs.link',['title'=>'Delete','href'=>'#','toolTip'=>'Delete blog post','icon'=>'fas fa-trash','classes'=>'btn btn-default btn-xs pull-right','click'=>'open_post_delete_modal("deletePostConfirmModal")'])@endcomponent
          </div>
        </div>
        @Component('components.structure.breadcrump',['home'=>route('home'),'specifiedLinked'=>route('post.index'),'specifiedText'=>'All posts','specified'=>'New post'])
        @endcomponent
        <form  id="blog-post-form" class="blog-form"  action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
          <div class="row mb-2 hidden-medium">
            <div class="col-md-12">
              <button type="button" name="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#post-mobile-side-bar">Publish</button>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
                @csrf
                @method('PUT')
                <div class="mb-4">
                  <input type="text" name="title" class="form-control1 post-title-input" placeholder="Enter post title" value="@if(old('title')) {{old('title')}} @else {{$post->title}} @endif" required>
                  @if ($errors->has('title'))
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                  @endif
                </div>
                <div class="mb-4">
                  <input class="post-content" id="main-editor" type="text" name="content" value="@if(old('content')) {{old('content')}} @else {!! $post->content !!} @endif" required>
                  @if ($errors->has('content'))
                    <small class="text-danger">{{ $errors->first('content') }}</small>
                  @endif
                </div>

            </div>
            <div class="col-md-4 hidden-xs hidden-small">

              <div class="blog-form-2">
                @Component('components.form-inputs.publish-button',['title'=>'Create user'])@endcomponent
                <p>Post categories</p>
                @Component('components.form-inputs.post-attribute-input',['title' => 'Name','name'=>'post_category','type'=>'text','icon'=>'fas fa-crosshairs','placeholder' => 'Type a category','action'=>'Add category'])@endcomponent
                @Component('components.form-inputs.post-attributes',['type'=>'post_category','relationship'=>'categories','post'=>$post])@endcomponent
                <p>Post tags</p>
                @Component('components.form-inputs.post-attribute-input',['title' => 'Tag','name'=>'post_tag','type'=>'text','icon'=>'fas fa-tag','placeholder' => 'Type a tag','action'=>'Add tag'])@endcomponent
                @Component('components.form-inputs.post-attributes',['type'=>'post_tag','relationship'=>'tags','post'=>$post])@endcomponent
                <p>Post featured image</p>
                @if( old('featured_img') || isset($post) )
                <div class="avatar-preview">
                  <img class="" src="@if( old('featured_img') ) {{url(old('featured_img'))}} @elseif( $post->featured_img_uri ) {{$post->featured_img_uri}} @else /placeholders/avatar-male.png @endif" alt="" >
                </div>
                @endif
                <input id="post-featured-img" type="file" name="featured_img" value="" onchange="check_file_size(this.id)" accept="image/*">
                @if ($errors->has('featured_img'))
                  <small class="text-danger">{{ $errors->first('featured_img') }}</small>
                @endif
                <p>Post excerpt</p>
                @Component('components.form-inputs.side-textarea',['title' => 'Excerpt','name'=>'excerpt','icon'=>'fas fa-info-circle','placeholder' => 'Enter a summary of the post','rows'=>5,'cols'=>'','required'=>false,'value' =>$post->excerpt])@endcomponent
              </div>

            </div>

          </div>

          <!-- Mobile-->
          <div class="modal fade" id="post-mobile-side-bar" tabindex="-1" role="dialog" >
            <div class="modal-dialog modal-lg" role="document" style="margin:0 auto">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                  <div class="blog-form-2">
                    @Component('components.form-inputs.publish-button',['title'=>'Create user'])@endcomponent
                    <p>Post categories</p>
                    @Component('components.form-inputs.post-attribute-input',['title' => 'Name','name'=>'post_category_mobile','type'=>'text','icon'=>'fas fa-crosshairs','placeholder' => 'Type a category','action'=>'Add category'])@endcomponent
                    @Component('components.form-inputs.post-attributes',['type'=>'post_category_mobile','relationship'=>'categories','post'=>$post])@endcomponent
                    <p>Post tags</p>
                    @Component('components.form-inputs.post-attribute-input',['title' => 'Tag','name'=>'post_tag_mobile','type'=>'text','icon'=>'fas fa-tag','placeholder' => 'Type a tag','action'=>'Add tag'])@endcomponent
                    @Component('components.form-inputs.post-attributes',['type'=>'post_tag_mobile','relationship'=>'tags','post'=>$post])@endcomponent
                    <p>Post featured image</p>
                    @if( old('featured_img_mobile') || isset($post) )
                    <div class="avatar-preview">
                      <img class="" src="@if( old('featured_img_mobile') ) {{url(old('featured_img_mobile'))}} @elseif( $post->featured_img_uri ) {{$post->featured_img_uri}} @else /placeholders/avatar-male.png @endif" alt="" >
                    </div>
                    @endif
                    <input id="post-featured-img-mobile" type="file" name="featured_img_mobile" value="" onchange="check_file_size(this.id)" accept="image/*">
                    @if ($errors->has('featured_img'))
                      <small class="text-danger">{{ $errors->first('featured_img') }}</small>
                    @endif
                    <p>Post excerpt</p>
                    @Component('components.form-inputs.side-textarea',['title' => 'Excerpt','name'=>'excerpt_mobile','icon'=>'fas fa-info-circle','placeholder' => 'Enter a summary of the post','rows'=>5,'cols'=>'','required'=>false,'value' =>$post->excerpt])@endcomponent
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary"  onclick="confirm_modal('newPostConfirmModal')">Publish</button>
                </div>
              </div>
            </div>
          </div><!--end mobile-->

        </form>
        <!--custom page design starts-->


        <!--custom page design ends-->
        <form class="d-none hidden" id="delete-post-form" action="{{route('post.destroy',$post->id)}}" method="post">
          @csrf
          @method('DELETE')
        </form>


			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Save new post','question'=>'Are you sure you want to publish post?','modalID'=>'newPostConfirmModal','cancelBtnTitle'=>'No','saveBtnTitle'=>'Yes','formID'=>'blog-post-form'])@endcomponent
    @Component('components.modals.confirm',['title'=>'Delete post','question'=>'Are you sure you want to delete post?','modalID'=>'deletePostConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Yes','formID'=>'delete-post-form'])@endcomponent


    <script>
    tinymce.init({
      selector: '#main-editor',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
    });
  </script>

@endsection
