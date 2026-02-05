<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Mail\GradesUpdatedMail;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = Student::search($request->search)
            ->paginate(5)
            ->withQueryString();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $students = Student::with('subject')->get('name');
        $subjects = Subject::all();

        return view('students.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->only([
            'first_name',
            'middle_name',
            'last_name',
            'email',
            'gender',
            'course',
            'year_level',
            'date_of_birth',
        ]));

        $student->subjects()->attach($request->subjects);

        // Generate student ID
        $student->generateStudentId();

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);

        $student->average_grade = $student->subjects->avg('pivot.grade');

        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);

        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudentRequest $request, string $id)
    {
        $student = Student::findOrFail($id);

        // ✅ Validate grades
        $request->validate([
            'grades' => 'nullable|array',
            'grades.*' => 'nullable|integer|min:0|max:100',
        ]);

        // ✅ Update grades in pivot table
        if ($request->filled('grades')) {
            $syncData = [];

            foreach ($request->grades as $subject_id => $grade) {
                $syncData[$subject_id] = ['grade' => $grade];
            }

            $student->subjects()->syncWithoutDetaching($syncData);
        }

        // ✅ Update student info
        $student->update($request->only([
            'first_name',
            'middle_name',
            'last_name',
            'email',
            'gender',
            'course',
            'year_level',
            'date_of_birth',
        ]));

        // ✅ Reload subjects so email has latest grades
        $student->load('subjects');

        // ✅ Send email AFTER update
        Mail::to($student->email)->send(new GradesUpdatedMail($student));

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully and grades email sent.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student delete successfully');
    }
}
