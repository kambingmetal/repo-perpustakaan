<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;
use App\Models\ServiceHour;
use App\Models\ServiceType;

class HomeLayananController extends Controller
{
    public function jamLayananIndex()
    {
        $serviceHours = ServiceHour::orderBy('day', 'asc')->get();
        return view('pages.layanan.jam-layanan', compact('serviceHours'));
    }

    public function jenisLayananIndex()
    {
        $serviceTypes = ServiceType::orderBy('created_at', 'asc')->get();
        return view('pages.layanan.jenis-layanan', compact('serviceTypes'));
    }

    public function fasilitasIndex()
    {
        $facility = Facility::orderBy('created_at', 'asc')->get();
        return view('pages.layanan.fasilitas', compact('facility'));
    }
}
