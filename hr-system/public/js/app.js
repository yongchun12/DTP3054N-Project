//---------------------------Dashboard--------------------------------//

//---------------------------Employee--------------------------------//
//Add EMP- Prefix to Staff ID (Employee Create Page)
function passStaffID() {
    let suffix = document.getElementById('suffix_staffID').value;

    let fullID = "EMP-" + suffix;

    document.getElementById('staff_id').value = fullID;
}

//Add email domain as a suffix (Employee Create Page)
function passEmail() {
    let prefix = document.getElementById('prefix_email').value;

    let fullEmail = prefix + "@hr-system.com";

    document.getElementById('email').value = fullEmail;
}



//---------------------------Attendance--------------------------------//
function calculateTimes() {
    var timeIn = document.getElementById('time_in').value;
    var timeOut = document.getElementById('time_out').value;
    var totalTime;

    // Check if times are valid
    if (!timeIn || !timeOut) {
        document.getElementById('timesCount').textContent = "0 Hours 0 Minutes";
    }

    //substring detect the first 2 characters start from 0
    var timeInHour = parseInt(timeIn.substring(0, 2));
    var timeInMinute = parseInt(timeIn.substring(3, 5));
    var timeOutHour = parseInt(timeOut.substring(0, 2));
    var timeOutMinute = parseInt(timeOut.substring(3, 5));

    // Convert times (include hours) to minutes since midnight
    var inMinutes = timeInHour * 60 + timeInMinute;
    var outMinutes = timeOutHour * 60 + timeOutMinute;

    // Handle crossing over midnight
    if (outMinutes < inMinutes) {
        outMinutes += 24 * 60; // Add 24 hours worth of minutes
    }

    var durationMinutes = outMinutes - inMinutes;
    // Use floor to round down to nearest hour
    var totalHours = Math.floor(durationMinutes / 60);
    // Use modulus operator to get minutes from remainder
    var totalMinutes = durationMinutes % 60;

    totalTime = totalHours + " Hours " + totalMinutes + " Minutes";
    //textContent is the correct property, not value, since this is not an input element
    document.getElementById('timesCount').textContent = totalTime; // Set textContent instead of value

}

//----------------------------Payroll--------------------------------//

//Calculate Total Deduction (Payroll Create/Edit Page)
function calculateDeduction() {

    var gross_salary = document.getElementById('gross_salary').value;

    //Calculate EPF
    let epf_rate = 0.11;
    var epf = gross_salary * epf_rate;

    document.getElementById('epf').value = epf.toFixed(2);

    //Calculate SOCSO
    let socso_rate = 0.005;
    var socso = gross_salary * socso_rate;

    document.getElementById('socso').value = socso.toFixed(2);

    //Calculate PCB
    let pcb_rate = 0.02;
    var pcb = gross_salary * pcb_rate;

    document.getElementById('pcb').value = pcb.toFixed(2);

    //Calculate Days Work and Leave
    let default_dayswork = 22;

    absent_days = document.getElementById('absent_days').value;

    document.getElementById('num_work').value = default_dayswork - absent_days;

    //Calculate Total Deduction
    var total_deduction = epf + socso + pcb + (gross_salary / default_dayswork) * absent_days;
    document.getElementById('total_deductions').value = total_deduction.toFixed(2);
}

//Calculate Total Allowance (Payroll Create/Edit Page)
function calculateAllowance() {
    let default_dayswork = 22;
    var gross_salary = parseFloat(document.getElementById('gross_salary').value);

    var bonus = parseFloat(document.getElementById('bonus').value);
    var medicare_allowance = parseFloat(document.getElementById('medical_allowance').value);
    var other_allowance = parseFloat(document.getElementById('other_allowance').value);

    // Calculate Overtime Hours
    var total_overtime = ((gross_salary / default_dayswork / 8 * 1.5) * parseFloat(document.getElementById('overtime').value));

    // Calculate Total Earning
    var subTotal_Salary = bonus + medicare_allowance + other_allowance + total_overtime + gross_salary;

    // Make sure 'total_allowance' element exists in your HTML
    var totalAllowance = document.getElementById('total_allowance');

    totalAllowance.value = subTotal_Salary.toFixed(2);

    var net_pay = subTotal_Salary - parseFloat(document.getElementById('total_deductions').value);

    document.getElementById('payroll_monthly').value = net_pay.toFixed(2);
}

//Calculate the difference between two dates (Leave Request - Employee Page)
function dateDifference() {

    const firstDate = document.getElementById('from_leaveDate').value;
    const secondDate = document.getElementById('to_leaveDate').value;

    // Convert input values to Date objects
    let firstDateObj = new Date(firstDate);
    let secondDateObj = new Date(secondDate);

    let days = 0;

    // Loop through each day from start to end date
    // Note that setDate() automatically increments the day value
    while (firstDateObj <= secondDateObj) {
        // Check if it's a weekday (Mon-Fri)
        if (firstDateObj.getDay() !== 0 && firstDateObj.getDay() !== 6) {
            days++;
        }
        // Move to the next day
        firstDateObj.setDate(firstDateObj.getDate() + 1);
    }

    // Update the day count display
    const dayCountComponent = document.getElementById('dayCount');
    dayCountComponent.innerHTML = days + " Days";

}

//----------------------------Leave--------------------------------//

//Min Date for Leave Request (From Date) - (Leave Request - Employee Page)
function updateToDateMin() {
    var fromDate = document.getElementById('from_leaveDate').value;
    document.getElementById('to_leaveDate').min = fromDate;
}

//Max Date for Leave Request (To Date) - (Leave Request - Employee Page)
function updateToDateMax() {
    var toDate = document.getElementById('to_leaveDate').value;
    document.getElementById('from_leaveDate').max = toDate;
}

