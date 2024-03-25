<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        return View('checkout', [
            'intent' => $request->user()->createSetupIntent() 
        ]);   
    }
}
