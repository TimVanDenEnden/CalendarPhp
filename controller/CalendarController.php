<?php

require(ROOT . "model/CalendarModel.php");

function index()
{
	render('calendar/index', array(
		'birthdays' => getAllBirthdays()
	));
}

function add() 
{
	render('calendar/add');

	if (isset( $_POST['add'])) 
	{
		$person = $_POST['person'];
		$day = $_POST['day'];
		$month = $_POST['month'];
		$year = $_POST['year'];

		$result = createBirthday($person, $day, $month, $year);

		if($result == "Successfully")
		{
			header('location: /Calendar');
		}
	}




}

function get($id)
{
	render('calendar/edit', array(
		'person' => getBirthday($id)
	));
}

function editSave()
{
	// Variables that we got from our edit form
	$id = $_POST['id'];
	$person = $_POST['person'];
	$day = $_POST['day'];
	$month = $_POST['month'];
	$year = $_POST['year'];

	$result = editBirthday($id, $person, $day, $month, $year);

	if($result == "Successfully")
	{
		header('location: /Calendar');
	}

}

function delete($person)
{

	$result = deleteBirthday($person);

	if($result == "Successfully")
	{
		header('location: /Calendar');
	}

}
