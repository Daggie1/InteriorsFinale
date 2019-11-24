<?php

namespace App\Http\Controllers\Seller;

use App\constants\Constants;
use App\Http\Controllers\BaseController;
use App\Models\Counties;
use App\Models\Seller;
use App\Models\Shop;
use App\Traits\UploadAble;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    use AuthenticatesUsers;


    /**
     * Where to redirect admins after login.
     *
     * @var string
     */
    protected $redirectTo = '/seller';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:seller')->except('logout');
    }
    public function showRegisterForm()
    {
        $data=[
            'counties'=>Counties::all()
        ];
        return view('seller.auth.register',$data);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $data)
    {
        $this->validate($data, [
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255','unique:sellers'],
            'id_no' => ['required', 'string', 'max:255','unique:sellers'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:sellers'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $seller= Seller::create([
            'f_name' => $data['f_name'],
            'l_name' => $data['l_name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'id_no' => $data['id_no'],
            'status'=> Constants::STATUS_ACTIVE,
            'subscription'=>Constants::UNSUBSCRIBED
        ]);
        if($seller){
            //$this->createShop($data,$seller->id);
            $this->login($data);
         return redirect($this->redirectTo);
        }

    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {

        return view('seller.auth.login');
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('seller')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->get('remember'))) {
            return redirect()->intended(route('seller.dashboard'));
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function logout(Request $request)
    {
        Auth::guard('seller')->logout();
        $request->session()->invalidate();
        return redirect()->route('seller.login');
    }
    public function createShop(Request $data,$sellerId){
        $collection = collect($data);

        $image = null;

        if ($collection->has('image') && ($data['image'] instanceof  UploadedFile)) {
            $image = $this->uploadOne($data['image'], 'shops');
        }
        return Shop::create([
            'seller_id'=>$sellerId,
            'name' => $data['shop_name'],
            'phone' => $data['shop_phone'],
            'location' => $data['location'],
            'description' => $data['description'],

            'image' => $image
        ]);
    }

}
