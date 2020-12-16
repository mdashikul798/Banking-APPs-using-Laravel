<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Userdata;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Input;
use Illuminate\Auth\Events\Registered;
use Intervention\Image\Facades\Image as Image;


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
    protected $redirectTo = '/signup';

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

    public function showRegistrationForm()
    {
        return view('mainsite.signup');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required||max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'age' => 'required|numeric',
            'phone' => 'required|numeric',
            'address' => 'required',
            'postal_code' => 'required|string',
            'country' => 'required',
            'account_type' => 'required',
            'profile_image' => 'required|max:4000|mimes:png,jpg,jpeg',


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
    
    
        $validator=Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'age' => 'required|numeric',
            //'phone' => 'required|phone:AUTO',
            'phone' => 'required',
            'address' => 'required',
            'postal_code' => 'required|string',
            'country' => 'required',
            'account_type' => 'required',
            'profile_image' => 'required|max:2000|mimes:png,jpg,jpeg',


        ])->validate();
    
        $concat = "5969";

        $randnumber = mt_rand( 10000000, 99999999);
        $accountNo= $concat.$randnumber;
        $checkflag = 0;

        while($checkflag != 1) {

            $accountCheck = User::where("account_no", $accountNo)->first();

            if($accountCheck == null){
                $checkflag =1;
            }else{
                $randnumber = mt_rand( 10000000, 99999999);
                $accountNo= $concat.$randnumber;
            }

        }

        $path="";

//        $input = Input::all();
        $imagecheck=Input::hasFile( 'profile_image' );

        if($imagecheck){

            $avatar=$data['profile_image'];
            $filename=time().'.'.$data['profile_image']->getClientOriginalExtension();
            $destinationPath = 'uploads/avatars';

//            $avatar->move($destinationPath, $filename);
            $path='uploads/avatars/'.$filename;


            $image_resize = Image::make($avatar->getRealPath());
            $image_resize->resize(400, 400);
            $image_resize->save('uploads/avatars/'.$filename);
        }


        $user= User::create([
            'account_num' => '5474747',
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'age' => $data['age'],
            'address'=> $data['address'],
            'postalcode' => $data['postal_code'],
            'country' => $data['country'],
            'phone' => $data['phone'],
            'account_type'=> $data['account_type'],
            'profile_image' => $path,
            'account_no' => $accountNo,
            'blocked' => false,
            'verify'=>0


        ]);

        Userdata::create([
            'bankcode' => '061',
            'cashcode' => '902',
            'swiftcode'=> '715',
            'user_id' => $user->id,
            'balance' => 0,
            'title1' =>'Vous devez activer votre transfert !',
            'title2' =>'Notre système a détecté que votre cote de crédit est un peu bas!',
            'title3' =>'Entrez votre code TVA',
            'message1' => 'L\'opération de transfert à été interrompu. Veuillez consulter votre gestionnaire de compte afin d\'obtenir votre code de transfert.',
            'message2' => 'Le système d\'analyse des comptes signale que votre transfert ne peu aboutir. Contacter votre administrateur
',
            'message3' => 'La TVA n\'as pas pu être appliqué à votre transfert. Veuillez entrer le code de la TVA pour continuer',
            'currency'=>'$'



        ]);

	$name=$data['name'];
		$email=$data['email'];

	

  $data1 = array('name'=>$name, 'account_no'=>$accountNo);
  
       Mail::send('accountdetailemail', $data1, function($message) use ($email, $name) {
            $message->to($email, $name)->subject
            ('Account Details');
        });
     
        return $user;
    }
    
     public function register(Request $request)
    {
        event(new Registered($user = $this->create(Request::all() )));

        return redirect('signup')->with(['success' => 'S\'il vous plaît vérifier votre e-mail pour votre numéro de compte']);
    }

   
}
