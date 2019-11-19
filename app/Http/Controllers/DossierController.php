<?php

namespace App\Http\Controllers;

use App\Dossier;
use App\Demande;
use Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class DossierController extends Controller
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
        $module = $request->file('modules');
        // if(($module->extension() != '.zip') || ($module->extension() != '.rar')){
        //     return back()->with('warning','Votre Module fichier doit etre au format .rar ou .zip');
        // }else{
        // dd($module->extension());
        $extension = $module->extension()?: 'zip';
        $moduleNumber = $request->input('moduleNumber');
        $destinationPath = storage_path('/app/public/uploads/modules/'.Auth()->user()->id.'/'.$request->input('demande_id'));
        $moduleName = 'module-'.$moduleNumber.'-'.str_random(100) . '.' . $extension;
        // dd($moduleName);
        $module->move($destinationPath, $moduleName);

        $labo= Dossier::create([
            'moduleNumber' => $request->input('moduleNumber'),
            'fileName' => $moduleName,
            'user_id' => Auth()->user()->id,
            'demande_id' => $request->input('demande_id')
        ]);

        return back()->with('success','Votre Module '.$request->input('moduleNumber').' a bien été uploader..!!');

        // }
        // //get file
        // $filename = $request->file('modules');

        // //get file extension
        // $extension = $filename->extension()?: 'zip';

        // //get filename to store
        // $module = str_random(50) . '.' . $extension;

        // //Upload file to s3
        // Storage::disk('s3')->put($module, fopen($request->file('modules'), 'r+'), 'public');
        // return redirect('home')->with('status', 'File uploaded successfully in s3');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function show(Dossier $dossier)
    {


        // dd($_GET['file']);
        $filename = $_GET['file'];
        $path = storage_path('app/public/uploads/modules/'.$dossier->user_id.'/'.$dossier->demande_id.'/'.$filename);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/zip',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function edit(Dossier $dossier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dossier $dossier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dossier $dossier)
    {
        //
    }
}
