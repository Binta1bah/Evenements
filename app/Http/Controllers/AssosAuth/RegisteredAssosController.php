<?php

namespace App\Http\Controllers\AssosAuth;

use Illuminate\View\View;
use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredAssosController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('assos.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'slogan' => ['required', 'string', 'max:255'],
            'dateCreation' => ['required', 'date'],
            // 'logo' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . Association::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $logo = $request->logo;

        $logoName = time() . '.' . $logo->getClientOriginalExtension();

        $logoPath = public_path('images');

        $logo->move($logoPath, $logoName);



        $assos = Association::create([
            'nom' => $request->nom,
            'slogan' => $request->slogan,
            'dateCreation' => $request->dateCreation,
            'logo' => 'images/' . $logoName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($assos));

        Auth::login($assos);

        return redirect('login/assos');
        // return redirect('dashboard/assos');



        // return redirect(RouteServiceProvider::ADMIN_DASHBOARD);
    }
}
