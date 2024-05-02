const socialSecurityNumberInput = document.getElementById('social_security_number');
let previousValue = ''; // Store the previous value

socialSecurityNumberInput.addEventListener('input', function() {
    const newValue = this.value;

    // Only update the displayed value if the length is greater than 9 (full SSN)
    if (newValue.length >= 9) {
        const maskedValue = newValue.slice(-4).padStart(9, '*');
        this.value = maskedValue;
    }

    // Update previousValue for comparison regardless of length
    previousValue = newValue;
});