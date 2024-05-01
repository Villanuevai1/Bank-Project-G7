// JavaScript for toggling the visibility of the PIN input
const toggle = document.getElementById('togglePassword');
const pinInput = document.getElementById('pinInput');

toggle.addEventListener('click', function() {
    // Toggle between password and text type on click
    if (pinInput.type === "password") {
        pinInput.type = "text";
        // Changes button text to "Hide PIN"
        toggle.textContent = "Hide PIN";
    } else {
    pinInput.type = "password";
    toggle.textContent = "Show PIN";// Changes button text back to "Show PIN"
    }
});