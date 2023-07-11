<?php

namespace App\Imports;

use App\Models\SchoolYear;
use App\Models\Specialization;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        try {
            $address = $row['house_nostreet'] . ' ' . $row['purok'] . ' ' . $row['barangay'] . ', ' . $row['municipality'] . ', ' . $row['province'];
            $specialization = Specialization::where('name', $row['specialization'])->first();
            $schoolYear = SchoolYear::where('name', $row['enroll_for_school_year'])->first();

            $student = Student::where('student_lrn', $row['lrn_learners_reference_number'])->first();

            if ($student) {
                $student->update([
                    'student_lrn' => $row['lrn_learners_reference_number'],
                    'student_number' => $row['student_number'] ?? null,
                    'last_name' => $row['last_name'],
                    'first_name' => $row['first_name'],
                    'middle_name' => $row['middle_name'],
                    'extension' => $row['extension_name'],
                    'age' => $row['age'],
                    'sex' => $row['sex'],
                    'birth_date' => $this->parseBirthDate($row['birthdate']),
                    'contact_num' => $row['contact_no_of_student'],
                    'address' => $address,
                    'specialization_id' => $specialization ? $specialization->id : null,
                    'sy_id' => $schoolYear ? $schoolYear->id : null,
                ]);

                return $student;
            } else {
                return new Student([
                    'student_lrn' => $row['lrn_learners_reference_number'],
                    'student_number' => $row['student_number'] ?? null,
                    'last_name' => $row['last_name'],
                    'first_name' => $row['first_name'],
                    'middle_name' => $row['middle_name'],
                    'extension' => $row['extension_name'],
                    'age' => $row['age'],
                    'sex' => $row['sex'],
                    'birth_date' => $this->parseBirthDate($row['birthdate']),
                    'contact_num' => $row['contact_no_of_student'],
                    'address' => $address,
                    'specialization_id' => $specialization ? $specialization->id : null,
                    'sy_id' => $schoolYear ? $schoolYear->id : null,
                ]);
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }

    private function parseBirthDate($date)
    {
        $timestamp = strtotime($date);
        $sqlDate = date('Y-m-d', $timestamp);
        return $sqlDate;
    }
}
