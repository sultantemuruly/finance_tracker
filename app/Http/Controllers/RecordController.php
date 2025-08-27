<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['nullable', 'max:1000'],
            'amount' => ['required', 'numeric'],
            'date' => ['required', 'date'],
            'type' => ['required', 'in:income,expense']
        ]);

        $validated['user_id'] = $request->user()->id;

        Record::create($validated);

        return redirect()->route('dashboard');
    }

    public function delete(Request $request, $id)
    {
        $record = Record::where('id', $id)
        ->where('user_id', $request->user()->id)
        ->firstOrFail();

        $record->delete();

        return redirect()->route('dashboard');
    }

    public function edit(Request $request, $id)
    {
        $record = Record::where('id', $id)
        ->where('user_id', $request->user()->id)
        ->firstOrFail();

        $record->delete();

        return redirect()->route('dashboard');
    }

    public function showEditScreen(Request $request, $id)
    {
        $record = Record::where('id', $id)
        ->where('user_id', $request->user()->id)
        ->firstOrFail();

        return view('edit', compact('record'));
    }

    public function filterByType(Request $request)
    {
        $type = $request->input('type');
        $records = Record::where('type', $type)->get();

        return view('dashboard', compact('records'));
    }

    public function update(Request $request, $id)
    {
        $record = Record::where('id', $id)
        ->where('user_id', $request->user()->id)
        ->firstOrFail();

        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['nullable', 'max:1000'],
            'amount' => ['required', 'numeric'],
            'date' => ['required', 'date'],
            'type' => ['required', 'in:income,expense']
        ]);

        $record->update($validated);

        return redirect()->route('dashboard');
    }
}
