<?php $wallet = 0; ?>
@foreach ($user->UserTransactions as $transaction) <?php $wallet += $transaction->credit;  ?> @endforeach
<article class="material-card Red">
	<h2>
			<span>{{$user->name}}</span>
			<strong>
					<i class="fa fa-fw fa-wallet"></i>
				<small class="text-white">A/c Ksh.</small> {{number_format($wallet,2)}}
			</strong>

			<strong>
					<i class="fa fa-fw fa-dollar"></i>
					<small class="text-white">Owed Ksh.</small> <b class="owed-supplier">{{number_format(old('amountOwed'),2)}}</b>
			</strong>
	</h2>
	<div class="mc-content">
			<div class="img-container">
					<img class="img-responsive" src="@if($user->avatar) {{url($user->avatar)}} @else /placeholders/avatar-male.png @endif">
			</div>
			<!--<div class="mc-description">
					He has appeared in more than 100 films and television shows, including The Deer Hunter, Annie Hall, The Prophecy trilogy, The Dogs of War ...
			</div>-->
	</div>
	<!--<a class="mc-btn-action">
			<i class="fa fa-bars"></i>
	</a>-->
	<!--<div class="mc-footer">
			<h4>
					Social
			</h4>
			<a class="fa fa-fw fa-facebook"></a>
			<a class="fa fa-fw fa-twitter"></a>
			<a class="fa fa-fw fa-linkedin"></a>
			<a class="fa fa-fw fa-google-plus"></a>
	</div>-->
</article>
