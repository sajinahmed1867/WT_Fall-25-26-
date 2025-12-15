<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Name Validation Form</title>
    <style>
        body {
            font-family: Arial;
            margin: 40px;
        }
        input {
            padding: 8px;
            width: 250px;
        }
        .error {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<h3>NAME</h3>

<form onsubmit="return validateName()">
    <input type="text" id="name" placeholder="Enter your name">
    <br><br>
    <input type="submit" value="Submit">
    <div id="error" class="error"></div>
</form>

<script>
function validateName() {
    const name = document.getElementById("name").value.trim();
    const error = document.getElementById("error");

    // Rule A: Cannot be empty
    if (name === "") {
        error.innerHTML = "Name cannot be empty";
        return false;
    }

    // Rule C & D: Must start with letter, allowed characters only
    const pattern = /^[A-Za-z][A-Za-z .-]*$/;
    if (!pattern.test(name)) {
        error.innerHTML = "Name must start with a letter and contain only A-Z, a-z, space, . or -";
        return false;
    }

    // Rule B: At least two words
    const words = name.split(/\s+/);
    if (words.length < 2) {
        error.innerHTML = "Name must contain at least two words";
        return false;
    }

    error.innerHTML = "";
    alert("Form submitted successfully!");
    return true;
}
</script>

</body>
</html>
