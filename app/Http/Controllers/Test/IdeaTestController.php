<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IdeaTestController extends Controller
{
    public function index(Request $request)
    {
        return view('test.idea.index');
    }
}
