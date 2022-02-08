<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Auth;
 
class OrganizerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $guard = Arr::get($exception->guards(), 0);

        if($guard != 'organizer'){
            /* 
            silahkan modifikasi pada bagian ini
            apa yang ingin kamu lakukan jika rolenya tidak sesuai
            */
            Auth::guard('organizer')->logout();
            return redirect('/orgLogin')->with('status','maaf anda bukan organizer');
        }
        return $next($request);
    }
}