<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Http\Request;
use Auth;
 
class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->User_type != "a"){
            /* 
            silahkan modifikasi pada bagian ini
            apa yang ingin kamu lakukan jika rolenya tidak sesuai
            */
            Auth::logout();
            return redirect('/adminLogin')->with('status','maaf anda bukan admin');
        }
        return $next($request);
    }
}