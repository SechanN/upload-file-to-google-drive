<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\VarDumper\VarDumper;

class DocumentController extends Controller
{
        public function createFolder(Request $request)
        {
            // sub directory & also created folder
            // note: cek kondisi dimana folder kalau sudah ada

            $nameDir = $request->directory;

            $nameSubDirSec = $request->subDirectorySec;

            // Find parent dir for reference
            $dir = '/';
            $subDir = '/'. $nameDir;
            $recursive = false; // Get subdirectories also?
            $contents = collect(Storage::disk('google')->listContents($dir, $recursive));

            $searchFolder = $contents->where('type', '=', 'dir')->where('filename', '=' , $nameDir);
            $searchSubFolder = $contents->where('type', '=', 'dir')->where('filename', '=' , $subDir);

            if( count($searchFolder) && count ($searchSubFolder) > 0 ) { // gaada
                return redirect('/')->with('warning', 'Directori Or Sub Directori Sudah Ada!');
            }

            // if( count ($searchSubFolder) ) {
            //     return redirect('/')->with('warning','Sub Folder Sudah Ada');
            // }

            if( count ($searchFolder) === 0) {
                Storage::disk('google')->makeDirectory($nameDir);

            }


            $contentss = collect(Storage::disk('google')->listContents($dir, $recursive));

            $dir = $contentss->where('type', '=', 'dir')
                    ->where('filename', '=', $nameDir)
                    ->first(); // There could be duplicate directory names!

            // if (!$dir) {
            //     return redirect('/')->with('info', 'Directori Tidak Ada!');
            // }

            // Create sub dir
            Storage::disk('google')->makeDirectory($dir['path'].'/'. $nameSubDirSec);

            return redirect('/')->with('success', 'Folder created in Google Drive!');

        }

        public function store(Request $request)
        {

               $data = $request->file('thing');

               $asd = base64_encode(file_get_contents($data));
               $test =  str_replace('data:image/png;base64,', '', $asd);

               $decode = base64_decode($test);

               $root = '';

               $nameDir = 'Kelas 9';

               $nameSubDirSec = '9A';


               $content = collect(Storage::disk('google')->listContents('/', false));
                   foreach ($content as $key => $value) {
                       if($value['name'] == $nameDir)
                           $root = $value['path'];
                   }

               $dir = './' . $root;
               $recursive = true;
               $contents = collect(Storage::disk('google')->listContents($dir, $recursive));

               $dir = $contents->where('type', '=', 'dir')
               ->where('filename', '=', $nameSubDirSec)
               ->first(); // There could be duplicate directory names!

               if (!$dir) {
                   return redirect('/')->with('info', 'Directori Tidak Ada!');
               }
               $oriImage =  $data->getClientOriginalName();

               Storage::disk('google')->put($dir['path'].'/'. $oriImage, $decode);

               return redirect('/')->with('success', 'File created in Google Drive');

                // Storage::disk('google')->put($oriImage ,$decode);
            }

        public function getListFolder()
        {
            $dir = '/';
            $recursive = false; // Get subdirectories also?
            $contents = collect(Storage::disk('google')->listContents($dir, $recursive));

            return  $contents->where('type', '=', 'dir')[0]['name']; // directories

             // The human readable folder name to get the contents of...
    // For simplicity, this folder is assumed to exist in the root directory.
            // $folder = '/';

            // // Get root directory contents...
            // $contents = collect(Storage::disk('google')->listContents('/', false));

            // // Find the folder you are looking for...
            // $dir = $contents->where('type', '=', 'dir')
            //     ->where('filename', '=', $folder)
            //     ->first(); // There could be duplicate directory names!

            // if ( ! $dir) {
            //     return 'No such folder!';
            // }

            // // Get the files inside the folder...
            // $files = collect(Storage::disk('google')->listContents($dir['path'], false))
            //     ->where('type', '=', 'file');

            // return $files->mapWithKeys(function($file) {
            //     $filename = $file['filename'].'.'.$file['extension'];
            //     $path = $file['path'];

            //     // Use the path to download each file via a generated link..
            //     // Storage::cloud()->get($file['path']);

            //     return [$filename => $path];
            // });
        }
}
