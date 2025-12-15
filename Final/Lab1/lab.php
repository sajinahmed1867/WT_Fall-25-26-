 <?php
   $name="";
   $errormsg="";
   ?>
 
 <!DOCTYPE html>
<html>
    <head>
        <title>Lab 1</title>
        <style>
            div{
           border: 2px solid black;
           width: 250px;
           padding:10px;
           margin:auto;
            }
 </style>     
</head>
<body>

<from action="lab1.php" method="post">
    <div>
        <h3>Name</h3>
        <input type="text" name="name">
        <hr>
        <input type="submit" name="submit">

      </div>
   </from>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
     $name= trim ( $post["name"]);
     if(empty($name)){ 
        echo "Name cannot be empty";
     }

         elseif(str_word_count(string: $name)<2){
        echo "Name must have atleast 2 word";
         }
         elseif(!preg_match ("/^[a-ZA-Z .-]+$/",$name)){
            echo "Name can contain a-z, A-z,period,dash only";

         }
         else{
            echo "valid Name";
         }



}
?>
</body>
<html>