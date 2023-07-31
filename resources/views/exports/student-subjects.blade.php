
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
                {{ $student->enrollment->specialization->specialization }}</th>
        </tr>
        @if (count($subjectsCoreFirstSem) != 0)
            <tr>
                <th colspan="2" style="text-align:center; font-size: 14px;">{{ $student->enrollment->gradeLevel->grade_level }} - First
                    Semester</th>
            </tr>
        @endif
        @if (count($subjectsCoreFirstSem) != 0 || count($subjectsASSFirstSem) != 0)
            <tr>
                <th style="text-align:center; font-size: 12px;">Subject Code</th>
                <th style="text-align:center; font-size: 12px;">
                    @if ($student->status === "Iregular")
                        Completed/Enrolled
                        @else

                    @endif
                    Subject</th>

            </tr>
        @endif
    </thead>
    <tbody>
        @if (count($subjectsCoreFirstSem) != 0)
            <tr>
                <td colspan="2" style="text-align:center; font-size: 16px;">
                    Core
                </td>
            </tr>
            @foreach ($subjectsCoreFirstSem as $subjectCoreFirstSem)
                <tr>
                    <td style="text-align: center; font-size: 12px;">{{ $subjectCoreFirstSem->subject->code }}</td>
                    <td style=" font-size: 12px;">{{ $subjectCoreFirstSem->subject->name }}</td>
                </tr>
            @endforeach
        @endif

        @if (count($subjectsASSFirstSem) != 0)
            <tr>
                <td colspan="2" style="text-align: center; font-size: 16px;">
                    Applied and Specialized Subjects
                </td>
            </tr>
            @foreach ($subjectsASSFirstSem as $subjectASSFirstSem)
                <tr>
                    <td style="text-align: center; font-size: 12px;">{{ $subjectASSFirstSem->subject->code }}</td>
                    <td style=" font-size: 12px;">{{ $subjectASSFirstSem->subject->name }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>


@if (count($subjectsCoreSecondSem) != 0 || count($subjectsASSSecondSem) != 0)
    <table>
        <thead>
            <tr>
                <th colspan="2" style="text-align: center; font-size: 14px;">{{ $student->enrollment->gradeLevel->grade_level }} -
                    Second
                    Semester</th>
            </tr>
            <tr>
                <th style="text-align:center; font-size: 12px;">Subject Code</th>
                <th style="text-align:center; font-size: 12px;">
                    @if ($student->status === "Iregular")
                        Completed/Enrolled
                        @else

                    @endif
                    Subject</th>
            </tr>
        </thead>
        <tbody>
            @if (count($subjectsCoreSecondSem) != 0)
                <tr>
                    <td colspan="2" style="text-align: center; font-size: 16px;">
                        Core
                    </td>
                </tr>
                @foreach ($subjectsCoreSecondSem as $subjectCoreSecondSem)
                    <tr>
                        <td style="text-align: center; font-size: 12px;">{{ $subjectCoreSecondSem->subject->code }}</td>
                        <td style=" font-size: 12px;">{{ $subjectCoreSecondSem->subject->name }}</td>
                    </tr>
                @endforeach
            @endif
            @if (count($subjectsASSSecondSem) != 0)
                <tr>
                    <td colspan="2" style="text-align: center; font-size: 16px;">
                        Applied and Specialized Subjects
                    </td>
                </tr>
                @foreach ($subjectsASSSecondSem as $subjectASSSecondSem)
                    <tr>
                        <td style="text-align: center; font-size: 12px;">{{ $subjectASSSecondSem->subject->code }}</td>
                        <td style=" font-size: 12px;">{{ $subjectASSSecondSem->subject->name }}</td>
                    </tr>
                @endforeach

            @endif
        </tbody>
    </table>
@endif
