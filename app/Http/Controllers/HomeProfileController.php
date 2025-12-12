<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HomeProfileController extends Controller
{
    public function sejarahIndex(){
        $histories = History::active()->ordered()->get();
        return view('pages.profile.sejarah', compact('histories'));
    }
}
