<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\DoctorAppointment;
use App\Models\CounselingHistory;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil jumlah total dokter, janji dokter, dan riwayat konseling
        $totalDoctors = Doctor::count();
        $totalAppointments = DoctorAppointment::count();
        $totalCounselingHistories = CounselingHistory::count();

        // Mengambil riwayat konseling terbaru (misal: 5 terakhir)
        $recentCounselingHistories = CounselingHistory::with('doctor')
            ->latest()
            ->take(5)
            ->get();

        // Mengirimkan data ke view
        return view('dashboard', [
            'totalDoctors' => $totalDoctors,
            'totalAppointments' => $totalAppointments,
            'totalCounselingHistories' => $totalCounselingHistories,
            'recentCounselingHistories' => $recentCounselingHistories
        ]);
    }
}
