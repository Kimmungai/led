<?php if( $user ): ?>
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
					<small class="text-white">Due Ksh.</small> <b class="totalAmountDue">{{number_format(session('salePrice'),2)}}</b>
			</strong>
	</h2>
	<div class="mc-content">
			<div class="img-container">
					<img class="img-responsive" src="@if($user->avatar) {{url($user->avatar)}} @else /placeholders/avatar-male.png @endif">
			</div>
	</div>

</article>
<?php else: ?>
	<article class="material-card Red">

		<h2>
				<span>No customer selected</span>

		</h2>
		<div class="mc-content">
				<div class="img-container">
						<img class="img-responsive" src="/placeholders/avatar-male.png ">
				</div>
		</div>

	</article>

<?php endif; ?>
