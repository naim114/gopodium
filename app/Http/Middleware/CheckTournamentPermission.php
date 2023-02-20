<?php

namespace App\Http\Middleware;

use App\Models\Tournament;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckTournamentPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {

            $id = $request->tournament_id ?? $request->id;

            $tourney = Tournament::where('id', $id)->first();

            // allow if user is owner or have permission
            if ($tourney->owner_id == Auth::user()->id || has_permission('tournament.all')) {
                return $next($request);
            } else {
                abort(403, "Forbidden");
            }
        } catch (\Throwable $th) {
            abort(403, "Forbidden");
        }
    }
}