<!DOCTYPE html>
<html>
<head>
<title>PHP: Get Values of Multiple Checked Checkboxes</title>
<link rel="stylesheet" href="css/php_checkbox.css" />
</head>
<body>
<div class="container">
<div class="main">
<h2>PHP: Get Values of Multiple Checked Checkboxes</h2>
<form action="php_checkbox.php" method="post">
<input type="checkbox" name="cbox[]" value="Item 1" />Item 1
<input type="checkbox" name="cbox[]" value="Item 2" />Item 2
<input type="checkbox" name="cbox[]" value="Item 3" />Item 3
<input type="checkbox" name="cbox[]" value="Item 4" />Item 4
<input type="checkbox" name="cbox[]" value="Item 5" />Item 5
<input type="submit" name="submit" Value="Submit"/>
<!----- Including PHP Script ----->

<?php
$items = implode(",",$_REQUEST['cbox']);
print "You selected $items";
?>

<?php
$hobbies = implode(",",$_REQUEST['hobbies']);
mysql_query("INSERT INTO `table_name` (hobbies) VALUES ('$hobbies')");
?>

<?php
$db = mysqli_connect('localhost','root','','games')
or die('Error connecting to MySQL server.');
  if (isset($_POST["send"]))
{
$hobbies = mysql_fetch_array(mysql_query("SELECT `hobbies` FROM `table_name` WHERE name='jesin'"));
$hobby = explode(",",$hobbies);
print "<ul>";
foreach ($hobby as $item)
{
print "<li>$item</li>";
}
print "</ul>";

}
?>
</form>
</div>
</div>
</body>
</html>