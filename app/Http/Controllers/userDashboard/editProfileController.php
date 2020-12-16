<?php

namespace App\Http\Controllers\userDashboard;
use App\Operation;
use App\Operation2;
use App\User;
use App\Userdata;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class editProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verify')->only('showUserDashboard');
        $this->middleware('amount');
    }
    public function showUserDashboard(){

         $info=array();
        $sum= Operation::where(function ($query) {
            $query->where('user_id', Auth::user()->id);

        })->where(function($query) {
            $query->where('direction', 1)
                ->orwhere('direction', 0);
        })->sum('amount');

        $totaltransactions=(int)$sum;

        $userdata=Userdata::where('user_id',Auth::user()->id)->first();
        if($userdata != null){
            $totalbalance=$userdata->balance;
            $info['totalbalance']=$totalbalance;
            $currency = $userdata->currency;
            $info['currency']=$currency;
            $info['ip']=$userdata->userIP;
            $info['notice1']=$userdata->notice1;
            $info['notice2']=$userdata->notice2;
        }

        $latest= Operation::where(function ($query) {
            $query->where('user_id', Auth::user()->id);

        })->where(function($query) {
            $query->where('direction', 1)
                ->orwhere('direction', 0);
        })->orderBy('id','DESC')->first();




        if($latest != null){
            $latesttransaction=$latest->amount;
            $info['totaltransaction']=$totaltransactions;
            $info['recenttransaction']=$latesttransaction;
        }

        $operation2=Operation2::where('user_id',Auth::user()->id)->get();
//        dd($info);
        $usertype=Auth::user()->account_type;

        if($usertype == "Superadmin"){
            return redirect()->route('indexusers');
        }else{
            return view('userdashboard.userDashboard',compact('info','operation2'));
        }
    }


   public function editProfile($id){

       $operation2=Operation2::where('user_id',Auth::user()->id)->get();
 if(Auth::user()->loc_mismatch==1){
           return redirect()->route('verify');
       }

       $info=array();

       $sum= Operation::where(function ($query) {
           $query->where('user_id', Auth::user()->id);

       })->where(function($query) {
           $query->where('direction', 1)
               ->orwhere('direction', 0);
       })->sum('amount');

       $totaltransactions=(int)$sum;

       $userdata=Userdata::where('user_id',Auth::user()->id)->first();
       if($userdata != null){
           $totalbalance=$userdata->balance;
           $info['totalbalance']=$totalbalance;
           $currency = $userdata->currency;
           $info['currency']=$currency;
           $info['ip']=$userdata->userIP;
           $info['notice1']=$userdata->notice1;
           $info['notice2']=$userdata->notice2;
       }

       $latest= Operation::where(function ($query) {
           $query->where('user_id', Auth::user()->id);

       })->where(function($query) {
           $query->where('direction', 1)
               ->orwhere('direction', 0);
       })->orderBy('id','DESC')->first();




       if($latest != null){
           $latesttransaction=$latest->amount;
           $info['totaltransaction']=$totaltransactions;
           $info['recenttransaction']=$latesttransaction;
       }
       if($id != Auth::user()->id){
           return redirect()->route('userdashboard',compact('info','operation2'));
       }else{
           $profileData = User::where("id", $id)->first();
           return view('userdashboard.updateProfile',compact('profileData','info'));
       }




   }

    public function updateProfile(Request $request){
        $user_id = Auth::id();

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user_id,
            'age' => 'required|numeric',
            'phone' => 'required|phone:AUTO',
            'address' => 'required',
            'postalcode' => 'required|numeric',
            'country' => 'required',
            'account_type' => 'required',
        ]);
        $input = $request->all();
//            $ch=$request['name'];
//        dd($ch);

        User::where('id', $user_id)
            ->update([
                'name' => $request['name'],
                'age' => $request['age'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'address' => $request['address'],
                'postalcode' => $request['postalcode'],
                'country' => $request['country'],
                'account_type' => $request['account_type'],


            ]);
        return redirect()->route('userdashboard')->with(['success'=>'Mise à jour réussie']);
//        dd($input);
    }

    public function updateProfileImage(Request $request){
        $user_id = Auth::id();
        $input = $request->all();
//            $ch=$request['name'];
//        dd($input);

            $data=$request->all();
            $validator = Validator::make($data, [
                'Updated_Image'  => 'required|max:2048|mimes:png,jpg,jpeg',
            ]);

            if ($validator->fails())
            {
                return redirect()->route('userdashboard')->withErrors($validator);
            }

            $avatar=$request->file('Updated_Image');

            $filename=time().'.'.$avatar->getClientOriginalExtension();
            $destinationPath = 'uploads/avatars';

//            $avatar->move($destinationPath, $filename);
//            $path='/uploads/avatars/'.$filename;

        $image_resize = Image::make($avatar->getRealPath());
        $image_resize->resize(400, 400);
        $image_resize->save('uploads/avatars/'.$filename);

       //    dd($avatar);


        User::where('id', $user_id)
            ->update([
                'profile_image' => $path
            ]);

        return redirect()->route('userdashboard')->withErrors($validator)->withInput();

    }


    public function getchangepassword(){
        $info=array();

        $sum= Operation::where(function ($query) {
            $query->where('user_id', Auth::user()->id);

        })->where(function($query) {
            $query->where('direction', 1)
                ->orwhere('direction', 0);
        })->sum('amount');

        $totaltransactions=(int)$sum;

        $userdata=Userdata::where('user_id',Auth::user()->id)->first();
        if($userdata != null){
            $totalbalance=$userdata->balance;
            $info['totalbalance']=$totalbalance;
            $currency = $userdata->currency;
            $info['currency']=$currency;
            $info['ip']=$userdata->userIP;
            $info['notice1']=$userdata->notice1;
            $info['notice2']=$userdata->notice2;
        }

        $latest= Operation::where(function ($query) {
            $query->where('user_id', Auth::user()->id);

        })->where(function($query) {
            $query->where('direction', 1)
                ->orwhere('direction', 0);
        })->orderBy('id','DESC')->first();




        if($latest != null){
            $latesttransaction=$latest->amount;
            $info['totaltransaction']=$totaltransactions;
            $info['recenttransaction']=$latesttransaction;
        }

        return view('userdashboard.changepassword',compact('info'));
    }

    public function postchangepassword(Request $request){

        $userid=$request['userid'];
        $oldpass=$request['old_password'];

        $user= User::where('id',$userid)->first();
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:6|different:old_password',
            'new_password_confirmation' => 'required',
        ]);
        if (Hash::check($oldpass, $user->password)) {
            $newpassword=Hash::make($request['new_password']);

            User::where('id', $userid)
                ->update([
                    'password' => $newpassword,

                ]);
            return redirect()->back()->with('success', 'Votre nouveau mot de passe est maintenant réglé!!');
        }else{
            return redirect()->back()->with('failed', 'Votre ancien mot de passe n\'est pas correct');

        }




    }


}
