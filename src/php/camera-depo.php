<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check Deposit (Camera)</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
</head>
<body>
<div id="camera-container"></div>
<button id="capture-button">Capture Check</button>
<canvas id="captured-img" style="display: none;"></canvas>
<div id="check-info">
    <-- Manual check info verification!-->
    <p>Enter Check Information:</p>
    <label for="account-name">Account Name:</label>
    <input type="text" id="account-name" required><br>
    <label for="date">Date:</label>
    <input type="date" id="date" required><br>
    <label for="amount">Amount:</label>
    <input type="number" id="amount" required><br>
    <label for="payee">Payee:</label>
    <input type="text" id="payee" required><br>
    <label for="check-number">Check Number:</label>
    <input type="text" id="check-number" required><br>
    <br>
    <input type="checkbox" id="legible-check" required>
    <label for="legible-check">By clicking this, I am acknowledging that all information on the check is legible in the picture.</label><br>
    <button id="submit-button" disabled>Submit Deposit</button>
</div>

    <--! JS for camera application -->
<script>
    const webcamElement = document.getElementById('camera-container');
    const captureButton = document.getElementById('capture-button');
    const capturedImage = document.getElementById('captured-img');
    const submitButton = document.getElementById('submit-button');
    const legibleCheckbox = document.getElementById('legible-check');

    let webcam = null;

    function startWebcam() {
        webcam = new Webcam(webcamElement, 'user');
        webcam.start()
            .then(() => console.log("webcam started"))
            .catch((err) => console.error(err));
    }

    startWebcam();

    captureButton.addEventListener('click', () => {
        webcam.snap()
            .then(data_url => {
                // Flip webcam for non-backwards text
                capturedImage.getContext('2d').drawImage(webcam.flip(), 0, 0);
                capturedImage.src = data_url;
                capturedImage.style.display = 'block';
            })
            .catch(err => console.error(err));
    });

    // Use checkbox status to toggle submit button
    legibleCheckbox.addEventListener('change', () => {
        submitButton.disabled = !legibleCheckbox.checked;
    });

    submitButton.addEventListener('click', () => {
        console.log("Submitting check information...");
        console.log("Account Name:", document.getElementById('account-name').value);
        console.log("Date:", document.getElementById('date').value);
        console.log("Amount:", document.getElementById('amount').value);
        console.log("Payee:", document.getElementById('payee').value);
        console.log("Check Number:", document.getElementById('check-number').value);
        //  to-do (backend): Send captured image data and form data for verification on-click
    });
</script>
</body>
</html>