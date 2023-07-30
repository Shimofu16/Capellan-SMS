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
    public $completed = [];
    public $enroll = [];
    public function checkTheIds($id,$isCompleted){
        if ($isCompleted) {
            foreach ($this->enroll as $key => $value) {
                if ($value == $id) {
                    return true;
                }
            }
        } else {
            foreach ($this->completed as $key => $value) {
                if ($value == $id) {
                    return true;
                }
            }
        }
        return false;
    }

    public function mount(){
        $this->subjectsForFirstSemGrade11Core = Subject::with('gradeLevel')->where('grade_level_id', $this->student->enrollment->gradelevel_id)
        ->where('specialization_id', $this->student->enrollment->specialization_id)
        ->where('type', 'Core')
        ->where('semester_id', 1)
        ->get();
    $this->subjectsForFirstSemGrade11AppliedSpecializedSubjects = Subject::with('gradeLevel')->where('grade_level_id', $this->student->enrollment->gradelevel_id)
        ->where('specialization_id', $this->student->enrollment->specialization_id)
        ->where('type', 'Applied and Specialized Subjects')
        ->where('semester_id', 1)
        ->get();
    $this->subjectsForSecondSemGrade11Core = Subject::with('gradeLevel')->where('grade_level_id', $this->student->enrollment->gradelevel_id)
        ->where('specialization_id', $this->student->enrollment->specialization_id)
        ->where('type', 'Core')
        ->where('semester_id', 2)
        ->get();
    $this->subjectsForSecondSemGrade11AppliedSpecializedSubjects = Subject::with('gradeLevel')->where('grade_level_id', $this->student->enrollment->gradelevel_id)
        ->where('specialization_id', $this->student->enrollment->specialization_id)
        ->where('type', 'Applied and Specialized Subjects')
        ->where('semester_id', 2)
        ->get();
        $this->status = 0;
    }
    public function render()
    {
        return view('livewire.enroll-student-subject');
    }
}
