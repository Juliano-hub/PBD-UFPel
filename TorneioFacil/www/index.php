<?php

  $host = '10.2.0.3';
  $user = 'root';
  $password = 'toor';
  $dbname = 'base_torneiofacil';
  // eu sei que pdb é estranho

  // Set DSN
  $dsn = 'mysql:host='. $host .';port=3306;'.'dbname='. $dbname;

  // Create a PDO instance
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
 # PRDO QUERY

  $stmt = $pdo->query('SELECT * FROM test');

  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo $row['hello_world'] . '<br>';
  }

  while($row = $stmt->fetch()){
    echo $row->hello_world . '<br>';
  }
  
  echo "hello world";