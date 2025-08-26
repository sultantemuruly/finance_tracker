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

    // public function delete(Request $request, Record $record)
    // {
    //     if ($record->user_id !== $request->user()->id) {
    //         abort(403);
    //     }

    //     $record->delete();

    //     return redirect()->route('dashboard');
    // }
}
