<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdminMyInfoController extends Controller
{

    public function index()
    {

        $user = Auth::user();

        if ($user->role->id !== 1) {
            return redirect()->route('401');
        }

        return Inertia::render('Admin/MyInfo');
    }
}
