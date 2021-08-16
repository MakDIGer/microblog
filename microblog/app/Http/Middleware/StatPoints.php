<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Post;

class StatPoints
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $request['stats'] = [
            'posts_num' => Post::All()->count(),
            'last_date_post' => Post::orderByDesc('id')->firstOrFail()->created_at
        ];

        return $next($request);
    }
}
