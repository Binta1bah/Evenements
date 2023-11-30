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
        $reservations = Reservation::with('user', 'evenement')->get();
        return view('evenements.demandes', compact('reservations'));
    }

    public function index2()
    {
        $reservations = Reservation::with('user', 'evenement')->get();
        return view('dashboard', compact('reservations'));
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
        $revervation->user_id = $request->client;
        $revervation->evenement_id = $request->evenement;

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
    public function refuser(string $id)
    {
        $reservation = Reservation::findorFail($id);

        $reservation->is_accepted = 0;
        $reservation->update();

        return back();
    }

    // public function accepter(string $id)
    // {
    //     $reservation = Reservation::findorFail($id);

    //     $reservation->is_accepted = 1;
    //     $reservation->update();

    //     return back();
    // }



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
