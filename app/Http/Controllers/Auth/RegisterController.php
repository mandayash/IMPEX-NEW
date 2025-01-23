<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\SellerProfile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;
    // Array of ASEAN countries
    protected $aseanCountries = [
        'Brunei',
        'Cambodia',
        'Indonesia',
        'Laos',
        'Malaysia',
        'Myanmar',
        'Philippines',
        'Singapore',
        'Thailand',
        'Vietnam'
    ];

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country' => ['required', 'string', 'in:'.implode(',', $this->aseanCountries)],
            'place_of_birth' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'phone_number' => ['required', 'string', 'max:20'],
            'shop_name' => ['nullable', 'string', 'max:255'],

        ]);
    }


    public function showRegistrationForm()
    {
        return view('auth.register', [
            'countries' => $this->aseanCountries
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $role = $request->country === 'Indonesia' ? 'seller' : 'buyer';

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country' => $request->country,
            'place_of_birth' => $request->place_of_birth,
            'birth_date' => $request->birth_date,
            'phone_number' => $request->phone_number,
            'role' => $role
        ]);


        // if($user){

        //     $photoPath = null;
        //     if ($request->hasFile('shop_photo')) {
        //         $photoPath = $request->file('shop_photo')->store('shop-photos', 'public');
        //     }

        //     SellerProfile::create([
        //         'user_id' => $user->id,
        //         'shop_name' => $request->shop_name,
        //         'description' => $request->description,
        //         'shop_photo' => $photoPath,
        //         'is_verified' => 1
        //     ]);
        // }

        // If user is from Indonesia, create empty seller profile
        if ($role === 'seller') {
            SellerProfile::create([
                'user_id' => $user->id
            ]);
        }

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectTo);
    }

    protected function registered(Request $request, $user)
    {
        //
    }
}

