function validateAddForm(){
    // alert("Validating");
    let errorElements = document.getElementsByClassName("error");
    // alert(JSON.stringify(errorElements));
    for (var i = 0; i < errorElements.length; i++){
        errorElements.item(i).innerHTML = "";
    }
    // alert("Validating");
    // Get all values from document we want to verify
    let employeeID = document.getElementById("employeeID").value;
    let employeeName = document.getElementById("employeeName").value;
    let employeeAddress = document.getElementById("employeeAddress").value;
    let employeeSalary = document.getElementById("employeeSalary").value;
    let employeeDoB = document.getElementById("employeeDoB").value;
    let employeeNiN = document.getElementById("employeeNiN").value;
    let employeeDepartment = document.getElementById("employeeDepartment").value;
    let employeeEmergencyName = document.getElementById("employeeEmergencyName").value;
    let employeeEmergencyRelationship = document.getElementById("employeeEmergencyRelationship").value;
    let employeeEmergencyPhone = document.getElementById("employeeEmergencyPhone").value;

    // Return false if any of the fields are empty
    if(employeeID == ""){
        document.getElementById("errorID").innerHTML = "Please enter the employee's ID<br>";
        return false;
    } if(employeeName == ""){
        document.getElementById("errorName").innerHTML = "Please enter the employee's Name<br>";
        return false;
    }
    if(employeeAddress == ""){
        document.getElementById("errorAddress").innerHTML = "Please enter the employee's House Address<br>";
        return false;
    }
    if(employeeSalary == ""){
        document.getElementById("errorSalary").innerHTML = "Please enter the employee's Salary<br>";
        return false;
    }
    if(employeeDoB == ""){
        document.getElementById("errorDoB").innerHTML = "Please enter the employee's Date of Birth<br>";
        return false;
    }
    if(employeeNiN == ""){
        document.getElementById("errorNiN").innerHTML = "Please enter the employee's National Insurance Number<br>";
        return false;
    }
    if(employeeDepartment == "------"){
        document.getElementById("errorDepartment").innerHTML = "Please enter the employee's Department<br>";
        return false;
    }
    if(employeeEmergencyName == ""){
        document.getElementById("errorEmergencyName").innerHTML = "Please enter the employee's Emergency Contact's Name<br>";
        return false;
    }
    if(employeeEmergencyRelationship == ""){
        document.getElementById("errorEmergencyRelationship").innerHTML = "Please enter the employee's Relationship with their emergency contact<br>";
        return false;
    }
    if(employeeEmergencyPhone == ""){
        document.getElementById("errorEmergencyPhone").innerHTML = "Please enter the employee's Emergency Contact's Phone Number<br>";
        return false;
    }
}

function validateUpdateForm(){
    // Refresh all error messages
    let errorElements = document.getElementsByClassName("error");
    for (var i = 0; i < errorElements.length; i++){
        errorElements.item(i).innerHTML = "";
    }
    
    // Get all values from document we want to verify
    let employeeName = document.getElementById("employeeName").value;
    let employeeAddress = document.getElementById("employeeAddress").value;
    let employeeSalary = document.getElementById("employeeSalary").value;
    let employeeDoB = document.getElementById("employeeDoB").value;
    let employeeNiN = document.getElementById("employeeNiN").value;
    let employeeDepartment = document.getElementById("employeeDepartment").value;
    let employeeEmergencyName = document.getElementById("employeeEmergencyName").value;
    let employeeEmergencyRelationship = document.getElementById("employeeEmergencyRelationship").value;
    let employeeEmergencyPhone = document.getElementById("employeeEmergencyPhone").value;

    // Return false if any of the fields are empty
    if(employeeName == ""){
        document.getElementById("errorName").innerHTML = "Please enter the employee's Name<br>";
        return false;
    }
    if(employeeAddress == ""){
        document.getElementById("errorAddress").innerHTML = "Please enter the employee's House Address<br>";
        return false;
    }
    if(employeeSalary == ""){
        document.getElementById("errorSalary").innerHTML = "Please enter the employee's Salary<br>";
        return false;
    }
    if(employeeDoB == ""){
        document.getElementById("errorDoB").innerHTML = "Please enter the employee's Date of Birth<br>";
        return false;
    }
    if(employeeNiN == ""){
        document.getElementById("errorNiN").innerHTML = "Please enter the employee's National Insurance Number<br>";
        return false;
    }
    if(employeeDepartment == "------"){
        document.getElementById("errorDepartment").innerHTML = "Please enter the employee's Department<br>";
        return false;
    }
    if(employeeEmergencyName == ""){
        document.getElementById("errorEmergencyName").innerHTML = "Please enter the employee's Emergency Contact's Name<br>";
        return false;
    }
    if(employeeEmergencyRelationship == ""){
        document.getElementById("errorEmergencyRelationship").innerHTML = "Please enter the employee's Relationship with their emergency contact<br>";
        return false;
    }
    if(employeeEmergencyPhone == ""){
        document.getElementById("errorEmergencyPhone").innerHTML = "Please enter the employee's Emergency Contact's Phone Number<br>";
        return false;
    }
}

function validateChooseUpdateEmployee(){
    // Refresh all error messages
    let errorElements = document.getElementsByClassName("error");
    for (var i = 0; i < errorElements.length; i++){
        errorElements.item(i).innerHTML = "";
    }

    let eChangeID = document.getElementById("changeEmployeeID").value;
    let eIDRegex = /\d{2}-\d{7}/;

    // Check if employee ID field is populated
    if (eChangeID == ""){
        document.getElementById("errorChangeEmployeeID").innerHTML = "Please enter an employee's ID to proceed";
        return false;
    }
    // Check if length of employee ID field is 10
    else if (!eIDRegex.test(eChangeID)){
        document.getElementById("errorChangeEmployeeID").innerHTML = "Employee ID is in the wrong format of \"00-0000000\"";
        return false;
    }
    return true;
}

function validateChooseDeleteEmployee(){
    // Refresh all error messages
    let errorElements = document.getElementsByClassName("error");
    for (var i = 0; i < errorElements.length; i++){
        errorElements.item(i).innerHTML = "";
    }

    let eChangeID = document.getElementById("deleteEmployeeID").value;
    let eIDRegex = /\d{2}-\d{7}/;

    // Check if employee ID field is populated
    if (eChangeID == ""){
        document.getElementById("errorDeleteEmployeeID").innerHTML = "Please enter an employee's ID to proceed";
        return false;
    }
    // Check if length of employee ID field is 10
    else if (!eIDRegex.test(eChangeID)){
        document.getElementById("errorDeleteEmployeeID").innerHTML = "Employee ID is in the wrong format of \"00-0000000\"";
        return false;
    }
    return true;
}

function clearErrors(item){
    item.innerHTML = "";
}