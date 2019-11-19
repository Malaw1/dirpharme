<?php

namespace App\Http\Controllers;

use App\Recevabilite;
use App\Produit;
use App\Demande;
use Illuminate\Http\Request;

class RecevabiliteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $received = Demande::join('produits', 'produits.demande_id', '=', 'demandes.id')
        ->join('recevabilites', 'recevabilites.demande_id', '=', 'demandes.id')
        ->where('recevabilites.user_id', Auth()->user()->id)
        ->get();
        // dd($received);
        return view('recevabilite.index', ['received' => $received]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $demande = Demande::join('produits', 'produits.demande_id', '=', 'demandes.id')
        ->join('recevabilites', 'recevabilites.demande_id', '=', 'demandes.id')
        ->where('recevabilites.id', $_GET['id'])->first();
        // dd($received);
        return view('recevabilite.create', ['demande' => $demande]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produit= Recevabilite::create([
            'user_id' => $request->input('user_id'),
            'demande_id' => $request->input('demande_id'),
            'deadline' => $request->input('deadline'),
            'commentaire' => $request->input('commentaire')
        ]);
        return back()->with('success','');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recevabilite  $recevabilite
     * @return \Illuminate\Http\Response
     */
    public function show(Recevabilite $recevabilite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recevabilite  $recevabilite
     * @return \Illuminate\Http\Response
     */
    public function edit(Recevabilite $recevabilite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recevabilite  $recevabilite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recevabilite $recevabilite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recevabilite  $recevabilite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recevabilite $recevabilite)
    {
        //
    }
}
