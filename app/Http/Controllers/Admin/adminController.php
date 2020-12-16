<?php

namespace App\Http\Controllers\Admin;

use App\Assurance;
use App\ContactUs;
use App\Notification;
use App\Operation2;
use App\Trackuser;

use App\TrackFile;
use App\TwoFactoe;
use App\User;
use App\Userdata;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DateTime;
use App\Operation;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Services_Twilio;
use Aloha\Twilio\Twilio;

class adminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['createassurance', 'contact_us', 'viewtrackfilerequest']]);
    }

    public function indexusers(Request $request)
    {
        $user = Auth::user();

        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {

            $users = User::where('account_type', '!=', 'Superadmin')->where('account_type', '!=', 'Moderator 1')->where('account_type', '!=', 'Moderator 2')->where('account_type', '!=', 'Moderator 3')->with(['account'])->orderBy('id', 'desc')->get();
            // $users = User::where('account_type', '!=', 'admin')->where('account_type', '!=', 'superadmin')->where('account_type', '!=', 'subadmin')->where('account_type', '!=', 'moderator')->with(['account'])->orderBy('id', 'desc')->get();
            
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.indexUsers', compact('users', 'count'));
        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function editprofile($id)
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {

            $profileData = User::where("id", $id)->with('account')->first();
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.editUserProfile', compact('profileData', 'count'));

        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function deleteuser($id)
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $delid = $id;

            $user = User::find($delid);

            $user->delete();

            return back()->with(['success' => 'Supprimé avec succès']);
        }
//        elseif($user->account_type == "subadmin"){
//            return redirect()->route('indexusers');
//
//        }
        else {
            return redirect()->route('userdashboard');
        }
    }

    public function blockuser(Request $request)
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $userid = $request->userid;
            $status = $request->block;
            $userdata = User::where('id', $userid)->first();

            if ($userdata->account_type == 'Superadmin' || $userdata->account_type == 'Moderator 1' || $userdata->account_type == 'Moderator 2' || $user->account_type == "Moderator 3") {
                $route = "indexadmins";
            } else {
                $route = "indexusers";

            }
            User::where('id', $userid)
                ->update([
                    'blocked' => $status
                ]);
            if ($status == 1) {
                $msg = "L'utilisateur a été bloqué.";
            } else {
                $msg = "L'utilisateur a été débloqué.";

            }


            return redirect()->route($route)->with(['success' => $msg]);
        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $userid = $request['userid'];
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $userid,
                'age' => 'required|numeric',
                'phone' => 'required|phone:AUTO',
                'address' => 'required',
                'postalcode' => 'required|numeric',
                'country' => 'required',
                'account_type' => 'required',
                'account_number' => 'required|numeric',

            ]);
            $input = $request->all();
//            $ch=$request['name'];
//        dd($input);

            User::where('id', $userid)
                ->update([
                    'name' => $request['name'],
                    'age' => $request['age'],
                    'email' => $request['email'],
                    'phone' => $request['phone'],
                    'address' => $request['address'],
                    'postalcode' => $request['postalcode'],
                    'country' => $request['country'],
                    'account_type' => $request['account_type'],
                    'account_no' => $request['account_number'],




                ]);
            return redirect()->route('indexusers')->with(['success' => 'Mise à jour réussie']);
        } else {
            return redirect()->route('userdashboard');
        }
