<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Validator;

class ContactController extends Controller{
    public function hire_me(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|max:50',
            'phone' => 'max:25',
            'budget' => 'required|max:50',
            'name' => 'required|max:35',
            'message' => 'max:3000|required',
            'scope' => 'max:10|required|string',
            'website' => 'url|max:255'
        ]);

        if($validator->fails()){
            $request->session()->flash('status', 'Ooops!! Lets try this again.');

            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }
        else{
            //Send an email
            $payload = [
                'email_message' => $request->message,
                'budget' => $request->budget,
                'phone' => $request->phone,
                'name' => $request->name,
                'website' => $request->website,
                'scope' => $request->scope
            ];

            $recipient = env('CONTACT_EMAIL');

            Mail::send('emails.contact', $payload, function ($m) use ($recipient,$request) {
                $m->from($request->email, $request->name);

                $m->to($recipient, 'Bernard Nandwa')->subject('Hire Me Enquiry');
            });

            //Show a thanks message

            return redirect('/');
        }

    }
}