<?php

namespace App\Http\Controllers;

use App\CreditApplication;
use Illuminate\Http\Request;
use Auth;
use App\Notification;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Formconf;
class creditApplicationController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth',['except' => ['create']]);
    }

    public function create(Request $request){
        $d=$request->all();

        if ($request['type']==0)
        {
        $this->validate($request, [
         'name' => 'required',
         'email' => 'required|string|email|max:255',
         'country' => 'required|string',
         'address' => 'required',
         'loan' => 'required|numeric',
         'phone' => 'required|numeric',
         'message' => 'required',
     ]);
 }
         CreditApplication::create([
            'name' => $request['name'],
            'email' => $request['email'],

            'address'=> $request['address'],
            'country' => $request['country'],
            'phone' => $request['phone'],
            'message'=> $request['message'],
            'amount' => $request['loan'],
            'type' => $request['type']

        ]);

        $d=Formconf::where('type',$request['type'])->get();



        $name=$request['name'];
        $data1 = array('name'=>$name,'email' => $request['email'], 'address' => $request['address'], 'country' => $request['country'],
            'phone' => $request['phone'], 'amount'=> $request['loan'],'messag'=>$request['message']);
      
$cats = explode(",", $d[0]->email);
foreach($cats as $cat) {
      $mailto = trim($cat);
       Mail::send('creditapplyemail', $data1, function ($message) use ($name,$mailto) {
            $message->to($mailto)->subject
            ('Demande de crédit');
        });

}
       

        $message=$name." vous a contacté.";
        $notification= Notification::create([
            'message' => $message,
        ]);

        $users=User::where('account_type','Superadmin')->orwhere('account_type','Moderator 1')->orwhere('account_type','Moderator 2')->orwhere('account_type','Moderator 3')->get();
        foreach($users as $user){

            $user->notifications()->attach($notification->id, ['user_id' =>$user->id ,'status' => 0]);
        }
        if($request['type']==1){
            return back()->with(['success' => 'Message successfully send ']);

        }
        else  if($request['type']==2){
            return back()->with(['success' => 'Mensaje enviado exitosamente ']);

        }
        else  if($request['type']==3){
            return back()->with(['success' => 'Messaggio inviato con successo ']);

        }
        else  if($request['type']==4){
            return back()->with(['success' => 'Nachricht erfolgreich gesendet ']);

        }
        else  if($request['type']==5){
            return back()->with(['success' => 'Viesti lähetettiin onnistuneesti ']);

        }
        else{


        return back()->with(['success' => 'Envoyer avec succès']);
    }

       }

    public function index(){

        $user=Auth::user();
        if($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3"){
            $applications=CreditApplication::orderBy('id', 'desc')->get();
            $count=DB::table('notification_user')->where('user_id', $user->id)->where('status',0)->count();

            return view('adminDashboard.indexcreditapplication',compact('applications','count'));
        }else{
            return redirect()->route('userdashboard');
        }

    }

    public function Configure(){

        $user=Auth::user();
        if($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3"){
            $applications=CreditApplication::orderBy('id', 'desc')->get();
            $count=DB::table('notification_user')->where('user_id', $user->id)->where('status',0)->count();
            $data=Formconf::get();

            return view('adminDashboard.configure',compact('applications','count','data'));
        }else{
            return redirect()->route('userdashboard');
        }

    }
    public function configureemail(Request $request){
        Formconf::truncate();
        $data=new Formconf();
        $data->type=0;
        $data->email=$request->French;
        $data->save();

        $data=new Formconf();
        $data->type=1;
        $data->email=$request->English;
        $data->save();


        $data=new Formconf();
        $data->type=2;
        $data->email=$request->Spanish;
        $data->save();


        $data=new Formconf();
        $data->type=3;
        $data->email=$request->Italian;
        $data->save();


        $data=new Formconf();
        $data->type=4;
        $data->email=$request->German;
        $data->save();

        $data=new Formconf();
        $data->type=5;
        $data->email=$request->Finland;
        $data->save();

        return back()->with(['success' => 'Supprimé avec succès']);

    }
    public  function delete($id){

        $user=Auth::user();
        if($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3"){
        $delid=$id;

        $application = CreditApplication::find($delid);

        $application->delete();

        return back()->with(['success' => 'Supprimé avec succès']);
        }else{
            return redirect()->route('userdashboard');
        }
    }

    public function edit($id){
        $user=Auth::user();
        if($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
            $application_id = $id;
            $application = CreditApplication::where('id', $application_id)->first();
            $count=DB::table('notification_user')->where('user_id', $user->id)->where('status',0)->count();

            return view('adminDashboard.editcreditapplication', compact('application','count'));
        }
        else{
                return redirect()->route('userdashboard');
            }

    }

    public function update(Request $request){
        $user=Auth::user();
        if($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string|email|max:255',
            'country' => 'required|string',
            'address' => 'required',
            'loan' => 'required|numeric',
            'phone' => 'required|numeric',
            'message' => 'required',
        ]);

        CreditApplication::where('id', $request['application_id'])
            ->update([
                'name' => $request['name'],
                'email' => $request['email'],

                'address'=> $request['address'],
                'country' => $request['country'],
                'phone' => $request['phone'],
                'message'=> $request['message'],
                'amount' => $request['loan'],
            ]);

        return redirect()->route('indexcreditapplication')->with(['success' => 'Mise à jour réussie']);
        }
        else{
            return redirect()->route('userdashboard');
        }
    }


    public function view($id){
        $user=Auth::user();
        if($user->account_type == "Superadmin" || $user->account_type == "Moderator 1" || $user->account_type == "Moderator 2" || $user->account_type == "Moderator 3") {
        $application=CreditApplication::where('id',$id)->first();
        return view('adminDashboard.viewcreditapplication',compact('application'));
        }
        else{
            return redirect()->route('userdashboard');
        }
    }
}
