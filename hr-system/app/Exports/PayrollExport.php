<?php

namespace App\Exports;

use App\Models\PayrollModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PayrollExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //How to get the data from the database
        $payrolls = PayrollModel::leftJoin('users', 'payroll.employee_id', 'users.id')
            ->select('payroll.*', 'users.name as employee_name')
            ->get();

        return $payrolls;
    }

    protected $index = 0;

    public function map($data): array
    {
        $created_at = \Carbon\Carbon::parse($data->created_at)->format('d-F-Y h:i A');
        $updated_at = \Carbon\Carbon::parse($data->updated_at)->format('d-F-Y h:i A');

        return [
            ++$this->index,
            $data->id,
            $data->employee_name,
            $data->gross_salary,
            $data->number_of_day_work,
            $data->bonus,
            $data->overtime_hours,
            $data->absent_days,
            $data->medical_allowance,
            $data->total_deductions,
            $data->payroll_monthly,
            $created_at,
            $updated_at,
        ];
    }

    public function headings(): array
    {
        return [
            "S.No",
            "Table ID",
            "Employee Name",
            "Gross Salary",
            "Number of Day Work",
            "Bonus",
            "Overtime",
            "Absent Days",
            "Medical Allowance",
            "Total Deductions",
            "Payroll Monthly",
            "Created At",
            "Updated At",
        ];
    }
}
