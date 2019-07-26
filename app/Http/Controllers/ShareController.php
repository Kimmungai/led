<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\Quotation;

use App\Report;
use App\Ireport;
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

      switch ($request->docType) {
        case 'invoice':
          $this->share_invoice($request->id,$request->email);
          break;

        case 'quote':
          return $this->share_quote($request->id,$request->email);
          break;

        case 'ireport':
          $this->share_ireport($request->id,$request->email);
          break;
      }
      return 1;
    }

    protected function share_invoice($id,$email)
    {

    }

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

    protected function share_ireport($id,$email)
    {

    }



}
