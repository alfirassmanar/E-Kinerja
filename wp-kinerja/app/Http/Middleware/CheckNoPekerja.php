<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckNoPekerja
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $inputNoPekerja = $request->input('no_pekerja');
        $loggedInUserNoPekerja = Auth::user()->no_pekerja;

        if ($inputNoPekerja != $loggedInUserNoPekerja) {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk memasukkan nomor pekerja lain.');
        }

        return $next($request);
    }
}
