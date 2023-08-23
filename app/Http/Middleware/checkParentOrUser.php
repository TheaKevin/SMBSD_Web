<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class checkParentOrUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Get the requested user's ID from the URL parameter
        $requestedUserID = $request->route('id');

        // Retrieve the requested user's data
        $requestedUser = User::find($requestedUserID);

        // Check if the authenticated user is not the parent or not the user themselves
        if (($user->role === 'parent' && $requestedUser->parent_id != $user->id) || ($user->id != $request->route('id') && $user->role === 'member')) {
            return redirect()->route('home', ['unauthorize']);
        }

        return $next($request);
    }
}
