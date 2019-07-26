<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>{{$doc->cust_name}} {{$doc->title}}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        .text-right {
            text-align: right;
        }
        .delivery-details table{
          width: 100%;
          margin-bottom: 1px;
        }
        .delivery-details table tbody th,td{
          padding: 5px;
        }
        .delivery-details table thead th{
          padding: 0 5px;
        }
        .delivery-details table tbody tr{
          border-bottom: 1px dotted #000;
        }
        .delivery-details table tbody tr:nth-last-child(1){
          border-bottom: 1px solid #000;
        }
        .notices{
          margin-top: 2em;
          border: 2px solid #000;
          padding: 5px;
        }
        .notices h4{
          text-align: center;
          text-transform: uppercase;
          font-weight: bold;
          text-decoration: underline;
        }
        .foot-note{
          text-align: center;
          padding-top: 1em
        }
        .sign-line{
          border-bottom: 1px dotted #000;
        }
        .sign-line p{
          margin: 2em 0;
        }
    </style>

</head>
<body class="login-page" style="background: white">

    <div>

      <div style="margin-bottom: 0px">&nbsp;</div>

        <div class="row">
          <div class="col-xs-12">
            <h1 class="text-center text-uppercase"><strong><u>{{$doc->title}}</u></strong></h1>
          </div>
        </div>

        <div class="row">
            <div class="col-xs-8">
                {{$doc->cust_name}}<br>
                {{$doc->cust_phone}}02<br>
                {{$doc->cust_email}}<br>
                {{$doc->cust_address}}<br>
                <br>
            </div>

            <div class="col-xs-4">
                <h4>No. {{$doc->id}}</h4>
                <h4>Date: {{date('Y-m-d')}}</h4>
                <address>
                    <strong>{{$doc->company_name}}</strong><br>
                    <span>{{$doc->company_email}}</span> <br>
                    <span>{{$doc->company_phone}}</span>
                </address>
            </div>


        </div>

        <div style="margin-bottom: 0px">&nbsp;</div>

        <div class="delivery-details">
        <table border="1" >
          <thead>
            <tr class="text-upper">
              <th>{{$doc->products_table_name}}</th>
              <th>{{$doc->products_table_part_no}}</th>
              <th>{{$doc->products_table_description}}</th>
              <th>{{$doc->products_table_qty}}</th>
              <th>Delivered</th>
              <th>Outstanding</th>
            </tr>
          </thead>
          <tbody>


          </tbody>

        </table>



        </div>

        <div style="margin-bottom: 0px">&nbsp;</div>

        <div class="row">
          <div class="col-xs-5 ">
            <div class="sign-line">
              <p>Received</p>
            </div>
          </div>
          <div class="col-xs-5">
            <div class="sign-line">
              <p>Signature</p>
            </div>
          </div>

        </div>



            <div style="margin-bottom: 0px">&nbsp;</div>

            <div class="row">
              <div class="col-xs-12">
                <div class="notices">
                  <h4>{{$doc->terms_title}}</h4>
                  <ol>
                    <li>{{$doc->term_1}}</li>
                    <li>{{$doc->term_2}}</li>
                    <li>{{$doc->term_3}}</li>
                    <li>{{$doc->term_4}}</li>
                  </ol>
                </div>
                <h5 class="foot-note">{{$doc->foot_note_title}}</h5>
              </div>

            </div>


        </div>

    </body>
    </html>
