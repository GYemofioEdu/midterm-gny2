<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    //Using a dedicated controller only because the test has two requests for controllers
    //Otherwise, one PageController for all pages would suffice
    function contact() { return view('pages.contact');}

    function proc_contact_msg(Request $request) {
        $contact_msg = $request->email;
        return redirect()->route('display_contact_msg',['contact_msg' => $contact_msg ]);
    }

    function display_contact_msg($contact_msg, Request $request) {
        //dd($request);
        return view('pages.display_contact_msg')->with(compact('contact_msg'));
    }

}
