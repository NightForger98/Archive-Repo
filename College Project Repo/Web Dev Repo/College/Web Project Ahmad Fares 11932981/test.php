

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php for ($i = 1; $i <= 3; $i++) { ?>

<h<?= $i ?>>This is a level <?= $i ?> heading.</h<?= $i ?>>

<?php } ?>
   <br> this is a test,<br> test succesfull.
   <?php for ($i = 10; $i >= 1; $i--) { ?>

<p> <?= $i ?> bottles of beer on the wall, <br />

<?= $i ?> bottles of beer. <br />

Take one down, pass it around, <br />

<?= $i - 1 ?> bottles of beer on the wall. </p>

<?php } ?>
<?php

print "Hello, world!";
?>
</body>
</html>
<?php
echo "<br><h2> This is echo php</h2> ";
echo "Hello war. ";
echo "Only God can save us!<br>";
echo "This ", " string "," was "," made "," with multiple parameters.";

?>
<br>
<?php
$txt1 = "Learn PHP";
$txt2 = "LIU.edu.lb";
$x = 5;
$y = 4;
echo "<h2>" . $txt1 . "</h2>";
echo "Study PHP at " . $txt2 . "<br>";
echo $x + $y;




$user_name = "PinkHeartLuvr78";

$age = 16;

$driving_age = $age + 2;

$this_class_rocks = TRUE;
$expression = $user_name.$age.$driving_age;

echo  $expression; 

echo "<br>";
    for ($i = 0; $i < 10; $i++) {
    
    print "$i squared is " . $i * $i . ".\n";
    
    }
    $favorite_food = "Lebanese";

print "<br>".$favorite_food[2];
$name = "Austin Weale";

$length = strlen($name); 

$cmp = strcmp($name, "Linda Guo");

$index = strpos($name, "s"); 

$first = substr($name, 7, 4); 

$name = strtoupper($name);
echo "<br>".$name;
$age = 16;
print "You are $age years old.\n";

$a = array(); # empty array (length 0)

$a[0] = 23; # stores 23 at index 0 (length 1)

$a2 = array("some", "strings", "in", "an", "array");

$a2[] = "Ooh!";

$tas = array("MD", "BH", "KK", "HM", "JP");

for ($i = 0; $i < count($tas); $i++) {

$tas[$i] = strtolower($tas[$i]);

} # ("md", "bh", "kk", "hm", "jp")

$morgan = array_shift($tas); # ("bh", "kk", "hm", "jp")

array_pop($tas); # ("bh", "kk", "hm")

array_push($tas, "ms"); # ("bh", "kk", "hm", "ms")

array_reverse($tas); # ("ms", "hm", "kk", "bh")

sort($tas); # ("bh", "hm", "kk", "ms")

$best = array_slice($tas, 1, 2); # ("hm", "kk")\

$feels_like_summer = FALSE;

$php_is_rad = TRUE;

$student_count = 217;

$nonzero = (bool) $student_count;
$a = 3;

$b = 4;

$c = sqrt(pow($a, 2) + pow($b, 2));
$name = "Victoria";

$name = NULL;

if (isset($name)) {

print "This line isn't going to be reached.\n";

}


print "<!DOCTYPE html>\n";

print "<html>\n";

print " <head>\n";

print " <title>Geneva's web page</title>\n";



for ($i = 1; $i <= 10; $i++) {

print "<p class=\"count\"> I can count to $i! </p>\n";

}



?>