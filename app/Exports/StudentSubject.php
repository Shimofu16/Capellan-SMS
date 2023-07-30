<?php

namespace App\Exports;

use App\Models\EMS\Student as EMSStudent;
use App\Models\Student;
use App\Models\StudentSubject as ModelsStudentSubject;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View; // Add this import statement
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StudentSubject implements FromView, ShouldAutoSize
{
    use Exportable;
    private $student;

    public function __construct(EMSStudent $student)
    {
        $this->student = $student;
    }

    public function view(): View
    {
        $subjectsCoreFirstSem = ModelsStudentSubject::with('subject')->whereHas('subject', function ($query) {

            $query->where('type', 'Core')->where('semester_id', 1);
        })
            ->where('student_id', $this->student->id)->whereDate('created_at', now())->get();
        $subjectsASSFirstSem = ModelsStudentSubject::with('subject')->whereHas('subject', function ($query) {

            $query->where('type', 'Applied and Specialized Subjects')->where('semester_id', 1);
        })
            ->where('student_id', $this->student->id)->whereDate('created_at', now())->get();
        $subjectsCoreSecondSem = ModelsStudentSubject::with('subject')->whereHas('subject', function ($query) {

            $query->where('type', 'Core')->where('semester_id', 2);
        })
            ->where('student_id', $this->student->id)->whereDate('created_at', now())->get();
        $subjectsASSSecondSem = ModelsStudentSubject::with('subject')->whereHas('subject', function ($query) {

            $query->where('type', 'Applied and Specialized Subjects')->where('semester_id', 2);
        })
            ->where('student_id', $this->student->id)->whereDate('created_at', now())->get();
        return view('exports.student-subjects', [
            'student' => $this->student,
            'subjectsCoreFirstSem' => $subjectsCoreFirstSem,
            'subjectsASSFirstSem' => $subjectsASSFirstSem,
            'subjectsCoreSecondSem' => $subjectsCoreSecondSem,
            'subjectsASSSecondSem' => $subjectsASSSecondSem,
        ]);
    }
}
