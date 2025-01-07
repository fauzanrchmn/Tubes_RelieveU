<?php

namespace App\Http\Controllers;

use App\Models\CounselingHistory;
use Illuminate\Http\Request;
use App\Models\Doctor;

class CounselingHistoryController extends Controller
{
    public function index()
    {
        // Ambil data riwayat konseling beserta informasi dokter
        // $doctors = Doctor::all();
        $counselingHistories = CounselingHistory::with('doctor')->get();

        // Kirim data ke view
        return view('counseling_histories.index', compact('counselingHistories'));
    }

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
        // dd($request);

        // Menyimpan riwayat konseling baru
        CounselingHistory::create($request->all());

        // Redirect ke halaman riwayat konseling
        return redirect()->route('counseling_histories.index')->with('success', 'Counseling history created successfully.');
    }
            /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil data riwayat konseling berdasarkan ID
        $counselingHistory = CounselingHistory::findOrFail($id);

        // Ambil data dokter
        $doctors = Doctor::all();

        // Tampilkan form edit dengan data yang ada
        return view('counseling_histories.edit', compact('counselingHistory', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'status' => 'required|in:completed,pending,cancelled',
        ]);

        // Update data riwayat konseling
        $counselingHistory = CounselingHistory::findOrFail($id);
        $counselingHistory->update($request->all());

        // Redirect ke halaman riwayat konseling
        return redirect()->route('counseling_histories.index')->with('success', 'Counseling history updated successfully.');
    }

}
