<form action="/Calendar/editSave/" method="POST">
	Persoon: <input type="text" name="person" value="<?= $person["person"]; ?>"><br>
	Dag: <input type="text" name="day" value="<?= $person["day"]; ?>"><br>
	Maand: <input type="text" name="month" value="<?= $person["month"]; ?>"><br>
	Jaar: <input type="text" name="year" value="<?= $person["year"]; ?>"><br>
	<input type="hidden" name="id" value="<?= $person["id"]; ?>">
	<button type="submit">Save</button>
</form>









