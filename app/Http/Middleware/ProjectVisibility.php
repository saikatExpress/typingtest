<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Setting;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjectVisibility
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $project = Setting::latest()->first();

        if (!$project) {
            abort(404, 'Project not found.');
        }

        if ($project->visibility === 'private') {
            abort(403, 'Access denied. This project is now on private mode.');
        }

        return $next($request);
    }
}