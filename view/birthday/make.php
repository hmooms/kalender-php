<form action="<?php echo URL_PROTOCOL . URL_DOMAIN ?>/load/added_succesfully" method="post">
  <label for="naam">Naam:</label>
  <input type="text" name="naam" id="naam"> <br>
  <label for="dag">Dag:</label>
  <input type="number" name="dag" min="1" id="dag"> <br>
  <label for="maand">Maand:</label>
  <input type="number" name="maand" min="1" max="12" id="maand"> <br>
  <label for="jaar">Jaar:</label>
  <input type="number" name="jaar" min="1900" max="2018" id="jaar"> <br>
  <input type="submit" onclick="check()">
</form>

<a href="<?php echo URL_PROTOCOL . URL_DOMAIN ?>/load/index">terug</a>
