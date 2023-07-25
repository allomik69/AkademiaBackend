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
        $id = $user->id;
        $task = Task::where('id', $request->route('key'))->firstOrFail();
        if ( $id !== $task->user_id) 
        {
            return response("You are not allowed to access this task ", 403);
        }
        return $next($request);
    }
}