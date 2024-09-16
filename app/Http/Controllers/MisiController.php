<?php

namespace App\Http\Controllers;

use App\Models\Misi;
use Illuminate\Http\Request;

class MisiController extends Controller
{ 
    public function index()
    {
        $misis = Misi::whereNull('deleted_at')->get();
        return view('admin.misi.index', compact('misis'));
    }

    public function create()
    {
        return view('admin.misi.create');
    }

    public function store(Request $request)
    {
         $request->validate([
            'text' => 'required|string',
        ]);

        try {
            
            // Simpan data Visi
            Misi::create($request->all());

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
        $misi = Misi::findOrFail($id);
        return view('admin.misi.edit', compact('misi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // 'title' => 'required|string|max:255',
            'text' => 'required|string',
        ]);

        $misi = Misi::findOrFail($id);
        $misi->update($request->all());
        return redirect()->route('visimisi_page')->with('success', 'Misi updated successfully.');
    }

    public function destroy($id)
    {
        $data = Misi::findOrFail($id);
        $data->update(['deleted_at' => now()]);
        return redirect()->route('misi.index')->with('success', 'Misi deleted successfully.');
    }
}
