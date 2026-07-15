<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function create(): View
    {
        return view('studenti.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'ime' => ['required', 'string', 'min:2', 'max:255'],
            'prezime' => ['required', 'string', 'min:2', 'max:255'],
            'status' => ['required', 'in:redovni,izvanredni'],
            'godiste' => [
                'required',
                'integer',
                'min:1980',
                'max:' . date('Y'),
            ],
            'prosjek' => [
                'required',
                'numeric',
                'between:1,5',
            ],
            'stipendija' => [
                'required',
                'numeric',
                'min:0',
            ],
        ]);

        Student::create($validated);

        return redirect()
            ->route('studenti.index')
            ->with('success', 'Student je uspješno dodan.');
    }


    public function edit(Student $student): View
    {
        return view('studenti.edit', compact('student'));
    }

    public function update(Request $request, Student $student): RedirectResponse
    {
        $validated = $request->validate([
            'ime' => ['required', 'string', 'min:2', 'max:255'],
            'prezime' => ['required', 'string', 'min:2', 'max:255'],
            'status' => ['required', 'in:redovni,izvanredni'],
            'godiste' => [
                'required',
                'integer',
                'min:1980',
                'max:' . date('Y'),
            ],
            'prosjek' => [
                'required',
                'numeric',
                'between:1,5',
            ],
            'stipendija' => [
                'required',
                'numeric',
                'min:0',
            ],
        ]);

        $student->update($validated);

        return redirect()
            ->route('studenti.index')
            ->with('success', 'Student je uspješno ažuriran.');
    }
}