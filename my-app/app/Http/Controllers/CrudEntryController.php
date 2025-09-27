<?php

namespace App\Http\Controllers;

use App\Models\CrudEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CrudEntryController extends Controller
{
    public function index()
    {
        $entries = CrudEntry::all();
        return view('crud.index', compact('entries'));
    }

    public function create()
    {
        return view('crud.create');
    }

    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'email' => 'required|email|unique:crud_entries,email',
            'user_id' => 'required|string|unique:crud_entries,user_id',
            'password' => 'required|confirmed|min:6',
            'image' => 'nullable|image|max:2048',
        ]);

        // Handle image
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('uploads', 'public');
        }

        CrudEntry::create([
            'name' => $validated['name'],
            'number' => $validated['number'],
            'email' => $validated['email'],
            'user_id' => $validated['user_id'],
            'password' => Hash::make($validated['password']),
            'image' => $path,
        ]);

        return redirect()->route('crud.index')->with('success', 'Entry created successfully.');
    }

    public function show(CrudEntry $crudEntry)
    {
        // optionally show details page
        return view('crud.show', compact('crudEntry'));
    }

    public function edit(CrudEntry $crudEntry)
    {
        return view('crud.edit', compact('crudEntry'));
    }

    public function update(Request $request, CrudEntry $crudEntry)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'email' => 'required|email|unique:crud_entries,email,' . $crudEntry->id,
            'user_id' => 'required|string|unique:crud_entries,user_id,' . $crudEntry->id,
            'password' => 'nullable|confirmed|min:6',
            'image' => 'nullable|image|max:2048',
        ]);

        // handle image update
        if ($request->hasFile('image')) {
            // delete old
            if ($crudEntry->image) {
                Storage::disk('public')->delete($crudEntry->image);
            }
            $path = $request->file('image')->store('uploads', 'public');
            $crudEntry->image = $path;
        }

        $crudEntry->name = $validated['name'];
        $crudEntry->number = $validated['number'];
        $crudEntry->email = $validated['email'];
        $crudEntry->user_id = $validated['user_id'];
        if (!empty($validated['password'])) {
            $crudEntry->password = Hash::make($validated['password']);
        }

        $crudEntry->save();

        return redirect()->route('crud.index')->with('success', 'Entry updated successfully.');
    }

    public function destroy(CrudEntry $crudEntry)
    {
        // delete image
        if ($crudEntry->image) {
            Storage::disk('public')->delete($crudEntry->image);
        }
        $crudEntry->delete();
        return redirect()->route('crud.index')->with('success', 'Entry deleted.');
    }
}
