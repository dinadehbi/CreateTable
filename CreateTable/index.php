<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CreateTable</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: cursive;
        }
        body{
            background-color: #f0f5f5;
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        } 
        header{
            height: 500px;
            width: 450px;
            background-color: white;
            border-radius: 10px;
        }
        form{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        div{
            height: 50px;
            width: 450px;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
      
        }
        #container{
            height: auto;
            width: auto;
            background-color: red;
            
        }
        button{
            background-color: #99ebff;
            border-radius: 5px;
            border: none;
            font-size: 16px;   
            height: 40px;
            width: 150px;    
         }
        button:hover{
           box-shadow: 0px 0px 10px 1px rgba(0, 0, 0, 0.2);
        }
      input{
        box-shadow: 0px 0px 10px 1px rgba(0, 0, 0, 0.2);
        border: none;
        height: 30px;
        border-radius: 5px;
        width: 220px;
      }
      h1{
        color: #99ebff;
      }
      #span1{
       color:  #00e673;
      }
      #span2{
       color: red;
       font-size: 12px;
       text-align: center;
      }
    </style>
</head>
<body>
<?php

$display = $display2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ana";
    $tablename = $_POST['nameTable']; 
    //column varible
    $column1 = $_POST['column1'];
    $column2 = $_POST['column2'];
    $column3 = $_POST['column3'];
    $column4 = $_POST['column4'];
    //select
    $select1 = $_POST['select1'];
    $select2 = $_POST['select2'];
    $select3 = $_POST['select3'];
    $select4 = $_POST['select4'];
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE $tablename (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        $column1 $select1 NOT NULL,
        $column2 $select2 NOT NULL,
        $column3 $select3 NOT NULL,
        $column4 $select4,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
            $conn->exec($sql);
        $display = "Table '$tablename' created successfully";
    } catch(PDOException $e) {
        $display2 =  $sql . "<br>" . $e->getMessage();
    }
    
    $conn = null;
}


?> 
<span id="span1"><?php echo $display?></span>
<span id="span2"><?php echo $display2?></span>
<br>
    <header>
    <form action="index.php" method="post">
        <br>
        <h1>Create Table in Database</h1><br>
        <div>
        <label for="">Name of table:</label>
        <input type="text" name="nameTable" required><br>
        </div>
        <div>
        <label for="">Column1:</label>
        <input type="text" name="column1" required>
        <select name="select1">
            <option>INT</option>
            <option>FLOAT</option>
            <option>VARCHAR</option>
            <option>DATETIME</option>
        </select>
        </div>
        <br>
        <div>
        <label for="">Column2:</label>
        <input type="text" name="column2" required>
        <select name="select2">
            <option>INT</option>
            <option>FLOAT</option>
            <option>VARCHAR</option>
            <option>DATETIME</option>
        </select>
        </div>
        <br>
        <div>
        <label for="">Column3:</label>
        <input type="text" name="column3" required>
        <select name="select3">
            <option>INT</option>
            <option>FLOAT</option>
            <option>VARCHAR</option>
            <option>DATETIME</option>
        </select>
        </div>
        <br>
        <div>
        <label for="">Column4:</label>
        <input type="text" name="column4" required>
        <select name="select4">
            <option>INT</option>
            <option>FLOAT</option>
            <option>VARCHAR</option>
            <option>DATETIME</option>
            <option>TEXT</option>
        </select>
        </div>
        <br>
        <button type="submit" name="submit">Create Table</button>
        <br><br>
    </form>
    </header>
</body>
</html>