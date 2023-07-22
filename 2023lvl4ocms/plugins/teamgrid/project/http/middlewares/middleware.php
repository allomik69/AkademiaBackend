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
        return $next($request);
    }

}