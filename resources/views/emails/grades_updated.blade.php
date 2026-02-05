<h2>Hello {{ $student->first_name }},</h2>

<p>Your grades have been updated. Here are your current grades:</p>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Subject</th>
            <th>Grade</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subjects as $subject)
        <tr>
            <td>{{ $subject->name }}</td>
            <td>{{ $subject->pivot->grade ?? 'N/A' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<p><strong>Average Grade:</strong> {{ round($average, 2) }}</p>

<p>Regards,<br>School Administration</p>
