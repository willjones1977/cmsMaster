<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use \Carbon\Carbon;
class AssetController extends Controller
{
    public function showAssets(){
    	// ~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=
    	// Display directory contents 
    	// ~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=
        $path = '/';
        if(Input::get('path')):
            $path = Input::get('path');
        endif;

        // error_log('----------------------------------');
        // error_log("path: " . $path);
        // error_log('----------------------------------');
       
    	$files = \Storage::files($path);
    	$directories = \Storage::directories($path);
        foreach($directories as $directory):
            //error_log($directory);
        endforeach;
        foreach($files as $key => $file):
           // error_log(basename($file) . " " . $fileType . " " . $fileSize . " " . \Carbon\Carbon::createFromTimestamp($fileLastModified)->toDateTimeString() . " " . $fileMimeType);
            $fileLastModified = Storage::lastModified($file);
            $lastModified =Carbon::createFromTimestamp($fileLastModified)->toDateTimeString();
            

            $filesInfo[$key]['name']         = basename($file);   
            $filesInfo[$key]['size']         = Storage::size($file);   
            $filesInfo[$key]['lastModified'] = $lastModified;   
            $filesInfo[$key]['mimeType']     = Storage::mimeType($file);   
        endforeach;
    	// ~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=~-=
    	return view('admin.assets')->with('filesInfo', $filesInfo)
                                   ->with('path', $path)->with('files', $files)
    	 						   ->with('directories', $directories);
    }

}
