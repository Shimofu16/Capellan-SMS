<?php

namespace App\Http\Livewire;

use App\Models\EMS\ActiveSyandSem;
use App\Models\Subject;
use Livewire\Component;

class EnrollStudentSubject extends Component
{
    public $student;
    public $semester;
    public $coreSubjects;
    public $appliedSpecializedSubjects;
    public $status;
    public $completed = [];
    public $enroll = [];
    public function checkTheIds($id, $isCompleted)
    {
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

    public function mount()
    {
        $active = ActiveSyandSem::first();
        $semester_id =           $active->active_sem_id;
        $specialization_id = $this->student->enrollment->specialization_id;
        $gradelevel_id = $this->student->enrollment->gradelevel_id;
        $this->coreSubjects = Subject::with('gradeLevel')->where('grade_level_id', $gradelevel_id)
            ->where('specialization_id', $specialization_id)
            ->where('type', 'Core')
            ->where('semester_id', $semester_id)
            ->get();
        $this->appliedSpecializedSubjects = Subject::with('gradeLevel')->where('grade_level_id', $gradelevel_id)
            ->where('specialization_id', $specialization_id)
            ->where('type', 'Applied and Specialized Subjects')
            ->where('semester_id', $semester_id)
            ->get();
        $this->status = 0;
        $this->semester = ($semester_id ==  1) ? 'First Semester' : 'Second Semester';
    }
    public function render()
    {
        return view('livewire.enroll-student-subject');
    }
}
