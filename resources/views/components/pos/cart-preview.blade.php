<div class="cart-preview-section">
  <div class="table table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Item</th>
          <th>Quantity (Units)</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><span class="fa fa-times-circle"></span> Full chicken</td>
          <td> <input class="form-control" type="number" name="" value="100"> </td>
          <td>Ksh. 20,000</td>
        </tr>
        <tr>
          <td><span class="fa fa-times-circle"></span> Fish fillet</td>
          <td> <input class="form-control" type="number" name="" value="100"> </td>
          <td>Ksh. 20,000</td>
        </tr>
        <tr>
          <td><span class="fa fa-times-circle"></span> Drumsticks</td>
          <td> <input class="form-control" type="number" name="" value="100"> </td>
          <td>Ksh. 100,000</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2">Sub total</td>
          <td>Ksh. 500,000</td>
        </tr>
        <tr>
          <td colspan="2">Discount (2%)</td>
          <td>Ksh. 5000</td>
        </tr>
        <tr>
          <td colspan="2">VAT (16%)</td>
          <td>Ksh. 15,000</td>
        </tr>
        <tr>
          <td colspan="2">Total</td>
          <td>Ksh. 710,000</td>
        </tr>
      </tfoot>
    </table>
  </div>

  <a href="#" class="btn btn-info br0">
   <span class="fa fa-users"></span> Select customer
 </a>

 <a href="{{route('payments.create')}}" class="btn btn-success mt-2 pay-btn">
  Payment
</a>

</div>
