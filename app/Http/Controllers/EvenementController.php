<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Evenement;
use Illuminate\Http\Request;
use tidy;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenements = Evenement::all();
        // dd($evenements);
        return view('assos.dashboard', compact('evenements'));
    }


    public function index2()
    {
        $evenements = Evenement::all();
        // dd($evenements);
        return view('dashboard', compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('evenements.ajouter');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = $request->validate(
            [
                'libelle' => 'required|string|max:50',
                'description' => 'required|string',
                'dateEvenement' => 'required|date',
                'dateLimitEvenement' => 'required|date',
                'image' => 'required'

            ]
        );

        $evenement = new Evenement($validator);

        $evenement->libelle = $request->libelle;
        $evenement->description = $request->description;
        $evenement->dateEvenement = $request->dateEvenement;
        $evenement->dateLimitEvenement = $request->dateLimitEvenement;
        $evenement->association_id = $request->assos;

        $image = $request->image;

        // dd($image);
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image_path = public_path('image');
        $image->move($image_path, $imageName);

        $evenement->image = "image/" . $imageName;

        $evenement->save();

        return back()->with('success', 'Ajout effectuée avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evenement = Evenement::findorFail($id);
        return view('evenements.details', compact('evenement'));
    }

    public function showmodif(string $id)
    {
        $evenement = Evenement::findorFail($id);
        return view('evenements.modifier', compact('evenement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $evenement = Evenement::findorFail($id);
        // dd($evenement);
        $evenement->is_clotured = 1;
        $evenement->update();



        return back();

        return redirect(route('details'))->with('success', 'Evenement Cloturé');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $evenement = Evenement::findorFail($id);

        $validator = $request->validate(
            [
                'libelle' => 'required|string|max:50',
                'description' => 'required|string',
                'dateEvenement' => 'required|date',
                'dateLimitEvenement' => 'required|date',
                'image'

            ]
        );

        $evenement->libelle = $request->libelle;
        $evenement->description = $request->description;
        $evenement->dateEvenement = $request->dateEvenement;
        $evenement->dateLimitEvenement = $request->dateLimitEvenement;
        $evenement->association_id = $request->assos;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image_path = public_path('image');
            $image->move($image_path, $imageName);
            $evenement->image = "image/" . $imageName;
        }

        $evenement->update();

        return redirect('/assos/dashboard')->with('success', 'Ajout effectuée avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $evenement = Evenement::findorFail($id);

        $evenement->delete();

        return redirect('/assos/dashboard');
    }
}
