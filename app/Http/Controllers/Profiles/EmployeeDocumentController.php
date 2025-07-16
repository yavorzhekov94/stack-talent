<?php

namespace App\Http\Controllers\Profiles;

use App\Http\Controllers\Controller;
use App\Models\EmployeeDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeDocumentController extends Controller
{
    //
    public function index()
    {
        $documents = auth()->user()->employee->documents;
        return response()->json($documents);
    }

    public function store( Request $request)
    {
        $request->validate([
        'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        'file_type' => 'required|string|max:255',
        'is_primary' => 'nullable|boolean',
    ]);

        $employeeProfile = auth()->user()->employee;

        $path = $request->file('file')->store('employee_documents');

        EmployeeDocument::create([
            'employee_profile_id' => $employeeProfile->id,
            'file_type' => $request->file_type,
            'file_path' => $path,
            'original_name' => $request->file('file')->getClientOriginalName(),
            'is_primary' => $request->has('is_primary'),
        ]);

        return response()->json(['success' => true]);
    }

    public function destroy(string $id)
    {
        $document = EmployeeDocument::findOrFail($id);

        if ($document->employee_profile_id !== auth()->user()->employee->id) {
            abort(403);
        }

        Storage::disk('public')->delete($document->file_path);
        $document->delete();

        return response()->json(['success' => true]);

    }

    public function download(string $id)
    {
        $document = EmployeeDocument::findOrFail($id);
        return Storage::download($document->file_path, $document->original_name);
    }
}
