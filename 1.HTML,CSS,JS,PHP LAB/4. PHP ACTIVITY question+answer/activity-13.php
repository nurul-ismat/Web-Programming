<?php

$months=array(
  'January'=>31,
  'February'=>'28 days, if leap year 29',
  'March'=>31,
  'April'=>30,
  'May'=>31,
  'June'=>30,
  'July'=>31,
  'August'=>31,
  'September'=>30,
  'October'=>31,
  'November'=>30,
  'December'=>31
);

function option($str){
  echo "<option value=\"$str\">" .ucfirst($str). "</option>\n";
}
 
?>
<!DOCTYPE html>
 
<html >
<body>
<h2>Days in a Month</h2>
 
<?php

if(!isset ($_POST['submit'])){
?>

<form method="post" action="yourfile.php">

<p>Please choose a month.</p>

<select name="month">
<?php

  foreach ($months as $k => $v){
    option($k);
  }
?>
</select>  
<p />
<input type="submit" name="submit" value="Go" />
</form>
<?php

} else {

  $month = $_POST['month'];
 
  if ($month == 'February'){
    echo "The month of February has " . $months['February'] . ".";
  }else{
    echo "The month of $month has $months[$month] days.";
  }
}
?>
 
</body>
</html>