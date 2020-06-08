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
        @Component('components.structure.page-title',['title'=>'Create user'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'specifiedLinked'=>route('post.index'),'specifiedText'=>'All posts','specified'=>'New post'])
        @endcomponent

        <!--custom page design starts-->


        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Save new user','question'=>'Are you sure you want to save user?','modalID'=>'newUserConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'new-user-form'])@endcomponent

@endsection
