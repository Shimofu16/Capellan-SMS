<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\StudentSubject as ModelsStudentSubject;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View; // Add this import statement
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StudentSubject implements FromView,ShouldAutoSize
{
    use Exportable;
    private $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function view(): View
    {
        $subjects = ModelsStudentSubject::where('student_id', $this->student->id)->whereDate('created_at',now())->get();
        return view('exports.student-subjecs', [
            'student' => $this->student,
            'subjects' => $subjects,
        ]);
    }
}
