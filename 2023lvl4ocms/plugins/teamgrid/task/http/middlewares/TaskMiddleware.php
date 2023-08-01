<?php
 
namespace Teamgrid\Task\Http\Middlewares;

use Teamgrid\Task\Models\Task; 
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class TaskMiddleware 
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        $name = $user->name;
        $task = Task::where('id', $request->route('key'))->firstOrFail();
        if ( $name !== $task->user_name) 
        {
            return response("You are not allowed to access this task ", 403);
        }
        return $next($request);
    }
}