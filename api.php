<?php
include "templates/db.php";
$data = array(); // в этот массив запишем то, что выберем из базы

if(isset($_GET['q'])){
  $key = $_GET['q'];
  $ta = $connection->query("SELECT * FROM topics t, questions q, answers a, users u WHERE a.user_id = u.id AND a.question_id = q.id AND q.topic_id = t.id AND q.content LIKE(%\"$key\"%)"); // сделаем запрос в БД
  while($row = $ta->fetch_object()){ // оформим каждую строку результата
                                        // как ассоциативный массив
      $data[] = $row; // допишем строку из выборки как новый элемент результирующего массива
  }
  echo '{ "items": '.json_encode($data).'}'; // и отдаём как json
}else{
  $ta = $connection->query("SELECT * FROM topics t, questions q, answers a, users u WHERE a.user_id = u.id AND a.question_id = q.id AND q.topic_id = t.id"); // сделаем запрос в БД
  while($row = $ta->fetch_object()){ // оформим каждую строку результата
                                        // как ассоциативный массив
      $data[] = $row; // допишем строку из выборки как новый элемент результирующего массива
  }
}
  echo '{ "items": '.json_encode($data).'}'; // и отдаём как json
?>
