<?php
 
namespace Teamgrid\Timeentry\Http\Middlewares;

use Teamgrid\Timeentry\Models\TimeEntry; 
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class TimeEntryMiddleware 
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        $name = $user->name;
        $timeentry = TimeEntry::where('id', $request->route('key'))->firstOrFail();
        if (  $name !== $timeentry->user_name) 
        {
            return response("You are not allowed to access this time entry ", 403);
        }
        return $next($request);
    }
}