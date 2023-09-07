<?php

namespace App\Http\Livewire\ClassSchedule;

use App\Models\EMS\Section;
use App\Models\Schedule;
use App\Models\Subject;
use Livewire\Component;

class AddSchedule extends Component
{
    public $specializations, $teachers, $sections, $subjects, $schedules, $semesters, $days;
    public $specialization_id, $teacher_id, $section_id, $subject_id, $schedule_id, $semester_id, $selected_day;
    public $start_time, $end_time;

    public function updatedSpecializationId($value)
    {
        $this->subjects = Subject::where('specialization_id', $value)->get();
        $this->sections = Section::where('specialization_id', $value)->get();
        if ($this->semester_id) {
            $this->subjects = Subject::where('specialization_id', $value)->where('semester_id', $this->semester_id)->get();
        }
    }
    public function updatedSemesterId($value)
    {
        $this->subjects = Subject::where('specialization_id', $this->specialization_id)->where('semester_id', $value)->get();
    }
    public function updatedSelectedDay($value)
    {

        $this->days[] = $value;
        if ($value == 'All') {
            // reset days
            $this->days = collect([]);
            $this->days = collect([
                'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'
            ]);
        }
        $this->sortDays();
    }

    private function sortDays()
    {
        $daysOfWeek = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
        $sorted = collect();
        foreach ($this->days as $k => $v) {
            $key = array_search($v, $daysOfWeek);
            if ($key !== FALSE) {
                $sorted[$key] = $v;
            }
        }
        $sorted->sortKeys();
        $this->days = $sorted;
    }
    public function removeDay($index)
    {
        try {
            $this->days->forget($index);
            $this->reset('selected_day');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
    public function save()
    {
        try {
            $this->validate([
                'specialization_id' => 'required',
                'semester_id' => 'required',
                'teacher_id' => 'required',
                'section_id' => 'required',
                'subject_id' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
            ]);
            $days = '';
            $totalCount = $this->days->count();

            foreach ($this->days as $key => $day) {
                if ($totalCount > 1) {
                    if ($key < $totalCount - 1) {
                        $days .= $day . ', ';
                    } else {
                        $days .= 'and ' . $day;
                    }
                } else {
                    $days .= $day->day;
                }
            }

            // $days now contains the formatted string of days



            Schedule::create([
                'teacher_id' => $this->teacher_id,
                'subject_id' => $this->subject_id,
                'section_id' => $this->section_id,
                'days' => $days,
                'start_time' => $this->start_time,
                'end_time' => $this->end_time,
            ]);
            $this->reset();
            return redirect(request()->header('Referer'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
    public function mount()
    {
        $this->days = collect();
        $this->specialization_id = null;
        $this->semester_id = null;
    }
    public function render()
    {
        return view('livewire.class-schedule.add-schedule');
    }
}
