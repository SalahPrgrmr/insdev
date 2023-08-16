<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Http\Controllers\Controller;


class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();
        return response()->json($subscriptions);
    }

    /**
     * Store a newly created subscription in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'website_id' => 'required',
        ]);

        $subscription = Subscription::create($request->all());
        return response()->json($subscription, 201);
    }

    /**
     * Display the specified subscription.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subscription = Subscription::find($id);

        if (!$subscription) {
            return response()->json(['message' => 'Subscription not found'], 404);
        }

        return response()->json($subscription);
    }

    /**
     * Update the specified subscription in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'user_id' => 'required',
            'website_id' => 'required'
        ]);

        $subscription = Subscription::find($id);

        if (!$subscription) {
            return response()->json(['message' => 'Subscription not found'], 404);
        }

        $subscription->update($request->all());
        return response()->json($subscription);
    }

    /**
     * Remove the specified subscription from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscription = Subscription::find($id);

        if (!$subscription) {
            return response()->json(['message' => 'Subscription not found'], 404);
        }

        $subscription->delete();
        return response()->json(['message' => 'Subscription deleted']);
    }
}
