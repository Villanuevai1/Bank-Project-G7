function validateForm() {
    var isValid = true;  // Assume form is valid initially

    var firstName = document.getElementById('first_name').value;
    if (firstName.trim() === "") {
        document.getElementById('first_name_error').innerText = 'First name is required.';
        isValid = false;
    }
    // Continue checks for other fields...

    return isValid;  // Only true if all fields pass validation
}