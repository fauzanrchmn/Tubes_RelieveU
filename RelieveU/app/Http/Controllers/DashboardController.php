<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorAppointment;
use App\Models\CounselingHistory;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDoctors = Doctor::count();
        $totalAppointments = DoctorAppointment::count();
        $totalCounselingHistories = CounselingHistory::count();
        
        // Mendapatkan riwayat konseling terbaru
        $recentCounselingHistories = CounselingHistory::with('doctor')->latest()->take(5)->get();
        
        return view('dashboard', compact(
            'totalDoctors', 
            'totalAppointments', 
            'totalCounselingHistories', 
            'recentCounselingHistories'
        ));
    }
}
