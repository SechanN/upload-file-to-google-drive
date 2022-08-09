<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // $data = $request->file('thing')->store('', "google");
            $data = $request->file('thing');

            $asd = base64_encode(file_get_contents($data));
            $test =  str_replace('data:image/png;base64,', '', $asd);
            //   dd($request->file('thing')->store('', "google"));
            //    $data = str_replace(' ', '+', $data);
            //    $datas = base64_decode($asd);
            //    dd($test);

           $decode = base64_decode($test);

        //   if (base64_decode($test,true)) {
                // $image = Str::random(40);
            // $decode->store('', 'google');
                Storage::disk('google')->put('tes',$decode);
        //    } else {
        //         dd('gagal');
        //    }

            dd('berhasil');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
