<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\subscriberMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Alert;
class MailController extends Controller
{
    public function index()
    {
        $mails = Mail::paginate(10);
        return view('admin.mail.list', compact('mails'));
    }

    public function getSendMail()
    {
        return view('admin.mail.mail');
    }

    public function PostSendMail(Request $req)
    {

        $mail_content = $req->mail;
        dd($mail_content);
        $details = [
            'title' => 'Email from Pursellet'
            ,'body' => $mail_content
        ];

        $subscriber = DB::table('subscriber')
        ->get('email');

        foreach($subscriber as $item){
            Mail::to($item->email)->send(new subscriberMail($details));
        };

        Alert::success('sending mails successfully');
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $data = $request->search;
        $mails = DB::table('subscribe')
            ->where('email', 'like', '%' . $data . '%')
            ->paginate(10);

        if(!count($mails)){
            $error = 'No Result';
            return view('admin.mail.list', compact('error'));
        }
        return view('admin.mail.list', compact('mails'));
    }
}
