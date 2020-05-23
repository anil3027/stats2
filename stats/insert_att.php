<?php
//insert.php;

if(isset($_POST["year"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=stats", "root", "");
 $order_id = uniqid();
 for($count = 0; $count < count($_POST["year"]); $count++)
 {  
  $query = "INSERT INTO attendance 
  (create_id, class_id, year, term, week, date, boys_1, girls_1, boys_2, girls_2) 
  VALUES (:order_id, :class_name, :year, :term, :week, :date, :b1, :g1, :b2, :g2)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':order_id'   => $order_id,
    ':class_name'  => $_POST["class_name"][$count], 
    ':year' => $_POST["year"][$count], 
    ':term'  => $_POST["term"][$count],
    ':week'  => $_POST["week"][$count],
    ':date'  => $_POST["date"][$count],
    ':b1'  => $_POST["b1"][$count],
    ':g1'  => $_POST["g1"][$count],
    ':b2'  => $_POST["b2"][$count],
    ':g2'  => $_POST["g2"][$count],
   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
?>