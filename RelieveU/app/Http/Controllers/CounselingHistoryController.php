<?php

namespace App\Http\Controllers;

use App\Models\CounselingHistory;
use App\Http\Requests\StoreCounselingHistoryRequest;
use App\Http\Requests\UpdateCounselingHistoryRequest;

class CounselingHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data riwayat konseling
        $counselingHistories = CounselingHistory::with(['doctor', 'hospital'])->get();

        // Kirim data ke view
        return view('counseling_histories.index', compact('counselingHistories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data dokter dan rumah sakit
        $doctors = Doctor::all();
        $hospitals = Hospital::all();

        // Tampilkan form untuk menambah riwayat konseling
        return view('counseling_histories.create', compact('doctors', 'hospitals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'hospital_id' => 'required|exists:hospitals,id',
            'appointment_date' => 'required|date',
            'status' => 'required|in:completed,pending,cancelled',
        ]);

        // Menyimpan riwayat konseling baru
        CounselingHistory::create($request->all());

        // Redirect ke halaman riwayat konseling
        return redirect()->route('counseling_histories.index')->with('success', 'Counseling history created successfully.');
    }
}
