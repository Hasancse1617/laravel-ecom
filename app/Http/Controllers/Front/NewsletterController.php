<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NewsletterSubscriber;

class NewsletterController extends Controller
{
    public function addSubscribeEmail(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            $subscriber_count = NewsletterSubscriber::where('email',$data['subscribe_email'])->count();
            if ($subscriber_count > 0) {
                return response()->json([
                   'message'=>"exists"
                ]);
            }else {
                $subscriber = new NewsletterSubscriber;
                $subscriber->email = $data['subscribe_email'];
                $subscriber->status = 1;
                $subscriber->save();
                return response()->json([
                    'message' => "saved"
                ]);
            }
        }
    }
}
