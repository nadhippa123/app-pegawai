<?php

namespace App\Http\Controllers;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::with('employee')->latest()->get();
        $employees= Employee::all();
        return view('attendances.index', compact('attendances', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees= Employee::all();
        return view('attendances.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id'       => 'required|exists:employees,id',
            'tanggal'           => 'required|date',
            'status_absensi'    => 'required|in:hadir,izin,sakit,alpha',
            'waktu_masuk'       => 'nullable',
            'waktu_keluar'      => 'nullable',
        ]);

        Attendance::create([
            'employee_id'       => $request->employee_id,
            'tanggal'           => $request->tanggal,
            'status_absensi'    => $request->status_absensi,
            'waktu_masuk'       => $request->waktu_masuk,
            'waktu_keluar'      => $request->waktu_keluar,
        ]);

        return redirect()->route('attendances.index')->with('success', 'Absensi berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $attendance = Attendance::with('employee')->findOrFail($id);
    return view('attendances.show', compact('attendance'));
}

    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employee::all();
        return view('attendances.edit', compact('attendance', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id'       => 'required|exists:employees,id',
            'tanggal'           => 'required|date',
            'status_absensi'    => 'required|in:hadir,izin,sakit,alpha',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->all());

        return redirect()->route('attendances.index')
            ->with('success', 'Data attendance berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attendance = Attendance::find($id);
        $attendance->delete();
        return redirect()->route('attendances.index')
            ->with('success', 'Data pegawai berhasil dihapus!');
    }
}
