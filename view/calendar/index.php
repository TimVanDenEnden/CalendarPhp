<?php 

$month = array();

$months = array(
        1   =>  'Januari',
        2   =>  'Februari',
        3   =>  'Maart',
        4   =>  'April',
        5   =>  'Mei',
        6   =>  'Juni',
        7   =>  'Juli',
        8   =>  'Augustus',
        9   =>  'September',
        10  =>  'Oktober',
        11  =>  'November',
        12  =>  'December'
    );

// Workend

foreach($birthdays as $birthday) {
    if (!array_key_exists($birthday["month"], $month)) {
        $month[$birthday["month"]] = array();
    }
    
    if (array_key_exists($birthday["day"], $month[$birthday["month"]])) {
        $month[$birthday["month"]][$birthday["day"]] = array_merge($month[$birthday["month"]][$birthday["day"]], array($birthday));
    } else {
        $month[$birthday["month"]][$birthday["day"]] = array($birthday);
    }
    
    ksort($month[$birthday["month"]]);
}

ksort($month);

?>
	
	<?php
	foreach($month as $key => $value) {
		echo "<h1>" . $months[$key] . "</h1>";
		foreach($value as $key2 => $value2) {
            echo "<h2>" . $key2. "</h2>";
			foreach($value2 as $key3 => $value3) { ?>

        <p>
        	<a href="Calendar/get/<?= $value3['id'] ?>">

                <?= $value3["person"]; ?> (<?= $value3["year"]; ?>)

            </a>
                
            <a href="Calendar/delete/<?= $value3['id'] ?>">x</a>
        </p>
	<?php } } } ?>

<p><a href="Calendar/add">+ Toevoegen</a></p>
