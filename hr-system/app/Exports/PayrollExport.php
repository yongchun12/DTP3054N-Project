<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use MaatWebsite\Excel\Concerns\ShouldAutoSize;
use MaatWebsite\Excel\Concerns\WithMapping;
use MaatWebsite\Excel\Concerns\WithHeadings;
use Request;
use App\Models\PayrollModel;

class PayrollExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    public function collection()
    {
        $request = Request::all();
        return PayrollModel::getRecord($request);
    }

    protected $index = 0;

    public function map($user):array
    {

        $createdAt = date('d-F-Y h:i A', strtotime($user->created_at));
        $updatedAt = date('d-F-Y h:i A', strtotime($user->updated_at));

        return[
            ++$this->index,
            $user->id,
            $user->name,
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
            $createdAt,
            $updatedAt
        ];
    }

    public function headings():array
    {
        return[
            'S.No',
            'Table ID',
            'Employee Name',
            'Number of Day Work',
            'Bonus',
            'Overtime',
            'Gross Salary',
            'Cash Advance',
            'Late Hours',
            'Absent Days',
            'Medical Allowance',
            'Total Deductions',
            'Netpay',
            'Payroll Monthly',
            'Created At',
            'Last Updated',
        ];

    }

}

?>
