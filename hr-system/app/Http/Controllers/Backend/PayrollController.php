<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PayrollModel;
use App\Models\User;

class PayrollController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = PayrollModel::getRecord();
        return view('admin.payroll.list', $data);
    }

    public function create(Request $request)
    {
        #redirect to create page by using the name 'getEmployee'
        $data['getEmployee'] = User::where('is_role', '=', 0)->get();
        return view('admin.payroll.create', $data);
    }

    public function create_post(Request $request)
    {
//        dd($request->all());

        $user = new PayrollModel;
        $user->employee_id          = trim($request->employee_id);
        $user->number_of_day_work   = trim($request->number_of_day_work);
        $user->bonus                = trim($request->bonus);
        $user->overtime             = trim($request->overtime);
        $user->gross_salary         = trim($request->gross_salary);
        $user->cash_advance         = trim($request->cash_advance);
        $user->late_hours           = trim($request->late_hours);
        $user->absent_days          = trim($request->absent_days);
        $user->philhealth           = trim($request->philhealth);
        $user->total_deductions     = trim($request->total_deductions);
        $user->netpay               = trim($request->netpay);
        $user->payroll_monthly      = trim($request->payroll_monthly);

        $user->save();

        return redirect('admin/payroll')->with('message', 'Payroll Record has been created successfully!');

    }

    public function view($id)
    {
        $data['getRecord'] = PayrollModel::find($id);
        return view('admin.payroll.view', $data);
    }
}

?>
