@extends('layouts.layout')

@section('contents')
    <div class="  flex items-center justify-center p-4">
        <div class="w-full">
            @if (session('success'))
                <div id="toast" class="fixed top-5 right-5 z-50 flex items-center px-3 py-2 rounded-lg bg-green-600 shadow-lg">
                    <div class="text-white font-semibold mr-3">
                        ✓
                    </div>
                    <div class="text-white">
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <!-- hedaer -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="px-4 py-5 ">
                    <h1 class=" text-3xl font-bold text-gray-800 mb-2 sm:mb-0">Student List</h1>
                </div>
                <div
                    class="flex flex-col sm:flex-row justify-between items-start sm:items-center p-4 border-b border-gray-200">
                    <form class="flex items-center space-x-2 w-full sm:w-auto">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search student id, name or email"
                            class="flex-1 sm:flex-none px-5 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </form>
                    <a href="{{ route('students.create') }}" type="button"
                        class="float-end rounded-md bg-indigo-500 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        Create
                    </a>
                </div>

                {{-- table --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>

                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Student ID
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Fullname
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date of Birth
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Gender
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Course
                                </th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Year Level
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($students as $student)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ str_replace('-', '', $student->student_id) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ implode(' ', array_filter([$student->first_name, $student->middle_name, $student->last_name])) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($student->date_of_birth)->format('m/d/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm uppercase font-medium text-gray-500">
                                        {{ $student->gender }}
                                    </td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->course }}</td>
                                    <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->year_level }}
                                    </td>
                                    <td class="px-6 flex py-5 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('students.show', $student->id) }}"
                                            class="text-gray-500 hover:text-indigo-900 mr-5" title="view">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('students.edit', $student->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900 mr-5" title="edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11 5h2m-1-1v2m-1 4h2m-1-1v2m-2 8h6M4 21h16a2 2 0 002-2V7.414a1 1 0 00-.293-.707l-4.414-4.414A1 1 0 0016.586 2H4a2 2 0 00-2 2v16a2 2 0 002 2z" />
                                            </svg>
                                        </a>
                                        <span>
                                            <form method="post" action="{{ route("students.destroy", $student->id) }}"
                                                onclick="return confirm('Are you sure you want to delete this student?')">
                                                @csrf
                                                @method("DELETE")
                                                <button class="text-red-600 hover:text-red-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="8" class="text-center py-12 text-gray-500">
                                    No data found
                                </td>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4 p-2 bg-white rounded shadow">
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="inline ">
                @csrf
                <button type="submit"
                    class="flex items-center bg-red-400 hover:bg-red-500 text-white px-3 py-1 mt-10 rounded-md text-sm font-medium transition duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 002 2h3a2 2 0 002-2v-1m0-8V7a2 2 0 00-2-2h-3a2 2 0 00-2 2v1">
                        </path>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>

@endsection