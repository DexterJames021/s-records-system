@extends('layouts.layout')

@section('contents')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
        <div class="max-w-md w-full bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Head er -->
            <div class="flex justify-between items-center px-6 py-4  shadow">
                <h2 class="font-bold  text-gray-800">
                    Student ID: <span class="text-gray-600">{{ str_replace('-', '', $student->student_id) }}</span>
                </h2>
                <a href="{{ route('students.index') }}"
                    class="rounded-md bg-gray-200 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-500 hover:text-white transition">
                    Back
                </a>
            </div>

            <!-- Body -->
            <div class="px-6 py-4 space-y-3">
                <!-- Full Name -->
                <div class="flex justify-between">
                    <span class="font-medium text-gray-600">Fullname:</span>
                    <span class="text-gray-500">
                        {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}
                    </span>
                </div>

                <!-- Email -->
                <div class="flex justify-between">
                    <span class="font-medium text-gray-600">Email:</span>
                    <span class="text-gray-500">{{ $student->email }}</span>
                </div>

                <!-- Course -->
                <div class="flex justify-between">
                    <span class="font-medium text-gray-600">Course:</span>
                    <span class="text-gray-500">{{ $student->course }}</span>
                </div>


                <div class="flex justify-between">
                    <p><strong>Average Grade:</strong> {{ round($student->average_grade, 2) }}</p>

                <ul class="list-disc ml-6">
                    @foreach ($student->subjects as $subject)
                        <li>{{ $subject->name }}: {{ $subject->pivot->grade ?? 'N/A' }}</li>
                    @endforeach
                </ul>
                </div>


                <!-- Year Level -->
                <div class="flex justify-between">
                    <span class="font-medium text-gray-600">Year Level:</span>
                    <span class="text-gray-500">{{ $student->year_level }}</span>
                </div>

                <!-- Date of Birth -->
                <div class="flex justify-between">
                    <span class="font-medium text-gray-600">Date of Birth:</span>
                    <span
                        class="text-gray-500">{{ \Carbon\Carbon::parse($student->date_of_birth)->format('F d, Y') }}</span>
                </div>

                <!-- Gender -->
                <div class="flex justify-between">
                    <span class="font-medium text-gray-600">Gender:</span>
                    <span class="text-gray-500">{{ ucfirst($student->gender) }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection