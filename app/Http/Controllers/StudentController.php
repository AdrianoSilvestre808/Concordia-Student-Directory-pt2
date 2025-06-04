<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\City;

class StudentController extends Controller
{
    // Show dashboard with student data linked to logged-in user
    public function dashboard()
    {
        $user = Auth::user();

        // Show students only if the logged-in user has them (optional)
        $students = Student::where('user_id', $user->id)->get();

        return view('dashboard', compact('user', 'students'));
    }

    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

public function create()
{
    return view('students.create', [
        'cities' => City::all()
    ]);
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email',
        'address' => 'required|string',
        'phone' => 'required|string',
        'date_of_birth' => 'required|date',
        'city_id' => 'required|exists:cities,id',
    ]);

    $student = new Student();
    $student->name = $request->name;
    $student->email = $request->email;
    $student->address = $request->address;
    $student->phone = $request->phone;
    $student->date_of_birth = $request->date_of_birth;
    $student->city_id = $request->city_id;
    $student->user_id = Auth::id(); // Link to the logged-in user
    $student->save();

    return redirect()->route('students.index')->with('success', 'Student added successfully.');
}

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

public function edit(Student $student)
{
    return view('students.edit', [
        'student' => $student,
        'cities' => City::all()
    ]);
}

public function update(Request $request, Student $student)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email,' . $student->id,
        'address' => 'required|string',
        'phone' => 'required|string',
        'date_of_birth' => 'required|date',
        'city_id' => 'required|exists:cities,id',
    ]);

    $student->update([
        'name' => $request->name,
        'email' => $request->email,
        'address' => $request->address,
        'phone' => $request->phone,
        'date_of_birth' => $request->date_of_birth,
        'city_id' => $request->city_id,
    ]);

    return redirect()->route('students.index')->with('success', 'Student updated successfully.');
}

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
