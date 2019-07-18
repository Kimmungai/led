<div class="row payment-top">

<div class="col-md-3">
  <h3>Mode of payment</h3>
  <div class="form-group">
    <div class="input-group input-icon right in-grp1">
      <span class="input-group-addon">
        <i class="fa fa-money-bill-wave"></i>
      </span>

      <form id="new-payment-form" action="{{route('payments.store')}}" method="post">
        @csrf
        <select class="form-control" name="paymentMethod">
          <option value="1">Cash</option>
          <option value="2">Cheque</option>
          <option value="3">Mpesa</option>
        </select>
        <input type="hidden" name="balance" id="saleBalance" class=" form-control"  />
        <input type="hidden" name="amountReceived" id="amountReceived" class=" form-control"  />
      </form>


    </div>
    <div class="clearfix"> </div>
  </div>
</div>

<div class="col-md-2">
  <!--<h5>Discount %</h5>
  <input type="number" class="form-control" name="" value="3">-->
</div>

<div class="col-md-2">
  <!--<h5>VAT %</h5>
  <input type="number" class="form-control" name="" value="16">-->
</div>

<div class="col-md-5">
  <h3>Total</h3>
    <p class="text-bold text-right">Sub total: {{number_format(session('salePrice'),2)}}/=</p>
    <!--<ul class="prices-notes text-right">
      <li>Discount: 3% -100/=</li>
      <li>VAT: 16% +1600/=</li>
    </ul>-->
  <div class="row mt-1">
    <div class="col-xs-4">
      <button id="save-payment-btn" type="button" class="btn btn-success pay-btn btn-block " name="button" onclick="confirm_modal('newPaymentConfirmModal')" disabled>Save</button>
    </div>
    <div class="col-xs-4">
      <button type="button" class="btn btn-success cancel-btn btn-block" name="button"><span class="fa fa-times"></span> Cancel</button>
    </div>
    <div class="col-xs-4">
      <p class="text-bold">Grand Total: {{number_format(session('salePrice'),2)}}/=</p>
    </div>
  </div>
</div>

</div>
