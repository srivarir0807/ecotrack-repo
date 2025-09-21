<?php
    $name = $_POST['name'];
    $sentence = $_POST['random'];
    $gender = $_POST['gender'];
    $drink = $_POST['drink'];

    $host= "sql105.infinityfree.com";
    $username= "if0_39989842";
    $password= "g6qitHEkcO";
    $dbname= "if0_39989842_test_db";

    $conn = mysqli_connect(hostname: $host, 
                            username: $username,
                            password: $password, 
                            database: $dbname); 

    if(mysqli_connect_errno()){
        die("Connection error: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO informations (name, sentence, gender, drink) 
            VALUES (?, ?, ?, ?)";
           
    $stmt = mysqli_stmt_init($conn);
    
    if ( ! mysqli_stmt_prepare($stmt, $sql)) {
       die(mysqli_error($conn));
    }
    
    mysqli_stmt_bind_param($stmt, "ssss",
                          $name,
                          $sentence,
                          $gender,
                          $drink);

    mysqli_stmt_execute($stmt);
    exit();
