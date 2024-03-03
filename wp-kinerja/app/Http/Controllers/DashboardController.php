<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use App\Models\Post;

class DashboardController extends Controller
{
    public function dashboard(){
        $data = array (
            'title' => 'Halaman Dashboard'
        );
        return view('dashboard', $data);
       }
}
