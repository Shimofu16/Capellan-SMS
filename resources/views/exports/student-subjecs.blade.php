<table>
    <thead>
        <tr>
            <th colspan="2" style="text-align:center;font-size: 17px;"> Capellan Institute Of Technology Inc</th>
        </tr>
        <tr>
            <th colspan="2" style="text-align:center;font-size: 14px;">Name: {{ $student->getFullName() }}</th>
        </tr>
        <tr>
            <th colspan="2" style="text-align:center;font-size: 14px;">Specialization:
                {{ $student->specialization->name }}</th>
        </tr>
        <tr>
            <th colspan="2" style="text-align:center; font-size: 14px;">{{ $student->gradeLevel->name }} - First
                Semester</th>
        </tr>
        <tr>
            <th style="text-align:center; font-size: 12px;">Subject Code</th>
            <th style="text-align:center; font-size: 12px;">Subject</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2" style="text-align:center; font-size: 16px;">
                Core
            </td>
        </tr>
        @forelse ($subjects as $subject)
            @if ($subject->subject->type === 'Core' && $subject->subject->semester_id === 1)
                <tr>
                    <td style="text-align: center; font-size: 12px;">{{ $subject->subject->code }}</td>
                    <td style=" font-size: 12px;">{{ $subject->subject->name }}</td>
                </tr>
            @endif
        @empty
            <tr>
                <td colspan="2" style="text-align: center; font-size: 12px;">No Core Subjects Found</td>
            </tr>
        @endforelse
        <tr>
            <td colspan="2" style="text-align: center; font-size: 16px;">
                Applied and Specialized Subjects
            </td>
        </tr>
        @forelse ($subjects as $subject)
            @if ($subject->subject->type === 'Applied and Specialized Subjects' && $subject->subject->semester_id === 1)
                <tr>
                    <td style="text-align: center; font-size: 12px;">{{ $subject->subject->code }}</td>
                    <td style=" font-size: 12px;">{{ $subject->subject->name }}</td>
                </tr>
            @endif
        @empty
            <tr>
                <td colspan="2" style="text-align: center; font-size: 12px;">No Applied and Specialized Subjects
                    Found</td>
            </tr>
        @endforelse
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <th colspan="2" style="text-align: center; font-size: 14px;">{{ $student->gradeLevel->name }} - Second
                Semester</th>
        </tr>
        <tr>
            <th style="text-align:center; font-size: 12px;">Subject Code</th>
            <th style="text-align:center; font-size: 12px;">Subject</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2" style="text-align: center; font-size: 16px;">
                Core
            </td>
        </tr>
        @forelse ($subjects as $subject)
            @if ($subject->subject->type === 'Core' && $subject->subject->semester_id === 2)
                <tr>
                    <td style="text-align: center; font-size: 12px;">{{ $subject->subject->code }}</td>
                    <td style=" font-size: 12px;">{{ $subject->subject->name }}</td>
                </tr>
            @endif
        @empty
            <tr>
                <td colspan="2" style="text-align: center; font-size: 12px;">No Core Subjects Found</td>
            </tr>
        @endforelse
        <tr>

        </tr>
        <tr>
            <td colspan="2" style="text-align: center; font-size: 16px;">
                Applied and Specialized Subjects
            </td>
        </tr>
        @forelse ($subjects as $subject)
            @if ($subject->subject->type === 'Applied and Specialized Subjects' && $subject->subject->semester_id === 2)
                <tr>
                    <td style="text-align: center; font-size: 12px;">{{ $subject->subject->code }}</td>
                    <td style=" font-size: 12px;">{{ $subject->subject->name }}</td>
                </tr>
            @endif
        @empty
            <tr>
                <td colspan="2" style="text-align: center; font-size: 12px;">No Applied and Specialized Subjects
                    Found</td>
            </tr>
        @endforelse
    </tbody>
</table>
