<?php

namespace App\Http\Controllers;

use App\Models\CounselingHistory;
use App\Models\Doctor;
use Illuminate\Http\Request;

class CounselingHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data riwayat konseling beserta informasi dokter
        $counselingHistories = CounselingHistory::with('doctor')->get();

        // Kirim data ke view
        return view('counseling_histories.index', compact('counselingHistories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data dokter
        $doctors = Doctor::all();

        // Tampilkan form untuk menambah riwayat konseling
        return view('counseling_histories.create', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'status' => 'required|in:completed,pending,cancelled',
        ]);

        // Menyimpan riwayat konseling baru
        CounselingHistory::create($request->all());

        // Redirect ke halaman riwayat konseling
        return redirect()->route('counseling_histories.index')->with('success', 'Counseling history created successfully.');
    }
}
