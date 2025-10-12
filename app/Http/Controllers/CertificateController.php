<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class CertificateController extends Controller
{
    public function download(Course $course)
    {
        $formattedDate = Carbon::parse($course->date)->format('Y-m-d');

        return Pdf::loadView('pdf.certificate', compact('course'))
            ->setPaper('a4', 'landscape')
            ->stream('certificate-'.$formattedDate.'.pdf');
    }
}
