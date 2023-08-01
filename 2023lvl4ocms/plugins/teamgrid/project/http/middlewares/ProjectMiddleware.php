<?php
 
namespace Teamgrid\Project\Http\Middlewares;

use Teamgrid\Project\Models\Project; 
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class ProjectMiddleware 
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        $id = $user->name;
        $project = Project::where('id', $request->route('key'))->firstOrFail();
        if ( $id != $project->project_manager_name) 
        {
            return response("You are not a member of the project", 403);
        }
        return $next($request);
    }
}