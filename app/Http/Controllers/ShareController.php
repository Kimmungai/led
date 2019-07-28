<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\Quotation;
use App\Mail\Invoice;
use App\Mail\IreportEmail;

use App\Report;
use App\Revenue;
use App\Ireport;
use App\IreportInvoices;
use App\Quote;
use PDF;

class ShareController extends Controller
{
    public function share_doc(Request $request)
    {
      $request->validate([
        'email' => 'required|email|max:255',
        'id' => 'required|numeric',
        'docType' => 'required|max:255',
      ]);

    if($request->docType == 'ireport'){
      return $this->share_ireport($request->id,$request->email);
    }elseif ($request->docType =='invoice' ) {
      return $this->share_invoice($request->id,$request->email);
    }elseif ($request->docType =='quote') {
      return $this->share_quote($request->id,$request->email);
    }


      return $request->docType;
    }

    //protected function share_invoice($id,$email)
    //{

    //}

    public function share_quote($id=1,$email='kimpita9@gmail.com')
    {
      $quote = Quote::find($id);
      $doc = $quote;
      $pdf = PDF::loadView('pdf.quote', compact('doc'));
      $pdf->save('doc-'.$id.'.pdf');
      $pathToPDF = 'doc-'.$id.'.pdf';
      Mail::to($email)->send(new Quotation($quote,$pathToPDF));
      unlink('doc-'.$id.'.pdf');
      return 1;
    }

    public function download_quote($id=1)
    {
      $quote = Quote::find($id);
      $doc = $quote;
      $pdf = PDF::loadView('pdf.quote', compact('doc'));
      return $pdf->download();
    }

    public function share_invoice($id=1,$email='kimpita9@gmail.com')
    {
      $invoice = Report::find($id);
      $doc = $invoice;
      $revenues = Revenue::where('sale_id',$invoice->sale_id)->get();
      $pdf = PDF::loadView('pdf.invoice', compact('doc','revenues'));
      $pdf->save('doc-'.$id.'.pdf');
      $pathToPDF = 'doc-'.$id.'.pdf';
      Mail::to($email)->send(new Invoice($invoice,$pathToPDF));
      unlink('doc-'.$id.'.pdf');
      return 1;
    }

    public function download_invoice($id=1)
    {
      $invoice = Report::find($id);
      $doc = $invoice;
      $revenues = Revenue::where('sale_id',$invoice->sale_id)->get();
      $pdf = PDF::loadView('pdf.invoice', compact('doc','revenues'));
      return $pdf->download();
    }


    public function share_ireport($id,$email)
    {
      $ireport = Ireport::find($id);
      $doc = $ireport;
      $invoices = IreportInvoices::where('ireport_id',$ireport->id)->get();
      $pdf = PDF::loadView('pdf.ireport', compact('doc','invoices'));
      $pdf->save('doc-'.$id.'.pdf');
      $pathToPDF = 'doc-'.$id.'.pdf';
      Mail::to($email)->send(new IreportEmail($ireport,$pathToPDF));
      unlink('doc-'.$id.'.pdf');
      return 1;
    }

    public function download_ireport($id=1)
    {
      $ireport = Ireport::find($id);
      $doc = $ireport;
      $invoices = IreportInvoices::where('ireport_id',$ireport->id)->get();
      $pdf = PDF::loadView('pdf.ireport', compact('doc','invoices'));
      return $pdf->download();
    }



}
