<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'province' => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'municipality' => ['required', 'string', 'max:255'],
            'ward' => ['required', 'numeric', 'max:255'],
            'severity' => ['required', 'string', 'max:255'],
            'nature' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date', 'max:255'],
            'citizenship' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'string', 'max:255'],
            'blood_group' => ['required', 'string', 'max:255'],
            'name_of_guardian' => ['required', 'string', 'max:255'],
            

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'province' => $request->province,
            'district' => $request->district,
            'municipality' => $request->municipality,
            'ward' => $request->ward,
            'severity' => $request->severity,
            'nature' => $request->nature,
            'dob' => $request->dob,
            'citizenship' => $request->citizenship,
            'sex' => $request->sex,
            'blood_group' => $request->blood_group,
            'name_of_guardian' => $request->name_of_guardian,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
