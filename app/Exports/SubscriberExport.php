<?php

namespace App\Exports;

use App\NewsletterSubscriber;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubscriberExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $subscriberData = NewsletterSubscriber::select('id','email','created_at')->where('status',1)->orderBy('id','desc')->get();
        return $subscriberData;
    }
}
