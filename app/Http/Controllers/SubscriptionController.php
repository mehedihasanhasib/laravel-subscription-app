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
            'intent' => $request->user()->createSetupIntent(),
            'slug' => $request->plan
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required',
            'slug' => 'required'
        ]);

        $plan = Plan::where('slug', $request->slug)->get()->first();

        $request->user()->newSubscription('default', $plan->stripe_id)
            ->create($request->payment_method);

        return back();
    }
}
