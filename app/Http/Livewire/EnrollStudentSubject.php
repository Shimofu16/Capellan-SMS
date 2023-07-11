<?php

namespace App\Http\Livewire;

use App\Models\Subject;
use Livewire\Component;

class EnrollStudentSubject extends Component
{
    public $student;
    public $gradeLevels;
    public $grade_level_id;
    public $subjectsForFirstSemGrade11Core;
    public $subjectsForFirstSemGrade11AppliedSpecializedSubjects;
    public $subjectsForSecondSemGrade11Core;
    public $subjectsForSecondSemGrade11AppliedSpecializedSubjects;
    public $subject_id;
    public $status;
    public $completed_subjects = [];
    public $incomplete_subjects = [];
    public function updatedGradeLevelId($value)
    {
        $specialization_id = $this->student->specialization_id;
        $this->subjectsForFirstSemGrade11Core = Subject::with('gradeLevel')->where('grade_level_id', $value)
            ->where('specialization_id', $specialization_id)
            ->where('type', 'Core')
            ->where('semester_id', 1)
            ->get();
        $this->subjectsForFirstSemGrade11AppliedSpecializedSubjects = Subject::with('gradeLevel')->where('grade_level_id', $value)
            ->where('specialization_id', $specialization_id)
            ->where('type', 'Applied and Specialized Subjects')
            ->where('semester_id', 1)
            ->get();
        $this->subjectsForSecondSemGrade11Core = Subject::with('gradeLevel')->where('grade_level_id', $value)
            ->where('specialization_id', $specialization_id)
            ->where('type', 'Core')
            ->where('semester_id', 2)
            ->get();
        $this->subjectsForSecondSemGrade11AppliedSpecializedSubjects = Subject::with('gradeLevel')->where('grade_level_id', $value)
            ->where('specialization_id', $specialization_id)
            ->where('type', 'Applied and Specialized Subjects')
            ->where('semester_id', 2)
            ->get();
        // dd all
        // dd( $this->subjectsForFirstSemGrade11Core,   $this->subjectsForFirstSemGrade11AppliedSpecializedSubjects,   $this->subjectsForSecondSemGrade11Core,  $this->subjectsForSecondSemGrade11AppliedSpecializedSubjects);
    }
    public function mount(){
        $this->subjectsForFirstSemGrade11Core = collect();
        $this->subjectsForSecondSemGrade11Core = collect();
        $this->subjectsForSecondSemGrade11AppliedSpecializedSubjects = collect();
        $this->subjectsForFirstSemGrade11AppliedSpecializedSubjects = collect();
        $this->grade_level_id = 0;
        $this->status = 0;
    }
    public function render()
    {
        return view('livewire.enroll-student-subject');
    }
}
