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
    if(validateEmployeeID(employeeID, document.getElementById("errorID")) == false){
        return false;
    }
    if(validateEmployeeName(employeeName, document.getElementById("errorName")) == false){
        return false;
    }
    if(validateEmployeeAddress(employeeAddress, document.getElementById("errorAddress")) == false){
        return false;
    }
    if(validateEmployeeSalary(employeeSalary, document.getElementById("errorSalary")) == false){
        return false;
    }
    if(validateEmployeeDoB(employeeDoB, document.getElementById("errorDoB")) == false){
        return false;
    }
    if(validateEmployeeNiN(employeeNiN, document.getElementById("errorNiN")) == false){
        return false;
    }
    if(validateEmployeeDepartment(employeeDepartment, document.getElementById("errorDepartment")) == false){
        return false;
    }
    if(validateEmployeeEmergencyName(employeeEmergencyName, document.getElementById("errorEmergencyName")) == false){
        return false;
    }
    if(validateEmployeeEmergencyRelationship(employeeEmergencyRelationship, document.getElementById("errorEmergencyRelationship")) == false){
        return false;
    }
    if(validateEmployeeEmergencyPhone(employeeEmergencyPhone, document.getElementById("errorEmergencyPhone")) == false){
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
    if(validateEmployeeName(employeeName, document.getElementById("errorName")) == false){
        return false;
    }
    if(validateEmployeeAddress(employeeAddress, document.getElementById("errorAddress")) == false){
        return false;
    }
    if(validateEmployeeSalary(employeeSalary, document.getElementById("errorSalary")) == false){
        return false;
    }
    if(validateEmployeeDoB(employeeDoB, document.getElementById("errorDoB")) == false){
        return false;
    }
    if(validateEmployeeNiN(employeeNiN, document.getElementById("errorNiN")) == false){
        return false;
    }
    if(validateEmployeeDepartment(employeeDepartment, document.getElementById("errorDepartment")) == false){
        return false;
    }
    if(validateEmployeeEmergencyName(employeeEmergencyName, document.getElementById("errorEmergencyName")) == false){
        return false;
    }
    if(validateEmployeeEmergencyRelationship(employeeEmergencyRelationship, document.getElementById("errorEmergencyRelationship")) == false){
        return false;
    }
    if(validateEmployeeEmergencyPhone(employeeEmergencyPhone, document.getElementById("errorEmergencyPhone")) == false){
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
    if(validateEmployeeID(eChangeID, document.getElementById("errorChangeEmployeeID")) == false){
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

    let eID = document.getElementById('employeeID').value;
    let eChangeID = document.getElementById("deleteEmployeeID").value;
    if(validateEmployeeID(eID, document.getElementById("errorEmployeeID")) == false){
        return false;
    }
    if(validateEmployeeID(eChangeID, document.getElementById("errorDeleteEmployeeID")) == false){
        return false;
    }
    return true;
}

function validateEmployeeID(eID, spanElement){
    if(eID == ""){
        spanElement.innerHTML = "Please enter the employee's ID";
        return(false);
    }
    else{
        let eIDRegex = /^\d{2}\-\d{7}$/;
        if (!eIDRegex.test(eID)){
            spanElement.innerHTML = "Employee ID is in the wrong format '00-0000000'";
            return(false);
        }
    }
    return(true);
}



function validateEmployeeName(eName, spanElement){
    if(eName == ""){
        spanElement.innerHTML = "Please enter the employee's Name";
        return(false);
    }
    else{
        let eIDRegex = /^([A-Za-z]|\s|\')*$/;
        if (!eIDRegex.test(eName)){
            spanElement.innerHTML = "Employee Name should be text only<br>";
            return(false);
        }
    }
    return(true);
}

function validateEmployeeAddress(eAddress, spanElement){
    if(eAddress == ""){
        spanElement.innerHTML = "Please enter the employee's Address";
        return(false);
    }
    return(true);
}

function validateEmployeeSalary(eSalary, spanElement){
    if(eSalary == ""){
        spanElement.innerHTML = "Please enter the employee's Salary";
        return(false);
    }
    else{
        let eIDRegex = /^(\d)*(\.\d\d)?$/;
        if (!eIDRegex.test(eSalary)){
            spanElement.innerHTML = "Employee Salary should only be a two decimal number";
            return(false);
        }
    }
    return(true);
}

function validateEmployeeDoB(eDoB, spanElement){
    if(eDoB == ""){
        spanElement.innerHTML = "Please enter the employee's DoB";
        return(false);
    }
    // else{
    //     let eIDRegex = /^\d\d\/\d\d\/\d\d\d\d$/;
    //     if (!eIDRegex.test(eDoB)){
    //         spanElement.innerHTML = "Employee DoB should only be dd/mm/yyyy";
    //         return(false);
    //     }
    // }
    return(true);
}

function validateEmployeeNiN(eNiN, spanElement){
    if(eNiN == ""){
        spanElement.innerHTML = "Please enter the employee's NiN";
        return(false);
    }
    else{
        let eIDRegex = /^[A-Za-z][A-Za-z]\d{6}[A-Za-z]$/;
        if (!eIDRegex.test(eNiN)){
            spanElement.innerHTML = "Employee NiN should only be 'aa000000a'";
            return(false);
        }
    }
    return(true);
}

function validateEmployeeDepartment(eDepartment, spanElement){
    if(eDepartment == "------"){
        spanElement.innerHTML = "Please select the employee's Department";
        return(false);
    }
    return(true);
}

function validateEmployeeEmergencyName(eEmergencyName, spanElement){
    if(eEmergencyName == ""){
        spanElement.innerHTML = "Please enter the employee's Emergency Contact Name";
        return(false);
    }
    else{
        let eIDRegex = /^([A-Za-z]|\s)*$/;
        if (!eIDRegex.test(eEmergencyName)){
            spanElement.innerHTML = "Employee Emergency Contact name should only be text only";
            return(false);
        }
    }
    return(true);
}

function validateEmployeeEmergencyRelationship(eEmergencyRelationship, spanElement){
    if(eEmergencyRelationship == ""){
        spanElement.innerHTML = "Please enter the employee's Emergency Relationship";
        return(false);
    }
    else{
        let eIDRegex = /^([A-Za-z]|\s)*$/;
        if (!eIDRegex.test(eEmergencyRelationship)){
            spanElement.innerHTML = "Employee Emergency Relationship should only be text only";
            return(false);
        }
    }
    return(true);
}

function validateEmployeeEmergencyPhone(eEmergencyPhone, spanElement){
    if(eEmergencyPhone == ""){
        spanElement.innerHTML = "Please enter the employee's Emergency Phone Number";
        return(false);
    }
    else{
        let eIDRegex = /^(\d{5})\s(\d{3})\s(\d{3})$/;
        if (!eIDRegex.test(eEmergencyPhone)){
            spanElement.innerHTML = "Employee Emergency Phone Number should be 01234 567 890";
            return(false);
        }
    }
    return(true);
}

function validateFilterForm(){
    return true;
}

function clearErrors(item){
    item.innerHTML = "";
}