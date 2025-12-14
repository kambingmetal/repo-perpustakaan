<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\ProfileCompany;

class HomeProfileController extends Controller
{
    public function index(){
        return view('pages.profile.index');
    }

    public function sejarahIndex(){
        $histories = History::active()->ordered()->get();
        return view('pages.profile.sejarah', compact('histories'));
    }

    public function teamIndex() {
        return view('pages.profile.tim');
    }

    public function visiMisiIndex() {
        return view('pages.profile.visi-misi');
    }

    public function strukturIndex() {
        $profileCompany = ProfileCompany::getInstance();
        return view('pages.profile.struktur', compact('profileCompany'));
    }
}
