<?php

function getAllBirthdays() 
{
	$db = openDatabaseConnection();

 	$sql = "SELECT * FROM birthdays";
    $query = $db->prepare($sql);
    $query->execute();

	$db = null;

	return $query->fetchAll();
}

function createBirthday($person, $day, $month, $year) 
{
	// Coonect to database!
	$db = openDatabaseConnection();

	// We want to create new birthday in the calendar
	$sql = "INSERT INTO `birthdays`(`person`, `day`, `month`, `year`) VALUES (:person, :day, :month, :year)";

	$stmt = $db->prepare($sql);

	$stmt->bindParam(':person', $person);
	$stmt->bindParam(':day', $day);
	$stmt->bindParam(':month', $month);
	$stmt->bindParam(':year', $year);

	$stmt->execute();

	$db = null;

	return "Successfully";



}

function getBirthday($id) 
{
	// Coonect to database!
	$db = openDatabaseConnection();

	// Select the person whiche we want to change!
	$sql = "SELECT * FROM `birthdays` WHERE `id` = (:id)";

	$stmt = $db->prepare($sql);

	$stmt->bindParam(':id', $id);

	$stmt->execute();

	$db = null;

	return $stmt->fetch(PDO::FETCH_ASSOC);

}

function editBirthday($id, $person, $day, $month, $year) 
{
	// Coonect to database!
	$db = openDatabaseConnection();

	$sql = "UPDATE `birthdays` SET `person` = (:person),`day` = (:day),`month` = (:month),`year` = (:year) WHERE `id` = (:id)";

	$stmt = $db->prepare($sql);

	$stmt->bindParam(':id', $id);
	$stmt->bindParam(':person', $person);
	$stmt->bindParam(':day', $day);
	$stmt->bindParam(':month', $month);
	$stmt->bindParam(':year', $year);

	$stmt->execute();

	$db = null;

	return "Successfully";

}

function deleteBirthday($id) 
{
	// Coonect to database!
	$db = openDatabaseConnection();

	$sql = "DELETE FROM `birthdays` WHERE `id` = (:id)";

	$stmt = $db->prepare($sql);

	$stmt->bindParam(':id', $id);

	$stmt->execute();

	$db = null;

	return "Successfully";


}