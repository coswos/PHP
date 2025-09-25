<form method="post" action="test.php">
  Choose bun:<br>
  <input type="radio" name="bun" value="white" > White<br>
  <input type="radio" name="bun" value="black" > Black<br>

  <br>Choose sauce:<br>
  <input type="checkbox" name="sauce[]" value="ketchup"> Ketchup<br>
  <input type="checkbox" name="sauce[]" value="mayo"> Mayo<br>
  <input type="checkbox" name="sauce[]" value="garlic"> Garlic<br>

  <br>Agreement of terms: <br>
  Agree<input type="checkbox" name="agreement" required><br>

  <button type="submit">Order</button>
</form>