//        dd($input);
    }

    public function updateprofileimage(Request $request)
    {

        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 3" || $user->account_type == "Moderator 3") {
            $user_id = $request->userid;
            $data = $request->all();


            $validator = Validator::make($data, [
                'Updated_Image' => 'required|max:300|mimes:png,jpg,jpeg',
            ]);

            if ($validator->fails()) {
                return redirect()->route('editprofileadmin', $user_id)->withErrors($validator);
            }
//
            $avatar = $request->file('Updated_Image');


            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $destinationPath = 'uploads/avatars';

            $avatar->move($destinationPath, $filename);
            $path = '/uploads/avatars/' . $filename;


            User::where('id', $user_id)
                ->update([
                    'profile_image' => $path
                ]);
      $track=new TrackUser();
            $track->user_id=$user_id;
              $track->who_user=$user->id;

            $track->b_name=$request->header('User-Agent');
            $track->b_version='Change Profile Picture';

            $track->save();
            return redirect()->route('editprofileadmin', $user_id)->with(['success' => 'Mise à jour réussie']);
        } else {
            return redirect()->route('userdashboard');
        }

    }

    public function getCreateUserForm()
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin") {
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.createUser', compact('count'));
        } elseif ($user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            return redirect()->route('indexusers');

        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function createUser(Request $request)
    {

        $user = Auth::user();
        if ($user->account_type == "Superadmin") {
            $in = $request->all();
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required',
                'usertype' => 'required',

            ]);

            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),

                'account_type' => $request['usertype'],
                'account_no' => "0",
                'blocked' => false

            ]);

            return redirect()->route('indexadmins')->with(['success' => 'Superadmin créé avec succès']);
        } elseif ($user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            return redirect()->route('indexusers');

        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function editadmins($id)
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin") {

            $adminData = User::where("id", $id)->first();
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.editAdminProfile', compact('adminData', 'count'));

        } elseif ($user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            return redirect()->route('indexusers');

        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function updateadmin(Request $request)
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin") {


            $userid = $request['userid'];

            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $userid,
//            'password' => 'required|string|min:6|confirmed',

            ]);
            $input = $request->all();
//            $ch=$request['name'];
//        dd($input);

            User::where('id', $userid)
                ->update([
                    'name' => $request['name'],
                    'email' => $request['email'],


                ]);
            return redirect()->route('indexadmins')->with(['success' => 'Mise à jour réussie']);

        } elseif ($user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            return redirect()->route('indexusers');

        } else {
            return redirect()->route('userdashboard');
        }
