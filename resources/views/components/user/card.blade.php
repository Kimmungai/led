<a href="@if(isset($link)) {{$link}} @else {{route('users.show',$user->id)}} @endif" title="open {{$user->name}} profile">
<div class="image-area">
		<div class="img-wrapper">
			@if($user->avatar)
			<img src="{{$user->avatar}}" alt="{{$user->name}}">
			@else
			<img src="@if($user->gender == 1) /placeholders/avatar-male.png @else /placeholders/avatar-female.png @endif" alt="{{$user->name}}">
			@endif
			<h2>
        {{$user->name}}
        <br><span><i class="fa fa-phone"></i> {{$user->phoneNumber}}</span>
        <br><span><i class="fa fa-envelope-open"></i> {{$user->email}}</span>
      </h2>
			<ul>
				<!--<li><a href="https://www.instagram.com/atulkprajapati2000/"><i class="fab fa-facebook"></i></a></li>-->
				@if( $user->type == env('STAFF',1) )
				<li><a href="@if(isset($link)) {{$link}} @else {{route('users.show',$user->id)}} @endif" title="open {{$user->name}} profile"><i class="fa fa-user"></i></a></li>
				@elseif( $user->type == env('ADMIN',3) )
				<li><a href="@if(isset($link)) {{$link}} @else {{route('admin.show',$user->id)}} @endif" title="open {{$user->name}} profile"><i class="fa fa-user"></i></a></li>
				@endif

				<!--<li><a href="#" title="delete {{$user->name}}"><i class="fas fa-trash-alt"></i></a></li>-->
			</ul>
		</div>
</div></a>
