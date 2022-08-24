<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\MemberType;
use App\Models\Notification\Email;
use App\Models\Notification\Push;
use App\Models\PreUser;
use App\Models\Service;
use App\Models\User;
use App\Repositories\MediaRepo;
use App\Repositories\NotificationRepo;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Email
    public function email(){
        $emails = Email::latest('id')->get();

        return view('back.notification.email', compact('emails'));
    }

    public function emailSend(){
        $services=Service::all();
        return view('back.notification.emailSend',compact('services'));
    }

    public function emailSendSubmit(Request $request){

        $request->validate([
            'customers' => 'exists:users,id',
            'status' => 'required',
            'subject' => 'required|max:255',
            'body' => 'required',
        ]);
        //dd($request->all());

        if($request->status == 'Selected User'){
            $users = User::whereIn('id',$request->customers)->where('email', '!=', null)->get();
        }else{
            if($request->status == 'all'){
                $users = User::where('email','!=',null)->get();
            }else{
                $service = Service::findOrFail($request->status);
                $user_ids = $service->userServices()->pluck('user_id');
                $users = User::whereIn('id',$user_ids)->get();
            }

        }
        $emails=[];
        foreach($users as $user){
            $emails[] =[
                'name'=>$user->first_name.' '.$user->last_name,
                'email'=>$user->email,
                'subject'=>$request->subject,
                'message'=>$request->body,
                'is_sent'=>0,
                'try'=>0,
                'created_at'=>now(),
                'updated_at'=>now(),
            ];
        }
        //Email::insert($emails);
        if (count($emails)){
            try {
                Email::insert($emails);
                return redirect()->back()->with('success-alert', 'Email send successfully.');
            }catch (\Exception $e){
                return redirect()->back()->with('error-alert', 'Something went wrong please try again.');
            }
        }else{
            return redirect()->back()->with('error-alert', 'No email fund for sent');
        }

        return redirect()->back()->with('success-alert', 'Email send successfully.');
    }

    public function emailShow(Email $email){
        return view('back.notification.emailShow', compact('email'));
    }

    public function push(){
        $pushes = Push::latest('id')->get();

        return view('back.notification.push', compact('pushes'));
    }
    public function pushSend(Request $request){
        $request->validate([
            'text' => 'required|max:255',
            'url' => 'max:255'
        ]);

        $push = new Push;
        $push->text = $request->text;
        $push->url = $request->url;

        if($request->file('image')){
            $uploaded_file = MediaRepo::upload($request->file('image'));
            $push->image = $uploaded_file['file_name'];
            $push->image_path = $uploaded_file['file_path'];
            $push->media_id = $uploaded_file['media_id'];
        }

        $push->save();

        if($push->image){
            $image = $push->img_paths['large'];
        }else{
            $image = null;
        }

        NotificationRepo::sendOneSignal($push->text, $push->url, $image);

        return redirect()->back()->with('success-alert', 'Push send successfully.');
    }

    public function selectList(Request $request){
        $search = $request->q;
        $users = User::where(function($q) use ($search){
            $q->where('first_name', 'LIKE', "%{$search}%")
            ->orWhere('last_name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%");
        })->get();

        // Output
        $output = array();
        foreach ($users as $user){
            $output[] = ['id' => $user->id, 'text' => ($user->full_name . '- ' . $user->email)];
        }

        return response()->json($output);
    }
}
