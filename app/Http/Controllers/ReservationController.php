<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $evenement = Evenement::findorFail($id);

        return view('reservation.ajouter', compact('evenement'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // dd($request->all());
        // $validation = $request->validate([
        //     'libelle' => 'required|integer'
        // ]);

        $revervation = new Reservation();

        $revervation->nombrePlace = $request->nbPlace;
        $revervation->client = $request->client;
        $revervation->evenement = $request->evenement;

        $revervation->save();



        return redirect()->route('details', ['id' => $revervation->evenement]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
