<?php

namespace App\Exports;

use App\Models\PayrollModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PayrollsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $payrolls = PayrollModel::leftJoin('users', 'payroll.employee_id', 'users.id')
            ->select('payroll.*', 'users.name as employee_name')
            ->get();

        return $payrolls;
    }

    protected $index = 0;

    public function map($user): array
    {
        $created_at = \Carbon\Carbon::parse($user->created_at)->format('d-F-Y h:i A');
        $updated_at = \Carbon\Carbon::parse($user->updated_at)->format('d-F-Y h:i A');

        return [
            ++$this->index,
            $user->id,
            $user->employee_name,
            $user->number_of_day_work,
            $user->bonus,
            $user->overtime,
            $user->gross_salary,
            $user->cash_advance,
            $user->late_hours,
            $user->absent_days,
            $user->philhealth,
            $user->total_deductions,
            $user->netpay,
            $user->payroll_monthly,
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
            "Number of Day Work",
            "Bonus",
            "Overtime",
            "Gross Salary",
            "Cash Advance",
            "Late Hours",
            "Absent Days",
            "Philhealth",
            "Total Deductions",
            "Netpay",
            "Payroll Monthly",
            "Created At",
            "Updated At",
        ];
    }
}