//        dd($input);
    }


    public function indexadmins()
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin") {

            $users = User::where('account_type', '!=', 'personal')->where('account_type', '!=', 'corporate')->orderBy('id', 'desc')->get();
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.indexAdmin', compact('users', 'count'));

        } elseif ($user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            return redirect()->route('indexusers');

        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function addoperation($id)
    {

        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $userid = $id;
            $user = User::where('id', $userid)->first();
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.addOperation', compact('user', 'count'));
        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function postaddoperation(Request $request)
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $userid = $request['userid'];

            $d = $request->all();
            $this->validate($request, [
                'account_number' => 'required|numeric',
                'description' => 'required',
                'comment' => 'required',
                'direction' => 'required',
                'bank_name' => 'required',
                'amount' => 'required|numeric',

            ]);

            $userdata = User::where('id', $userid)->with('account')->first();
            $today = date("Y-m-d");


            Operation::create([
                'account_from' => $userdata->account_no,
                'account_to' => $request['account_number'],
                'description' => $request['description'],
                'direction' => $request['direction'],
                'amount' => $request['amount'],
                'user_id' => $userid,
                'comment' => $request['comment'],
                'date' => $today,
                'bank' => $request['bank_name'],

            ]);

            $newbalance = $userdata->account->balance - $request['amount'];
//            dd($newbalance);
            Userdata::where('user_id', $userid)
                ->update([
                    'balance' => $newbalance,
                ]);

            return redirect()->route('manageoperations', $userid)->with(['success' => 'Opération ajoutée avec succès.']);

        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function editoperation($id)
    {

        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $operationid = $id;

            $operation = Operation::where('id', $operationid)->first();
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

//        dd($operation);
            return view('adminDashboard.editOperation', compact('operation', 'count'));
        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function deleteoperation($id)
    {

        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $delid = $id;

            $operation = Operation::find($delid);

            $operation->delete();

            return back()->with(['success' => 'Opération supprimée avec succès.']);

        }
//elseif($user->account_type == "subadmin"){
//                return redirect()->route('indexusers');
//
//            }
        else {
            return redirect()->route('userdashboard');
        }
    }

    public function updateoperation(Request $request)
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $this->validate($request, [
                'account_number' => 'required|numeric',
                'description' => 'required',
                'comment' => 'required',
                'direction' => 'required',
                'bank_name' => 'required',
                'amount' => 'required|numeric',

            ]);

            $operation = Operation::where('id', $request['operationid'])->first();
            $userid = $operation->user_id;

            Operation::where('id', $request['operationid'])
                ->update([
                    'account_to' => $request['account_number'],
                    'description' => $request['description'],
                    'direction' => $request['direction'],
                    'amount' => $request['amount'],
                    'comment' => $request['comment'],
                    'bank' => $request['bank_name'],
                ]);


//        dd($operation);
            return redirect()->route('manageoperations', $userid)->with(['success' => 'Opération mise à jour Suuccessfully.']);

        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function manageoperations($id)
    {

        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $userid = $id;
            $user = User::where('id', $userid)->first();
            $operations = Operation::where('user_id', $userid)->orderBy('id', 'desc')->get();
//        dd($operations);
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.manageOperation', compact('user', 'operations', 'count'));

        } else {
            return redirect()->route('userdashboard');
        }
    }


    public function manageoperations2($id)
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {

            $userid = $id;
            $operations2 = Operation2::where('user_id', $userid)->orderBy('id', 'desc')->get();
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.manageOperations2', compact('operations2', 'userid', 'count'));
        } else {
            return redirect()->route('userdashboard');
        }
    }


    public function addoperation2($id)
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $userid = $id;
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.addOperation2', compact('userid', 'count'));
        } else {
            return redirect()->route('userdashboard');
        }
    }


    public function postaddoperation2(Request $request)
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {

            $this->validate($request, [
                'description' => 'required',
                'credit_amount' => 'numeric',
                'debit_amount' => 'numeric',
            ]);
            $credit = $request['credit_amount'];
            $debit = $request['debit_amount'];

            if ($credit == null && $debit == null) {
                return back()->with(['failed' => 'Vous devez sélectionner atleast un de crédit et de débit']);
            }


            $today = date("Y-m-d");
            $userid = $request['userid'];

            $userdata1 = User::where('id', $userid)->first();
            $accountfrom = $userdata1->account_no;

            Operation2::create([
                'account_from' => $accountfrom,
                'date' => $today,
                'comment' => $request['description'],
                'user_id' => $userid,
                'debit' => $debit,
                'credit' => $credit,

            ]);

            return redirect()->route('manageoperations2', $userid)->with(['success' => 'Opération ajoutée avec succès.']);

        } else {
            return redirect()->route('userdashboard');
        }
    }


    public function editoperation2($id)
    {

        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2"|| $user->account_type == "Moderator 3") {
            $operationid = $id;

            $operation = Operation2::where('id', $operationid)->first();
//        dd($operation);
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.editOperation2', compact('operation', 'count'));
        } else {
            return redirect()->route('userdashboard');
        }
    }


    public function updateoperation2(Request $request)
    {

        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {

            $this->validate($request, [
                'description' => 'required',
                'credit_amount' => 'numeric',
                'debit_amount' => 'numeric',

            ]);
            $credit = $request['credit_amount'];
            $debit = $request['debit_amount'];

            if ($credit == null && $debit == null) {
                return back()->with(['failed' => 'Vous devez sélectionner atleast un de crédit et de débit']);
            }

            $this->validate($request, [
                'description' => 'required',
            ]);

            $operation = Operation2::where('id', $request['operationid'])->first();
            $userid = $operation->user_id;

            Operation2::where('id', $request['operationid'])
                ->update([
                    'comment' => $request['description'],
                    'debit' => $debit,
                    'credit' => $credit,
                ]);


//        dd($operation);
            return redirect()->route('manageoperations2', $userid)->with(['success' => 'Opération mise à jour Suuccessfully.']);

        } else {
            return redirect()->route('userdashboard');
        }
    }


    public function deleteoperation2($id)
    {

        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $delid = $id;

            $operation = Operation2::find($delid);

            $operation->delete();

            return back()->with(['success' => 'Opération supprimée avec succès.']);
            return redirect()->route('userdashboard');

        }
