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

			<div id="page-wrapper">
        @Component('components.structure.page-title',['title'=>'Create new invoice'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'invoices'=>route('invoices.index'),'newInvoice'=>''])
        @endcomponent

				<div class="graphs">

			<!-- switches -->
		<div class="switches">

			<div class="col-4">
        <!--invoice template-->
        <div class="container">
          <div class="invoice-panel">

            <p class="title-1"> <span>Halal</span> </p>
            <p class="title-2"> <span>Delivery / Invoice</span> </p>

            <div class="heading">
              <h1>Ledamcha Multsuppliers</h1>
              <p>Dealers in: Whole Chicken, Wings, Drumsticks, Boneless, Legs, Gizzard, Eggs, Fish Fillet, Beef, Mutton and Pishori Rice</p>
            </div>

            <div class="contacts">
              <ul>
                <li>Cell: 0731 610 776</li>
                <li><span class="text-white">Cell: </span>0733 205 300</li>
              </ul>
            </div>

            <div class="row">

              <div class="col-xs-6">
                <div class="addresse">
                  <p>M/s</p>
                  <p class="mt-2"></p>
                  <p class="mt-2"></p>
                </div>
              </div>

              <div class="col-xs-6">
                <div class="doc-ids">
                  <span>Email: ledamchamultsuppliers@yahoo.com</span>
                  <p>Date {{date('d / M / Y')}}</p>
                  <p>Order No. 1</p>
                  <p>Delivery Note</p>
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-xs-12">
                <div class="invoice-table table-responsive">
                  <table class="table table-bodered">
                    <thead>
                      <tr>
                        <th>Qty.</th>
                        <th>Description</th>
                        <th>@</th>
                        <th>Shs.</th>
                        <th>Cts</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="table-highlight"></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="table-highlight"></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td colspan="2">TOTAL</td>
                        <td></td>
                        <td class="table-highlight"></td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th></th>
                        <th colspan="3">Accounts are due on demand</th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <div class="footnote">
                  <p>Prices are subject to change without prior notice.</p>
                  <div class="row inspector mt-2">
                    <div class="col-xs-6">
                      <p>Checked by: </p>
                    </div>
                    <div class="col-xs-6">
                      <p>Date Received:</p>
                    </div>
                  </div>
                  <p class="mt-2">Your premium supplier. Only the best</p>
                </div>
              </div>
            </div>


          </div>
        </div>
        <!--end invoice template-->
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- //switches -->

				</div>
			<!--body wrapper start-->
			</div>
			 <!--body wrapper end-->
		</div>
@endsection
