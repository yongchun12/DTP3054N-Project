<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AttendanceExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //How to get the data from the database
        $attendance = Attendance::leftJoin('users', 'attendance.employee_id', 'users.id')
            ->select('attendance.*', 'users.name')
            ->get();

        return $attendance;
    }

    protected $index = 0;

    public function map($data): array
    {

        //Calculate Duration
        $time1 = new \DateTime($data->time_in);
        $time2 = new \DateTime($data->time_out);
        $interval = $time1->diff($time2);

        $duration = $interval->format('%h')." Hours ".$interval->format('%i')." Minutes";

        //Parse to selected date
        $created_at = \Carbon\Carbon::parse($data->created_at)->format('d-F-Y h:i A');
        $updated_at = \Carbon\Carbon::parse($data->updated_at)->format('d-F-Y h:i A');

        return [
            ++$this->index,
            $data->id,
            $data->name,
            date('d-M-Y', strtotime($data->date)),
            date('h:i:s A', strtotime($data->time_in)),
            date('h:i:s A', strtotime($data->time_out)),
            $duration,
            $created_at,
            $updated_at,
        ];
    }

    //Excel Headings (Title)
    public function headings(): array
    {
        return [
            "No.",
            "Table ID",
            "Name",
            "Date",
            "Punch In Time",
            "Punch Out Time",
            "Created At",
            "Updated At",
        ];
    }
}
