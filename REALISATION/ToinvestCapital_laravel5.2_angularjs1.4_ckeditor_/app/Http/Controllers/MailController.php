<?php
namespace ToInvestCapital\Http\Controllers;


use Illuminate\Http\Request;
use Mail;

use ToInvestCapital\Http\Requests;


class MailController extends Controller
{
    public function index() {

        return view('contacts');
    }
    public function sendEmailReminder(Request $request) {

        $user = User::findOrFail($id);

        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
    }

    public function sendSimpleEmailReminder(Request $request) {

        $userContact = $request->input('contact');
        $code = $request->input('CaptchaCode');

           $isHuman = captcha_validate($code);

           if ($isHuman) {
             if (!empty($userContact['email']) && !empty($userContact['message'])) {
                 //dd($userContact);
                 $address = $userContact['email'];
                 $name = empty($userContact['name']) ? 'the Visitor' : $userContact['name'];
                 Mail::raw($userContact['message'], function ($message) {
                     //
                     $subject = "Message from ToInvestCapital.com' guest";
                     $adressTo = "toinvestcapital@gmail.com";
                     $message->from($address, $name);
                     $message->sender($address, $name);
                     $message->to($addressTo, $name);
                     //$message->cc($address, $name = null);
                     //$message->bcc($address, $name = null);
                     //$message->replyTo($address, $name = null);
                     $message->subject($subject);
                     //$message->priority($level);
                 });
             } else {
                 $error = array(
                     'type' => 'error', 'message' => 'the given informations a not corrects, please check it',
                 );
                 return redirect()->back()->with(compact('error'));
             }
           } else {
             session('error', 'You code is not correct');
           }
           return redirect()->back();
    }
}
