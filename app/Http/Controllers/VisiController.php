<?php

namespace App\Http\Controllers;

use App\Models\Visi;
use Illuminate\Http\Request;

class VisiController extends Controller
{
    public function index()
    {
        $visis = Visi::whereNull('deleted_at')->get();
        return view('admin.visi.index', compact('visis'));
    }

    public function create()
    {
        return view('admin.visi.create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'text' => 'required|string',
        ]);

        try {
            
            // Simpan data Visi
            Visi::create($request->all());

            // Redirect dengan pesan sukses
            
            return redirect()->route('visimisi_page')->with('success', 'Visi created successfully.');
        } catch (\Exception $e) {
            dd($e);
            // Log exception message
            \Log::error('Failed to create Visi: ' . $e->getMessage());

            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Failed to create Visi. Please try again.');
        }
    }

    public function edit($id)
    {
        $visi = Visi::findOrFail($id);
        return view('admin.visi.edit', compact('visi'));
    }

    public function update(Request $request, $id)
    {   
        // dd($request->all());
        $request->validate([
            // 'title' => 'required|string|max:255',
            'text' => 'required|string',
        ]);

        $visi = Visi::findOrFail($id);
        $visi->update($request->all());
        return redirect()->route('visimisi_page')->with('success', 'Visi updated successfully.');
    }

    public function destroy($id)
    {
        $data = Visi::findOrFail($id);
        $data->update(['deleted_at' => now()]);
        return redirect()->route('visi.index')->with('success', 'Visi deleted successfully.');
    }
}
