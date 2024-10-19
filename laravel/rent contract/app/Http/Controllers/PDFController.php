<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Due;
use App\Models\Electric;
use App\Models\Water;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{

    public function download($id, $type)
    {
        if ($type == 'contractPDF') $file = Contract::findOrFail($id)->contractPDF;
        if ($type == 'checkboxPDF') $file = Contract::findOrFail($id)->checkboxPDF;
        if ($type == 'due') $file = Due::findOrFail($id)->duePdf;
        if ($type == 'electric') $file = Electric::findOrFail($id)->PDF;
        if ($type == 'water') $file = Water::findOrFail($id)->PDF;
        if (isset($file)) {
            $path = base_path("public_html/PDF folder/" . $file);
            if (File::exists($path)) {
                return response()->download($path);
            }
            if (Storage::disk('public')->exists($file)) {
                return Storage::disk('public')->download($file);
            }
        }
        return redirect()->back()->with('error', 'هذا الملف غير موجود');
    }
}
