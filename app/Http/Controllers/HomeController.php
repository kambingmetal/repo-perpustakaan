<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Statistic;
use App\Models\SettingPage;
use App\Models\Partner;
use App\Models\Galery;
use App\Models\Information;
use App\Models\ProfileCompany;

class HomeController extends Controller
{
    public function index(){

        //data
        $sliders = Slider::orderBy('order', 'asc')->get();
        $profile = ProfileCompany::first();
        $statistics = Statistic::all();
        $partners = Partner::all();
        $galeries = Galery::orderBy('created_at', 'desc')->limit(8)->get();
        $informations = Information::where('view_on_front', 1)->orderBy('created_at', 'desc')->get();

        // config title
        $setting_page = SettingPage::select(
                'title_statistic', 'subtitle_statistic', 'title_gallery', 'subtitle_gallery',
                'title_info', 'subtitle_info', 'title_collection', 'subtitle_collection',
                'banner'
            )->first();

        return view('index', compact('sliders', 'profile', 'statistics', 'setting_page', 'partners', 'galeries','informations'));
    }
}
