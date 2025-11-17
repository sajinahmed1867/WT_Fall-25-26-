<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Lab 2 – Participant Registration & Activity Selection</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #e8f0ff;
        padding: 20px;
    }
    .container {
        width: 400px;
        margin: auto;
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        margin-bottom: 35px;
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    input {
        width: 100%;
        padding: 8px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    button {
        padding: 8px 15px;
        background: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }
    button:hover {
        background: #005fcc;
    }
    .success-box {
        background: #d6f5d6;
        padding: 15px;
        border-radius: 5px;
        margin-top: 15px;
        border: 1px solid green;
    }
    .activity-item {
        display: flex;
        justify-content: space-between;
        background: #f5f5f5;
        padding: 8px;
        border-radius: 5px;
        margin-top: 8px;
    }
    .remove-btn {
        background: red;
        color: white;
        padding: 3px 8px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
</head>
<body>

<!-- ================= Registration Section ================= -->

<div class="container">
    <h2>Participant Registration</h2>

    <input id="fullname" type="text" placeholder="Full Name">
    <input id="email" type="text" placeholder="Email">
    <input id="phone" type="text" placeholder="Phone Number">
    <input id="password" type="password" placeholder="Password">
    <input id="confirm" type="password" placeholder="Confirm Password">

    <button onclick="register()">Register</button>

    <div id="result"></div>
</div>

<!-- ================= Activity Selection Section ================= -->

<div class="container">
    <h2>Activity Selection</h2>

    <input id="activityInput" type="text" placeholder="Activity Name">
    <button onclick="addActivity()">Add Activity</button>

    <div id="activityList"></div>
</div>

<script>
// ---------------- Registration Validation ----------------

function register() {
    let name = document.getElementById("fullname").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let pass = document.getElementById("password").value;
    let confirm = document.getElementById("confirm").value;

    // Validation
    if (!name || !email || !phone || !pass || !confirm) {
        alert("All fields are required!");
        return;
    }
    if (!email.includes("@")) {
        alert("Email must contain @");
        return;
    }
    if (!/^\d+$/.test(phone)) {
        alert("Phone must contain only digits!");
        return;
    }
    if (pass !== confirm) {
        alert("Passwords do not match!");
        return;
    }

    // Display success message
    document.getElementById("result").innerHTML = `
        <div class="success-box">
            <strong>Registration Successful!</strong><br>
            Name: ${name}<br>
            Email: ${email}<br>
            Phone: ${phone}
        </div>
    `;
}

// ---------------- Activity List Manipulation ----------------

function addActivity() {
    let activity = document.getElementById("activityInput").value.trim();
    if (activity === "") {
        alert("Please enter an activity name!");
        return;
    }

    let listDiv = document.getElementById("activityList");

    // Create activity item
    let item = document.createElement("div");
    item.className = "activity-item";

    item.innerHTML = `
        <span>${activity}</span>
        <button class="remove-btn" onclick="this.parentElement.remove()">Remove</button>
    `;

    listDiv.appendChild(item);
    document.getElementById("activityInput").value = "";
}
</script>

</body>
</html>