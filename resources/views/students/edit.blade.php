@extends('layouts.layout')

@section('contents')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-4 border-b border-gray-200">
                <h1 class="font-bold text-gray-800 mb-2 sm:mb-0">Update Student:
                    {{ str_ireplace('-', '', $student->student_id) }}
                </h1>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <strong class="font-bold">Please fix the following errors:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('students.update', $student->id) }}"
                class="w-full max-w-2xl mx-auto bg-white p-5 rounded-lg shadow-md" action="/submit-form" method="POST">
                @csrf
                @method('PUT')
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/3  px-2 mb-6 md:mb-0">
                        <input type="hidden" name="student_id" value="{{ $student->student_id }}">
                        <label class="block  text-gray-700 text-xs font-bold mb-2" for="fname_lbl" autofocus="true">
                            First name
                        </label>
                        <input name="first_name" value="{{ $student->first_name  }}"
                            class=" block w-full bg-gray-50 text-gray-700 border border-gray-300  py-2 px-2   rounded mb-3 leading-tight focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            id="fname_lbl" type="text" placeholder="Jane">
                        @error('first_name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/4 px-2">
                        <label class="block  text-gray-700 text-xs font-bold mb-2" for="mname_lbl">
                            Middle name
                        </label>
                        <input name="middle_name" value="{{ $student->middle_name ?? '' }}"
                            class=" block w-full bg-gray-50 text-gray-700 border border-gray-300  py-2 px-2   rounded leading-tight focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            id="mname_lbl" type="text" placeholder="Doe">
                        @error('middle_name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/3 px-2">
                        <label class="block  text-gray-700 text-xs font-bold mb-2" for="lname_lbl">
                            Last name
                        </label>
                        <input name="last_name" value="{{ $student->last_name }}"
                            class=" block w-full bg-gray-50 text-gray-700 border border-gray-300  py-2 px-2   rounded leading-tight focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            id="lname_lbl" type="text" placeholder="Doe">
                        @error('last_name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3">
                        <label class="block  text-gray-700 text-xs font-bold mb-2" for="email_lbl">
                            Email
                        </label>
                        <input name="email" value="{{ $student->email }}"
                            class=" block w-full bg-gray-50 text-gray-700 border border-gray-300  py-2 px-2   rounded leading-tight focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            id="email_lbl" type="email" placeholder="email@gmail.com">
                        @error('email')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block  text-gray-700 text-xs font-bold mb-2" for="gender_lbl">
                            Gender
                        </label>
                        <div class="flex items-center space-x-6">
                            <label class="inline-flex items-center">
                                <input type="radio" name="gender" value="male"
                                    class="form-radio text-indigo-600"
                                    {{ old('gender', $student->gender ?? '') == 'male' ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700">Male</span>
                            </label>

                            <label class="inline-flex items-center">
                                <input type="radio" name="gender" value="female"
                                    class="form-radio text-indigo-600"
                                    {{ old('gender', $student->gender ?? '') == 'female' ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700">Female</span>
                            </label>
                        </div>
                        @error('gender')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block  text-gray-700 text-xs font-bold mb-2" for="dob_lbl">
                            Date of Birth
                        </label>
                        <input name="date_of_birth" value="{{ $student->date_of_birth }}"
                            class=" block w-full bg-gray-50 text-gray-700 border border-gray-300  py-2 px-2   rounded leading-tight focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            id="dob_lbl" type="date">
                        @error('date_of_birth')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block  text-gray-700 text-xs font-bold mb-2" for="year_lbl">
                            Year Level
                        </label>
                        <select name="year_level"
                            class="block w-full bg-gray-50 border border-gray-300 text-gray-700 py-2 px-2 rounded pr-8 focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            id="year_lbl">
                            <option disabled hidden>{{ $student->year_level }}</option>
                            <option value="1" {{ $student->year_level == '1' ? 'selected' : '' }}>1 year</option>
                            <option value="2" {{ $student->year_level == '2' ? 'selected' : '' }}>2 year</option>
                            <option value="3" {{ $student->year_level == '3' ? 'selected' : '' }}>3 year</option>
                        </select>
                        @error('year_level')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block  text-gray-700 text-xs font-bold mb-2" for="course_lbl">
                            Course
                        </label>
                        <div class="relative">
                            <select name="course"
                                class="block w-full bg-gray-50 border border-gray-300 text-gray-700 py-2 px-2 rounded pr-8 leading-tight focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                id="course_lbl" required>
                                <option disabled hidden>{{ $student->course }}</option>
                                <option value="IT" {{ $student->course == 'IT' ? 'selected' : '' }}>IT</option>
                                <option value="CS" {{ $student->course == 'CS' ? 'selected' : '' }}>CS</option>
                                <option value="CE" {{ $student->course == 'CE' ? 'selected' : '' }}>CE</option>
                                <option value="IS" {{ $student->course == 'IS' ? 'selected' : '' }}>IS</option>
                            </select>
                            @error('course')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                    <div class=" gap-5 md:w-1/2 px-3 mt-3 mb-6 md:mb-0">
                        <label class="block  text-gray-700 text-xm font-bold mb-2" for="course_lbl">
                            Subjects
                        </label>
                        @php
                            $subjectCount = $student->subjects->count();
                        @endphp
                        
                        @if(($subjectCount) >= 5) 
                             @foreach ($student->subjects as $subject)
                                <div class="mb-4">
                                    <label class="text-gray-700 text-xs font-bold mb-2">
                                        {{ $subject->name }}
                                    </label>
                                    <input
                                        type="number"
                                        name="grades[{{ $subject->id }}]"
                                        min="0"
                                        max="100"
                                        value="{{ old('grades.' . $subject->id, $subject->pivot->grade) }}"
                                        class="w-full bg-gray-50 border border-gray-300 text-gray-700 py-2 px-2 rounded pr-8 leading-tight focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                    >
                                </div>
                            @endforeach
                        @else
                        <div class="w-full md:w-1/2 px-3 my-6 md:mb-0">
                            <p class="block  text-gray-500 text-sm mt-4 font-small mb-2" for="course_lbl">
                                Reselect at least 5 subjects to input grades
                            </p>
                            <div class="grid">
                                @foreach ($subjects as $subject)
                                <div class="flex">
                                     <input
                                        type="checkbox"
                                        name="subjects[]"
                                        value="{{ $subject->id }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-700 rounded focus:ring-2 focus:ring-blue-500"
                                        {{-- Pre-check already selected subjects or old input --}}
                                        @checked(
                                            old('subjects')
                                                ? in_array($subject->id, old('subjects'))
                                                : $student->subjects->contains($subject->id)
                                        )
                                    >
                                    <label class="ml-2 text-gray-700">{{ $subject->name }}</label>
                                </div>
                                @endforeach
                                @error('subjects[]')    
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        @endif
                        
                    </div>
                    <div class="md:w-1/2 mb-6 mt-10">
                        <label class="inline-flex items-center gap-2 text-gray-700 text-sm font-medium">
                            <input
                                type="checkbox"
                                name="send_email"
                                value="1"
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                            >
                            Send grades to email
                        </label>
                    </div>
                </div>

                <div class="flex justify-end gap-1">
                    <a href="{{ route('students.index') }}"
                        class="flex justify-center rounded-md bg-gray-200 px-4 py-2 text-sm font-semibold text-gray-600 hover:text-white hover:bg-gray-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        Cancel
                    </a>
                    <button
                        class="flex justify-center rounded-md bg-indigo-500 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        Submit
                    </button>
                </div>
            </form>
        </div>
@endsection