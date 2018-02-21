<?php
//model
function loadAllBirthdays(){

  $db = openDatabaseConnection();
  $sql = "SELECT * FROM Birthday ORDER BY month ASC, day ASC, year ASC, person ASC";
  $result = $db->query($sql)->fetchAll();

  $months = array("0","januari", "februari", "maart", "april", "mei", "juni", "juli", "augustus", "september", "oktober", "november", "december");

  $tmpM = "";
  $tmpD = "";

  if(count($result) > 0){

    foreach($result as $row){

      if($tmpM == $row['month']){

        if($tmpD == $row['day']){
          echo "<p><a href='". URL_PROTOCOL . URL_DOMAIN ."/load/edit/".$row['id']."'>". $row["person"] . "(". $row["year"] .")" . "</a> <a href='". URL_PROTOCOL . URL_DOMAIN ."/load/delete/".$row['id']."'>" . "x" . "</a></p>";
        }
        else {
          echo  "<h2>" . $row['day'] . "</h2>";
          echo "<p><a href='". URL_PROTOCOL . URL_DOMAIN ."/load/edit/".$row['id']."'>". $row["person"] . "(". $row["year"] .")" . "</a> <a href='". URL_PROTOCOL . URL_DOMAIN ."/load/delete/".$row['id']."'>" . "x" . "</a></p>";
          $tmpD = $row['day'];
        }
      }
      else {
        echo "<h1>" . $months[$row['month']] . "</h1>";
        echo  "<h2>" . $row['day'] . "</h2>";
        echo "<p><a href='". URL_PROTOCOL . URL_DOMAIN ."/load/edit/".$row['id']."'>". $row["person"] . "(". $row["year"] .")" . "</a> <a href='". URL_PROTOCOL . URL_DOMAIN ."/load/delete/".$row['id']."'>" . "x" . "</a></p>";
        $tmpM = $row['month'];
        $tmpD = $row['day'];
      }
    }
    echo "<button onclick='main()'>lijst</button>";
    echo "<ul>";
    foreach($result as $row){
      echo "<li>".$row['person'] . " " . "(" . $row['day'] . " " . $months[$row['month']] . " " . $row["year"] . ")</li>";
    }
    echo "</ul>";
  }
  else {
    echo '<p>No results.</p>';
  }
  echo '<p><a href="' . URL_PROTOCOL . URL_DOMAIN . '/load/create">+ Toevoegen</a></p>';
}

function added_succesfully(){

  $db = openDatabaseConnection();
  $sql = "INSERT INTO Birthday (person, day, month, year)
  VALUES ('".$_POST["naam"]."' ,'".$_POST["dag"]."' , '".$_POST["maand"]."' ,'".$_POST["jaar"]."')";
  $db->query($sql);

  create();
}

function deleted_succesfully($id){

  $db = openDatabaseConnection();
  $sql = "DELETE FROM Birthday WHERE id='".$id."'";
  $db->query($sql);

  index ();
}

function select($id){

  $db = openDatabaseConnection();
  $sql = "SELECT * FROM Birthday WHERE id='".$id."'";
  $result = $db->query($sql);

  return $result->fetchAll();
}

function edit_succesfull($id){

  $db = openDatabaseConnection();
  $sql = "UPDATE Birthday SET person='".$_POST["naam"]."' , day='".$_POST["dag"]."' , month='".$_POST["maand"]."' , year='".$_POST["jaar"]."' WHERE id='".$id."'";

  $db->query($sql);

  index();

}
