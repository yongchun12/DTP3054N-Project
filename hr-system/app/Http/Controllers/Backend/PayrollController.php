<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PayrollModel;
use App\Models\User;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PayrollExport;

class PayrollController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = PayrollModel::getRecord();
        return view('admin.payroll.list', $data);
    }

    public function payroll_export(Request $request)
    {
        return Excel::download(new PayrollExport, 'Payroll.xlsx');
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

        return redirect('admin/payroll')->with('success', 'Payroll Record has been created successfully!');

    }

    public function view($id)
    {
        #get the record by id
        $data['getRecord'] = PayrollModel::find($id);
        return view('admin.payroll.view', $data);
    }

    public function edit($id, Request $request)
    {
        #If that is belongs to employee role
        $data['getEmployee'] = User::where('is_role', '=', 0)->get();

        #Or if want to get all the record include HR and employees can use this
//        $data['getEmployee'] = User::select('users.*')->get();

        $data['getRecord'] = PayrollModel::find($id);
        return view('admin.payroll.edit', $data);
    }

    public function edit_update($id, Request $request)
    {
        //Show the details / preview of the form
//        dd($request->all());

        $user = PayrollModel::find($id);

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

        return redirect('admin/payroll')->with('success', 'Payroll Record has been updated successfully!');
    }

    public function delete($id)
    {
        $recordDelete = PayrollModel::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', 'Payroll Record has been deleted successfully!');
    }

    public function salary_pdf()
    {
        return view('admin.payroll.salaryview');
    }

}

?>
