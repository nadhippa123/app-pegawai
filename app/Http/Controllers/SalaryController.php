<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('employee')->latest()->paginate(10);
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:10',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'nullable|numeric',
            'potongan' => 'nullable|numeric',
        ]);

        $total_gaji = $request->gaji_pokok + $request->tunjangan - $request->potongan;

        Salary::create([
            'employee_id' => $request->employee_id,
            'bulan' => $request->bulan,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan ?? 0,
            'potongan' => $request->potongan ?? 0,
            'total_gaji' => $total_gaji,
        ]);

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil ditambahkan!');
    }

    public function edit(Salary $salary)
    {
        $employees = Employee::all();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:10',
            'gaji_pokok' => 'required|numeric',
            'tunjangan' => 'nullable|numeric',
            'potongan' => 'nullable|numeric',
        ]);

        $total_gaji = $request->gaji_pokok + $request->tunjangan - $request->potongan;

        $salary->update([
            'employee_id' => $request->employee_id,
            'bulan' => $request->bulan,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan ?? 0,
            'potongan' => $request->potongan ?? 0,
            'total_gaji' => $total_gaji,
        ]);

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil diperbarui!');
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil dihapus!');
    }
}
