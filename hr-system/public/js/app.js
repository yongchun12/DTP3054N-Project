//Calculate the difference between two dates (Leave Request)
function dateDifference() {
    const firstDate = document.getElementById('from_leaveDate').value;
    const secondDate = document.getElementById('to_leaveDate').value;

    const startTimestamp = Date.parse(firstDate);
    const endTimestamp = Date.parse(secondDate);

    const difference = endTimestamp - startTimestamp;

    const daysDifference = Math.round(difference / (1000 * 60 * 60 * 24));

    const dayCountComponent = document.getElementById('dayCount');
    dayCountComponent.innerHTML = daysDifference + " Days";
}

//Min Date for Leave Request (From Date)
function updateToDateMin() {
    var fromDate = document.getElementById('from_leaveDate').value;
    document.getElementById('to_leaveDate').min = fromDate;
}

//Max Date for Leave Request (To Date)
function updateToDateMax() {
    var toDate = document.getElementById('to_leaveDate').value;
    document.getElementById('from_leaveDate').max = toDate;
}

