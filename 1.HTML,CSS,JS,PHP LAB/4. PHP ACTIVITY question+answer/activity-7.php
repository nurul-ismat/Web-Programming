<!DOCTYPE html>   
<html> 

 
<body>  
<h2>PHP Variable Data  Types</h2> 
<p>
<?php   
 
$whatsit = 'Nurul Ismat'; 
echo "Value is ".gettype($whatsit).".<br/>\n";   
 
$whatsit = 40.52; 
echo "Value is ".gettype($whatsit).".<br/>\n";   
 
$whatsit = true; 
echo "Value is ".gettype($whatsit).".<br/>\n";   
 
$whatsit = 52; 
echo "Value is ".gettype($whatsit).".<br/>\n";
 
$whatsit = null; 
echo "Value is ".gettype($whatsit).".<br/>\n";   
 
?>   
</p>
</body> 
</html>