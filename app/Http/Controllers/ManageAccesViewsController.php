<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class manageAccesViewsController extends Controller
{
    //block all view exept allowed.blad, other pages must be login

    public function __construct()
    {
        $this->middleware('auth')->except('allowedView');
    }

    public function allowedView()
    {
        return view('pages.allowed');
    }

    public function blockedView()
    {
        if (! Gate::allows('access-admin')) {
            abort(403);
        }

        return view('pages.blocked');
    }

}
