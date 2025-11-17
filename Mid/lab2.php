<DOCTYPE html>
<html lang ="en">

 <head>
<meta charset = "UTF-8">
<title>participant registration and activity selection</title>
<style>
          body {
            font-family: Arial, sans-serif;
                background :  #e8f0ff ;
                padding: 20 px;
               }

           .container {
            width: 400px;
            margin : auto;
            background : white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba (0,0,0.1)
            margin - buttom : 35px;
           }  
            h2{
                text-align: center;
                margin - bottom: 20px;


            }
            input{

                width:100%;
                padding: 8px;
                margin: 8px 0;
                border : 1px solid #ccccccff;
                border -radius : 5px;
            }
            bottom {

                padding: 8px 15px;
                background: rgba(75, 0, 119, 0.73);
                color:white;
                border :none;
                border radius: 5px;
                cursor: pointer;
                margin-top :10px;
            }
             button:hover {
                background: rgba(0, 20, 85, 1);
             }
             .success-box {
                background :#d6f5d6;
                padding :15 px;
                border-radius:5px;
                margin-top:15px;
                border:1px solid green;

             }

             .activity-item {
        display: flex;
        justify-content: space-between;
        background: #f5f5f5ff;
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

<div class="container">
    <h2>Participant Registration</h2>

    <input id="fullname" type="full name" placeholder="sajin ahamed">
    <input id="email" type="email" placeholder="sajinahamed1700@gmail.com">
    <input id="phone" type="phone" placeholder="01996331867">
    <input id="password" type="password" placeholder="1234">
    <input id="confirm" type="confirm password" placeholder="1234">

    <button onclick="register()">Register</button>

    <div id="result"></div>
</div>
             
 
             <div class="container">
    <h2>Activity Selection</h2>

    <input id="activityInput" type="add activity" placeholder="sajin ahamed">
    <button onclick="addActivity()">Add Activity</button>

    <div id="activityList"></div>
</div>

<script>
    function register() {
    let name = document.getElementById("fullname").value.trim();
    let email = document.getElementById("email").value.trim();
    let phone = document.getElementById("phone").value.trim();
    let pass = document.getElementById("password").value;
    let confirm = document.getElementById("confirm").value;

    
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


           
           




           
           </script>
           </body>
           </html>