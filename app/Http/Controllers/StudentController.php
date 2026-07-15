<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(): View
    {
        $studenti = Student::orderBy('prezime')
            ->orderBy('ime')
            ->get();

        return view('studenti.index', compact('studenti'));
    }
}