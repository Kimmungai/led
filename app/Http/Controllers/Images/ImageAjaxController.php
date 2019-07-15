<?php

namespace App\Http\Controllers\Images;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use File;

class ImageAjaxController extends Controller
{
    public function img_tmp( Request $request )
    {
      $rules = ['image' => 'nullable|image|mimes:jpeg,bmp,png|max:1024'];

      if ( $request->hasFile('image') ) {
        return $this->uploads($request,'image');
      }

      return 0;

    }



    protected function validateImage($request,$rules)
    {
      $validator = Validator::make($request->all(),$rules);

      if ($validator->fails()) {
          return response()->json($validator->errors());
      }
    }

    private function uploads($request,$value='avatar')
    {
      $dir_path = env('ORG_IMAGE','images/org');

      if( $request->existing_file_url )
      {
        //delete temporary file
        File::delete( $request->existing_file_url );
      }

      if( $request->hasFile($value) )
      {
        $storageLoc = $dir_path;
        $tmp_path = $this->handleFileUpload($storageLoc,$request,$value);
        return $tmp_path;
      }
    }

    /*
    *Function to upload files
    */
    private function handleFileUpload($storageLoc,$request,$value='avatar')
    {
      $image = $request->file($value);
      $name = time().'.'.$image->getClientOriginalExtension();
      $image->move($storageLoc, $name);
      $path = $storageLoc.'/'.$name;
      return $path;
    }
}
