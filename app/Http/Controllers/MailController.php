<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {
    public function basic_email(){
        //$data = array('name'=>"Email Body");

        $data = [];
        $data['name'] = 'Kistlak In Email Body';
        $data['email'] = 'KistlakAll@emailbody.com';
        $data['status'] = 'Active';

        Mail::send(['html'=>'mail'], $data, function($message) {
            $message->to('kistsinga@gmail.com', 'Kist Ami Receiver')->subject
            ('Laravel Basic Testing Mail');
            $message->from('kistlakall@gmail.com','Kistlak Sender');
        });
        echo "Basic Email Sent. Check your inbox.";
        return redirect('www.google.lk');
    }
    public function html_email(){
        $data = array('name'=>"Email Body");
        Mail::send('mail', $data, function($message) {
            $message->to('kistsinga@gmail.com', 'Kist Ami Receiver')->subject
            ('Laravel HTML Testing Mail');
            $message->from('kistlakall@gmail.com','Kistlak Sender');
        });
        echo "HTML Email Sent. Check your inbox.";
    }
    public function attachment_email(){
        $data = array('name'=>"Virat Gandhi");
        Mail::send('mail', $data, function($message) {
            $message->to('kistsinga@gmail.com', 'Kist Ami Receiver')->subject
            ('Laravel Testing Mail with Attachment');
            $message->from('kistlakall@gmail.com','Kistlak Sender');
        });
        echo "Email Sent with attachment. Check your inbox.";
    }
}