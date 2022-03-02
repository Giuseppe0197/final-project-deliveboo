<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Category;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/restaurant';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'owner_name' => ['required', 'string', 'max:60'],
            'restaurant_name' => ['required', 'string', 'max:60'],
            'restaurant_phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image'],
            'p_iva' => ['required', 'string', 'max:20']
        ]);
    } 

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $data = User::create([
            'owner_name' => $data['owner_name'],
            'restaurant_name' => $data['restaurant_name'],
            'restaurant_phone' => $data['restaurant_phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'image' => $data['image'],
            'p_iva' => $data['p_iva']
        ]);

        if(request() -> hasFile('image')){
            $image = request() ->file('image');
            $imageName = rand(100000, 999999) . '_' . time() . '.' . $image -> getClientOriginalExtension();
            request() -> file('image') -> storeAs('/images/', $imageName, 'public');
            $data -> update(['image' => $imageName]);
        }

        // dd($data);

        // $user = $data['id'];

        // $categories = Category::findOrFail(request() -> get('category_id'));
        // $user -> categories() -> attach($categories);

        // $user -> save();

        return $data;
    }

}
