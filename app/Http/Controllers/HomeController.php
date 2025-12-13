<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Statistic;
use App\Models\SettingPage;
use App\Models\Partner;
use App\Models\Galery;
use App\Models\Information;
use App\Models\Collection;

class HomeController extends Controller
{
    public function index(){

        //data
        $sliders = Slider::orderBy('order', 'asc')->get();
        $statistics = Statistic::all();
        $partners = Partner::all();
        $galeries = Galery::orderBy('created_at', 'desc')->limit(8)->get();
        $informations = Information::where('view_on_front', 1)->orderBy('created_at', 'desc')->get();
        $collections = Collection::active()->ordered()->limit(10)->get();

        // config title
        $setting_page = SettingPage::select(
                'title_statistic', 'subtitle_statistic', 'title_gallery', 'subtitle_gallery',
                'title_info', 'subtitle_info', 'title_collection', 'subtitle_collection',
                'banner'
            )->first();

        return view('index', compact('sliders', 'statistics', 'setting_page', 'partners', 'galeries','informations', 'collections'));
    }

    public function contactIndex(){
        return view('pages.contact');
    }

    public function collectionsIndex(Request $request){
        $query = Collection::active()->ordered();
        
        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where('title', 'like', '%' . $searchTerm . '%');
        }
        
        $collections = $query->get();
        $searchTerm = $request->get('search', '');
        
        return view('pages.collections', compact('collections', 'searchTerm'));
    }

    public function informationsIndex(Request $request){
        $query = Information::with('category');
        
        // Search functionality
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('overview', 'like', '%' . $searchTerm . '%');
        }
        
        $informations = $query->orderBy('created_at', 'desc')->get();
        $searchTerm = $request->get('search', '');
        
        return view('pages.informations', compact('informations', 'searchTerm'));
    }

    public function informationDetail($id){
        $information = Information::with('category')->findOrFail($id);
        $otherInformations = Information::with('category')
            ->where('id', '!=', $id)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        
        return view('pages.information-detail', compact('information', 'otherInformations'));
    }
}
