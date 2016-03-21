<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class ContactController extends Controller{
    public function hire_me(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|max:50',
            'phone' => 'numeric|max:50',
            'budget' => 'required|max:15',
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

            //Show a thanks message

            return redirect('/');
        }

    }
}