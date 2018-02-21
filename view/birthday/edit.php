<form action="<?php echo URL_PROTOCOL . URL_DOMAIN ?>/load/edit_succesfull/<?php echo $person[0]['id']; ?>" method="post">
  <label for="naam">Naam:</label>
  <input type="text" name="naam" id="naam" value= "<?php echo $person[0]['person']; ?>"> <br>
  <label for="dag">Dag:</label>
  <input type="number" name="dag" min="1" id="dag" value="<?php echo $person[0]['day']; ?>"> <br>
  <label for="maand">Maand:</label>
  <input type="number" name="maand" min="1" max="12" id="maand" value="<?php echo $person[0]['month']; ?>"> <br>
  <label for="jaar">Jaar:</label>
  <input type="number" name="jaar" min="1900" max="2018" id="jaar" value="<?php echo $person[0]['year']; ?>"> <br>
  <input type="submit" onclick="check()">
</form>

<a href="<?php echo URL_PROTOCOL . URL_DOMAIN ?>/load/index">terug</a>
