<?php

namespace App\Http\Controllers;

use App\Models\Kontent;
use Illuminate\Http\Request;

class KontentController extends Controller
{
    public function create()
    {   
        $kontents = Kontent::whereNull('deleted_at')->paginate(5);
       $data = [
            'content' => 'admin/kontent/index',
            'kontents' => $kontents,
        ];
        return view('admin.layouts.wrapper',$data);  // Ganti dengan nama tampilan Anda
    }

    public function store(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Membuat objek Kontent baru
            $item = new Kontent();
            $item->title = $request->input('title');
            $item->description = $request->input('description');

            // Menyimpan gambar jika ada
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $item->image = $imagePath;
            }

            // Menyimpan objek Kontent ke database
            $item->save();

            // Redirect dengan pesan sukses
            return redirect()->route('kontent.create')->with('success', 'Kontent created successfully.');
        } catch (\Exception $e) {
            // Jika terjadi pengecualian, redirect dengan pesan error
            return redirect()->route('kontent.create')->with('error', 'Failed to create Kontent: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        
        $kontents = Kontent::findOrFail($id);
        $data = [
            'content' => 'admin/kontent/edit',
            'kontents' => $kontents,
        ];
        return view('admin.layouts.wrapper', $data);
    }

    public function update(Request $request, $id)
    {

        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $item = Kontent::findOrFail($id);
            $item->title = $request->input('title');
            $item->description = $request->input('description');

            if ($request->hasFile('image')) {
                // Delete old image
                if ($item->image && file_exists(storage_path('app/public/' . $item->image))) {
                    unlink(storage_path('app/public/' . $item->image));
                }

                $imagePath = $request->file('image')->store('images', 'public');
                $item->image = $imagePath;
            }

            $item->save();

            return redirect()->route('kontent.create')->with('success', 'Item updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('kontent.create')->with('error', 'Failed to update item: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $item = Kontent::findOrFail($id);
            // Delete image file
            // if ($item->image && file_exists(storage_path('app/public/' . $item->image))) {
            //     unlink(storage_path('app/public/' . $item->image));
            // }
            // $item->delete();


            $item->update(['deleted_at' => now()]);

            return redirect()->route('kontent.create')->with('success', 'Item deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('kontent.create')->with('error', 'Failed to delete item: ' . $e->getMessage());
        }
    }
}
