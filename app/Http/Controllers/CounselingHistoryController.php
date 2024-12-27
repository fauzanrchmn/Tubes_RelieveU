<?php

namespace App\Http\Controllers;

use App\Models\CounselingHistory;
use App\Models\Appointment;
use Illuminate\Http\Request;

class CounselingHistoryController extends Controller
{
    public function index()
    {
        $histories = CounselingHistory::with('appointment')->get();
        return view('counseling_histories.index', compact('histories'));
    }

    public function create()
    {
        $appointments = Appointment::all(); // Untuk memilih janji yang sudah ada
        return view('counseling_histories.create', compact('appointments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'status' => 'required',
            'notes' => 'nullable',
        ]);

        CounselingHistory::create($request->all());
        return redirect()->route('counseling_histories.index');
    }

    public function edit(CounselingHistory $counselingHistory)
    {
        $appointments = Appointment::all();
        return view('counseling_histories.edit', compact('counselingHistory', 'appointments'));
    }

    public function update(Request $request, CounselingHistory $counselingHistory)
    {
        $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'status' => 'required',
            'notes' => 'nullable',
        ]);

        $counselingHistory->update($request->all());
        return redirect()->route('counseling_histories.index');
    }

    public function destroy(CounselingHistory $counselingHistory)
    {
        $counselingHistory->delete();
        return redirect()->route('counseling_histories.index');
    }
}
