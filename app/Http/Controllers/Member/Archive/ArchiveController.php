<?php

namespace App\Http\Controllers\Member\Archive;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function index()
    {
        return view('member.archive.archive');
    }
}
