<?php $debit = 0;$credit = 0; ?>
@foreach ($user->UserTransactions as $transaction) <?php $credit += $transaction->credit;  $debit += $transaction->debit;?> @endforeach
<?php $wallet = $credit - $debit;?>

<a href="@if(isset($link)) {{$link}} @else {{route('users.show',$user->id)}} @endif" title="open {{$user->name}} profile">
<div class="image-area">
		<div class="img-wrapper">
			@if($user->avatar)
			<img src="{{$user->avatar}}" alt="{{$user->name}}">
			@else
			<img src="@if($user->gender == 1) /placeholders/avatar-male.png @else /placeholders/avatar-female.png @endif" alt="{{$user->name}}">
			@endif
			<h2 class="@if($wallet > 0) Green @elseif($wallet < 0) Red @else Blue @endif">
        {{$user->name}}
        @if($user->phoneNumber)<br><span><i class="fa fa-phone"></i> {{$user->phoneNumber}}</span>@endif
        @if($user->email)<br><span ><i class="fa fa-envelope-open"></i> {{$user->email}}</span>@endif
				@if($user->type == 2 || $user->type == 4)<br><span><i class="fas fa-wallet"></i> <span>Ksh. {{$wallet}}</span></span>@endif
      </h2>
			<ul>
				<!--<li><a href="https://www.instagram.com/atulkprajapati2000/"><i class="fab fa-facebook"></i></a></li>-->
				<li><a class="@if($wallet > 0) text-Green @elseif($wallet < 0) text-Red @else text-Blue @endif" href="@if(isset($link)) {{$link}} @else {{route('users.show',$user->id)}} @endif" title="open {{$user->name}} profile"><i class="fa fa-user"></i></a></li>
				<li><a class="@if($wallet > 0) text-Green @elseif($wallet < 0) text-Red @else text-Blue @endif" href="#" title="delete {{$user->name}}" onclick="confirm_modal('DELUserConfirmModal')"><i class="fas fa-trash-alt"></i></a></li>
			</ul>
		</div>
</div></a>

<form class="d-none hidden" id="delete-user-{{$user->id}}-form" action="{{route('users.destroy',$user->id)}}" method="post">
	@csrf
	@method('DELETE')
</form>
@Component('components.modals.confirm',['title'=>'Delete user','question'=>'Are you sure you want to delete '.$user->name.'?','modalID'=>'DELUserConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'delete-user-'.$user->id.'-form'])@endcomponent
