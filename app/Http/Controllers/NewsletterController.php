<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Newsletter;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter){
        request()->validate(['email' => 'required|email']);

        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            return redirect('/')->with('failed', 'We could not add your email to our newsletter');
        };

        return redirect('/')->with('success', 'You are now signed up for our newsletter');
    }
}
