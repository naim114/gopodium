<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Providers\UserActivityEvent;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();

        $count = 1;

        return view('plan.index', compact('plans', 'count'));
    }

    public function add(Request $request)
    {
        $plan = Plan::create([
            'name' => $request->name,
            'price' => intval($request->price * 100),
            'team_limit' => $request->team_limit,
            'athlete_limit' => $request->athlete_limit,
            'event_limit' => $request->event_limit,
            'invite' =>  $request->invite == "on" ? true : false,
            'personalization' =>  $request->personalization == "on" ? true : false,
        ]);

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Add plan ID:' . $plan->id));

        return back()->with('success', 'Plan successfully added!');
    }

    public function edit(Request $request)
    {
        // updating role in db
        Plan::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'price' => intval($request->price * 100),
                'team_limit' => $request->team_limit,
                'athlete_limit' => $request->athlete_limit,
                'event_limit' => $request->event_limit,
                'invite' =>  $request->invite == "on" ? true : false,
                'personalization' =>  $request->personalization == "on" ? true : false,
            ]);

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Edit plan ' . $request->name . ' (id: ' . $request->id . ')'));

        return back()->with(
            'success',
            'Plan ' . $request->name . ' successfully edited!'
        );
    }

    public function delete(Request $request)
    {
        $plan = Plan::where('id', $request->id)
            ->first();

        // soft delete in db
        Plan::where('id', $request->id)
            ->delete();

        // user activity log
        event(new UserActivityEvent(Auth::user(), $request, 'Delete plan ' . $plan->name . ' (id: ' . $plan->id . ')'));

        return back()->with('success', 'Plan ' .  $plan->name . ' has been successfully deleted');
    }
}