//            elseif($user->account_type == "subadmin"){
//                return redirect()->route(' indexusers');
//
//            }
        else {
            return redirect()->route('userdashboard');
        }
    }

    public function updatemyprofile()
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.adminSelfProfileEdit', compact('count'));

        } else {
            return redirect()->route('userdashboard');
        }

    }


    public function verificationsettings($id)
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin") {
            $userid = $id;

            $userdata = Userdata::where('user_id', $userid)->first();
//        dd($userdata);
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.verificationSettings.superadmin', compact('userdata', 'userid', 'count'));

        } elseif ($user->account_type == "Moderator 3") {
            $userid = $id;

            $userdata = Userdata::where('user_id', $userid)->first();
//        dd($userdata);
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.verificationSettings.moderator3', compact('userdata', 'userid', 'count'));

        } elseif ($user->account_type == "Moderator 2") {
            $userid = $id;

            $userdata = Userdata::where('user_id', $userid)->first();
//        dd($userdata);
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.verificationSettings.moderator2', compact('userdata', 'userid', 'count'));

        } elseif ($user->account_type == "Moderator 1") {
            $userid = $id;

            $userdata = Userdata::where('user_id', $userid)->first();
//        dd($userdata);
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.verificationSettings.moderator1', compact('userdata', 'userid', 'count'));

        }else {
            return redirect()->route('userdashboard');
        }
    }

    public function postverificationsettings(Request $request)
    {
        
        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $userid = $request->userid;

            $this->validate($request, [
                'code1' => 'numeric|nullable',
                'code2' => 'numeric|nullable',
                'code3' => 'numeric|nullable',
                'notice1'=>'max:27|nullable',
                'notice2'=>'max:40|nullable',

            ]);

            Userdata::where('user_id', $userid)
                ->update([
                    'code1' => $request['code1'],
                    'code2' => $request['code2'],
                    'code3' => $request['code3'],
                    'message1' => $request['message1'],
                    'message2' => $request['message2'],
                    'message3' => $request['message3'],
                    'title1' => $request['title1'],
                    'title2' => $request['title2'],
                    'title3' => $request['title3'],
                    'currency' => $request['currency'],
                    'minimum_balance' => $request['minimum_balance'],
                    'notice1' => $request['notice1'],
                    'notice2' => $request['notice2'],

                ]);
            
            return redirect()->route('editprofileadmin', $userid)->with(['success' => 'Enregistré avec succès']);

        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function setamount(Request $request)
    {
            
        $user = Auth::user();
        if ($user->account_type == "Superadmin" || ($user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3")) {
            $this->validate($request, [
                'amount' => 'required|numeric',
            ]);

            $userid = $request->userid;
            $track=new TrackUser();
            $track->user_id=$userid;
              $track->who_user=$user->id;

            $track->b_name=$request->header('User-Agent');
            $track->b_version='Amount changed to  '. $request['amount'];

            $track->save();
            Userdata::where('user_id', $userid)
                ->update([
                    'balance' => $request['amount'],
                   'currency' => $request['c'],


                ]);

            return redirect()->route('editprofileadmin', $userid)->with(['success' => 'Enregistré avec succès']);
        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function checktimer()
    {
        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-6 24:57:34');
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-7 00:00:54');


        $currentDate = strtotime('2018-03-22 19:06:31');
        $date = '2018-03-22 19:00:31';
        $userLastActivity = strtotime($date);
        $ff = ($currentDate - $userLastActivity) / 60;
       // dd($ff);


    }

    public function contact_us(Request $request)
    {
//            dd($request->all());

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'contact' => 'required|numeric',
            'contact' => 'required',
            'country' => 'required',
            'address' => 'required',
            'message' => 'required',

        ]);

        $name = $request['name'];
        $email = $request['email'];
        $contact = $request['contact'];
        $country = $request['country'];
        $address = $request['address'];
        $text = $request['message'];

        ContactUs::create([
            'name' => $name,
            'email' => $email,
            'contact' => $contact,
            'address' => $address,
            'country' => $country,
            'message' => $text,
        ]);

        $data1 = array('name' => $name, 'email' => $email, 'contact' => $contact, 'country' => $country, 'address' => $address, 'text' => $text);
        $mailto = env('MAIL_TO');
        Mail::send('contactmessageemail', $data1, function ($message) use ($email, $name, $mailto) {
            $message->to($mailto)->subject
            ('Message de contact');
        });


        $message = $name. " vous a contacté";
        $notification = Notification::create([
            'message' => $message,
        ]);

        $users = User::where('account_type', 'Superadmin')->orwhere('account_type', 'Moderator 1')->orwhere('account_type', 'Moderator 2')->orwhere('account_type', 'Moderator 3')->get();
        foreach ($users as $user) {

            $user->notifications()->attach($notification->id, ['user_id' => $user->id, 'status' => 0]);
        }
        return back()->with(['success' => 'Message envoyé avec succès']);

    }

    public function indexContacts()
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $contacts = ContactUs::orderBy('id', 'desc')->get();
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.indexContacts', compact('contacts', 'count'));
        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function viewContact($id)
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $contact = ContactUs::where('id', $id)->first();
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.viewContact', compact('contact', 'count'));

        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function deleteContact($id)
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $contact = ContactUs::find($id);

            $contact->delete();

            return redirect()->route('indexcontacts')->with(['success' => 'Supprimé avec succès']);

        }
//        elseif($user->account_type == "subadmin"){
//            return redirect()->route('indexusers');
//
//        }
        else {
            return redirect()->route('userdashboard');
        }
    }

    public function viewtrackform()
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.trackform', compact('count'));
        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function createtrackfile(Request $request)
    {

        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {

            $data = $request->all();
            $trackingcode = mt_rand(100000, 999999);

            $validator = Validator::make($data, [
                'image' => 'max:2048|mimes:png,jpg,jpeg',
                'message' => 'required|string'
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
//
            $avatar = $request->file('image');

            $path="";
            if($avatar != null){
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                $destinationPath = 'uploads/trackingfiles';

                $avatar->move($destinationPath, $filename);
                $path = '/uploads/trackingfiles/' . $filename;
            }


            TrackFile::create([
                'trackcode' => $trackingcode,
                'message' => $request['message'],
                'path' => $path,

            ]);

            return redirect()->route('indextrackfiles')->with(['success' => 'Créé avec succès. Votre code de piste est ' . $trackingcode]);

        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function indextrackfiles()
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $trackings = TrackFile::orderBy('id', 'desc')->get();
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.indexTrackCodes', compact('trackings', 'count'));

        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function edittrackform($id)
    {

        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {

            $tracking = TrackFile::where('id', $id)->first();
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard/editTrackFile', compact('tracking', 'count'));
        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function updatetrackfile(Request $request)
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $data = $request->all();

            $validator = Validator::make($data, [
                'image' => 'max:2048|mimes:png,jpg,jpeg',
                'message' => 'required|string'
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            if ($request->hasFile('image')) {

                $avatar = $request->file('image');


                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                $destinationPath = 'uploads/trackingfiles';

                $avatar->move($destinationPath, $filename);
                $path = '/uploads/trackingfiles/' . $filename;

                TrackFile::where('id', $request['trackid'])
                    ->update([
                        'message' => $request['message'],
                        'path' => $path,

                    ]);
            } else {
                TrackFile::where('id', $request['trackid'])
                    ->update([
                        'message' => $request['message'],

                    ]);
            }

            return redirect()->route('indextrackfiles')->with(['success' => 'Mise à jour réussie']);
        } else {
            return redirect()->route('userdashboard');
        }

    }

    public function deletetrackfile($id)
    {

        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $trackcode = TrackFile::find($id);

            $trackcode->delete();

            return redirect()->route('indextrackfiles')->with(['success' => 'Supprimé avec succès']);
        }
//elseif($user->account_type == "subadmin"){
//            return redirect()->route('indexusers');
//
//        }
        else {
            return redirect()->route('userdashboard');
        }

    }

    public function viewtrackfile($id)
    {

        $user = Auth::user();
        if ($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {

            $track = TrackFile::where('id', $id)->first();
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.viewTrackFile', compact('track', 'count'));
        } else {
            return redirect()->route('userdashboard');
        }
    }

    public function viewtrackfilerequest(Request $request)
    {

        $this->validate($request, [
            'tracking_code' => 'required|numeric',
        ]);

        $code = $request['tracking_code'];
        $track = TrackFile::where('trackcode', $code)->first();
        if ($track == null) {
            $failed = "No File Found Against This Code.";
            return back()->with(['failed' => 'Aucun fichier trouvé contre ce code.']);
//            return view('mainsite.viewtrackfile',compact('failed'));

        } else {
            return view('mainsite.viewtrackfile', compact('track'));

        }
    }

    public function createassurance(Request $request)
    {
        $data = $request->all();

//        dd($request['credit_apply']['ibkr']);
        $validator = Validator::make($data, [
            'credit_apply' => 'required',
            'name' => 'required',
            'email' => 'required|string|email',
            'loan_type' => 'required',
            'loan_rate' => 'required',
            'taux_type' => 'required',
            'occupational_activity' => 'required',
            'professional_status' => 'required',
            'image' => 'max:2048|mimes:png,jpg,jpeg'
        ]);


        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

//        dd($data);

        $loan_type = "";
        $credit_apply = "";
        $path = "";

        if (isset($request['credit_apply']['cadifinance'])) {

            $credit_apply = $request['credit_apply']['cadifinance'];
        }
        if (isset($request['credit_apply']['ibkr'])) {

            $credit_apply = $credit_apply . ',' . $request['credit_apply']['ibkr'];
        }
        if (isset($request['credit_apply']['cbanque'])) {

            $credit_apply = $credit_apply . ',' . $request['credit_apply']['cbanque'];
        }

        if (isset($request['loan_type']['amortisable'])) {
            $loan_type = $request['loan_type']['amortisable'];
        }
        if (isset($request['loan_type']['infine'])) {
            $loan_type = $loan_type . ',' . $request['loan_type']['infine'];
        }

        if ($request->hasFile('image')) {

            $avatar = $request->file('image');


            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $destinationPath = 'uploads/assurances';

            $avatar->move($destinationPath, $filename);
            $path = '/uploads/assurances/' . $filename;

        }


        Assurance::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'dob' => $request['birthday'],
            'credit_apply' => $credit_apply,
            'id_passport_path' => $path,
            'loan_rate' => $request['loan_rate'],
            'loan_type' => $loan_type,
            'rate_type' => $request['taux_type'],
            'occupational_activity' => $request['occupational_activity'],
            'proffessional_status' => $request['professional_status'],
            'sendcopy' => $request['send_copy']

        ]);
        $email = $request['email'];
        $name = $request['name'];

        $data1 = array('name' => $request['name'], 'email' => $request['email'], 'dob' => $request['birthday'],
            'creditapply' => $credit_apply, 'image' => $path, 'loan_rate' => $request['loan_rate'], 'loan_type' => $loan_type,
            'rate_type' => $request['taux_type'], 'occupational_activity' => $request['occupational_activity'],
            'professional_status' => $request['professional_status'], 'sendcopy' => $request['send_copy']);
        $mailto = env('MAIL_TO');
        Mail::send('assurancemail', $data1, function ($message) use ($email, $name, $mailto) {
            $message->to($mailto)->subject('Demande d\'assurance');
        });


        $userid = Auth::user();

        $message = $name. " a demandé l'assurance";
        $notification = Notification::create([
            'message' => $message,
        ]);

        $users = User::where('account_type', 'Superadmin')->orwhere('account_type', 'Moderator 1')->orwhere('account_type', 'Moderator 2')->orwhere('account_type', 'Moderator 3')->get();
        foreach ($users as $user) {

            $user->notifications()->attach($notification->id, ['user_id' => $user->id, 'status' => 0]);
        }
        return back()->with(['success' => 'Soumis avec succès']);

    }


    public function indexassurances(){
        $user=Auth::user();
        if($user->account_type == "Superadmin") {

        $assurances=Assurance::orderBy('id', 'desc')->get();
            $count=DB::table('notification_user')->where('user_id', $user->id)->where('status',0)->count();

            return view('adminDashboard.indexAssurances',compact('assurances','count'));
        }
        else{
            return 'Not Authorized';
        }
    }

    public function deleteassurance($id){
        $user=Auth::user();
        if($user->account_type == "Superadmin"  ) {
        $assurance = Assurance::find($id);

        $assurance->delete();

        return back()->with(['success' => 'Supprimé avec succès']);
        }
//        elseif($user->account_type == "subadmin"){
//            return redirect()->route('indexusers');
//
//        }
        else{
            return 'Not Authorized';
        }
    }

    public function viewassurance($id){

//        dd($id);
        $user=Auth::user();
        if($user->account_type == "Superadmin") {
        $assurance=Assurance::where('id',$id)->first();
            $count=DB::table('notification_user')->where('user_id', $user->id)->where('status',0)->count();

            return view('adminDashboard.viewAssurance',compact('assurance','count'));
        }
        else{
            return 'Not Authorized';
        }

    }

    public function insertpivot(){


            $user=Auth::user();
        $message=$user->name." has applyed for credit";
        $notification= Notification::create([
            'message' => $message,
        ]);

        $users=User::where('account_type','Superadmin')->orwhere('account_type','Moderator 1')->orwhere('account_type','Moderator 2')->orwhere('account_type', 'Moderator 3')->get();
        foreach($users as $user){
            echo $user->id;echo "<br>";

            $user->notifications()->attach($notification->id, ['user_id' =>$user->id ,'status' => 0]);
        }
//        dd($users);

//        echo "sdsd";
    }

    public function updatepivot(){

        $users=User::where('id',7)->with('notifications')->first();
//        dd($users);
        foreach($users->notifications as $n){
            echo $n->message;
        }
        $user=Auth::user();
        DB::table('notification_user')
            ->where('user_id', 7)
            ->update(['status' => 1]);
    }

    public function viewnotifications(){
        $user=Auth::user();

        $notifications=$user->notifications()->latest()->paginate(5);
//        $users=User::where('id',$user->id)->with('notifications')->first();
//        $notifications=$users->notifications->paginate(5);
        DB::table('notification_user')
            ->where('user_id', $user->id)
            ->update(['status' => 1]);

        $count=DB::table('notification_user')->where('user_id', $user->id)->where('status',0)->count();

        return view('adminDashboard.notifications',compact('notifications','count'));
    }

    public function checknotification(){
        $user=Auth::user();
        $count=DB::table('notification_user')->where('user_id', $user->id)->where('status',0)->count();
        echo $count;
    }
    public function send_message(Request $request)
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin") {
            $user = Auth::user();
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.send_message', compact('count'));
        }
        else
            return 400;
    }
    public function send_message_twillio(Request $request)
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin") {

           

                   $phone=explode(",",$request->phone);
                 //  print_r($phone);
          foreach ($phone as $value) {

            try{
                $twilio = new Twilio('AC3dbd8fe4a5b2c716c98138102248d4bf', '3bd0978a4fa28adf94b5e5b057080823', +33644644587);
                $twilio->message($value, $request->msg);

                session(['success'=> 'envoyer avec succès']);
            } catch ( \Services_Twilio_RestException $e ) {
                  $msg= session('failed')."Message was not send to {$value}. please check the format <br />"; 
                session(['failed'=> $msg ]);

            }

             }



            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.send_message', compact('count'));
        }
        else
            return 400;
    }
    public function two_factor(Request $request)
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin" ) {
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();
            $f = TwoFactoe::find(1);
            return view('adminDashboard.two_factor', compact('count','f'));


        }
    }
    public function two_factor_change($id)
    {
        $user = Auth::user();
        if ($user->account_type == "Superadmin" ) {
            $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            $f = TwoFactoe::find(1);
             $f->status=$id;
             $f->save();
            session(['success'=> 'changer avec succès']);

            return redirect()->route('two_factor');


        }
    }
    public function trackuser($id){
         $user = Auth::user();
       $track = Trackuser::where('user_id', $id)->orderBy('id', 'desc')->get();
           $count = DB::table('notification_user')->where('user_id', $user->id)->where('status', 0)->count();

            return view('adminDashboard.trackuser', compact('track', 'count'));
        
    }
}

