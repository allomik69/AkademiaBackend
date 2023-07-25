<?php
 
namespace Teamgrid\Timeentry\Http\Middlewares;

use Teamgrid\Timeentry\Models\Timeentry; 
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class TimeEntryMiddleware 
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        $id = $user->id;
        $timeentry = Timeentry::where('id', $request->route('key'))->firstOrFail();
        if ( $id !== $timeentry->user_id) 
        {
            return response("You are not allowed to access this time entry ", 403);
        }
        return $next($request);
    }
}