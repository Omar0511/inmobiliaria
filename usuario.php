<?php

    // Importar conexión
    require 'include/app.php';
    
    $db = conectarDB();

    $email = 'admin@inmobiliaria.com';
    $password = "123";

    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    $query = "INSERT INTO usuarios (email, password) VALUES ('${email}', '${passwordHash}')";
    mysqli_query($db, $query);