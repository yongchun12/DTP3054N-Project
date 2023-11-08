<?php

namespace App\Http\Controllers\Backend;

use App\Exports\PayrollExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PayrollModel;
use App\Models\User;
use Auth;

use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

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
        $user->gross_salary         = trim($request->gross_salary);
        $user->number_of_day_work   = trim($request->number_of_day_work);
        $user->bonus                = trim($request->bonus);
        $user->overtime_hours       = trim($request->overtime_hours);
        $user->absent_days          = trim($request->absent_days);
        $user->medical_allowance    = trim($request->medical_allowance);
        $user->other_allowance      = trim($request->other_allowance);
        $user->total_deductions     = trim($request->total_deductions);
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
        $user->gross_salary         = trim($request->gross_salary);
        $user->number_of_day_work   = trim($request->number_of_day_work);
        $user->bonus                = trim($request->bonus);
        $user->overtime_hours       = trim($request->overtime_hours);
        $user->absent_days          = trim($request->absent_days);
        $user->medical_allowance    = trim($request->medical_allowance);
        $user->other_allowance      = trim($request->other_allowance);
        $user->total_deductions     = trim($request->total_deductions);
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

    public function salary_pdf($id, Request $request)
    {
        $data['getEmployee'] = User::where('is_role', '=', 0)->get();
        $data['getRecord'] = PayrollModel::find($id);
        return view('admin.payroll.salaryview', $data);
    }

    public function index_employeeSite(Request $request)
    {
        $data['getRecord'] = PayrollModel::getRecord();

        #Auth::user()->id is check for the current section of the user
        $payrolls = PayrollModel::where('employee_id', '=', Auth::user()->id)
            ->select('payroll.*')
            //If got paginate, then no need to use get() to get the data
            ->paginate(10);

        return view('employee.payroll.list', $data, compact('payrolls'));
    }

    public function view_employeeSite($id){
        #get the record by id
        $data['getRecord'] = PayrollModel::find($id);
        return view('employee.payroll.view', $data);
    }

    public function salary_pdf_employeeSite($id, Request $request)
    {
        $data['getEmployee'] = User::where('is_role', '=', 0)->get();
        $data['getRecord'] = PayrollModel::find($id);
        return view('employee.payroll.salaryview', $data);
    }
}
