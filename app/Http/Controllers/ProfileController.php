<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function index() {
        $user = User::with(['profile'])->where('id', '=', Auth::user()->id)->get()->first();
        return view('profiles.index')
            ->with(['user' => $user]);
    }
}
