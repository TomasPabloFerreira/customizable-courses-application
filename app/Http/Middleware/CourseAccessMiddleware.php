<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\CourseAcquisition;

class CourseAccessMiddleware
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$param = $request->route('courseId');
		$courseId = $param ? $param : $request->route('id');
		$userId = Auth::id();

		if (!$courseId || !$userId) {
			return redirect('home');
		}

		$hasAccess = CourseAcquisition::where('user_id', $userId)
			->where('course_id', $courseId)
			->first() != null;

		if (!$hasAccess) {
			return redirect('home');
		}

		return $next($request);
	}
}
