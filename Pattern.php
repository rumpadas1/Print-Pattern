<!DOCTYPE html> 

<html lang="en"> 

<head> 

 <title>Print Pattern</title> 

 <style> 

 body { 

 font-family: Arial, sans-serif; 

 margin: 20px; 

 background-color: yellow; 

 } 

 form { 

 margin-bottom: 20px; 

 } 

 h1{ 

 font-family: Arial, sans-serif; 

 color: #4caf50; 

 } 

 .error { 

 color: red; 

 } 

 .result { 

 font-weight: bold; 

 } 

 button[type="submit"] { 

 background-color: #4caf50; /* added background color to button */ 

 color: #ffffff; /* added text color to button */ 

 padding: 10px 20px; 

 border: none; 

 border-radius: 5px; 

 cursor: pointer; 

 } 

 button[type="submit"]:hover { 

 background-color: #3e8e41; /* added hover effect to button */ 

 } 

 </style> 

</head> 

<body> 

 <h1>Print Pattern</h1> 

 <form method="POST" action=""> 

 <label for="lines">Enter number of lines (>=4):</label> 

 <input type="text" id="lines" name="lines" required> 

 <button type="submit">Generate Pattern</button> 

 </form> 

 <?php 

 function generatePattern($n) { 

 echo "<pre>"; 

 //Upper Triangle 

 for ($i = 1; $i <= $n; $i++) { 

 // Print leading spaces 

 for ($j = 0; $j < $n - $i; $j++) { 

 echo " "; 

 } 

 

 // Print stars
   for ($j = 0; $j < (2 * $i - 1); $j++) { 

 echo "X"; 

 } 

 

 // Move to the next line 

 echo "\n"; } 

 //first Horizontal Line 

 for($i=0; $i<2*$n; $i++) { 

 

 if($i==1 || $i==(2*$n-3)) { 

 echo "X"; 

 } 

 else { 

 echo " "; 

 } 

 } 

 echo "\n"; 

 //Middle lines with stars 

 for($i=0; $i<$n-2; $i++) { 

 for($j=0; $j<2*$n -1; $j++) { 

 if($i<($n-2) && ($j==1 || $j== ($n-2) || $j==($n-1) || $j==$n || $j==(2*$n-3))) { 

 echo "X"; 

 } 

 else { 

 echo " "; 

 } 

 } 

 echo "\n"; 

 } 

 //Bottom Horizontal Line 

 for($k=0; $k<2*$n ; $k++) { 

 if($k>=1 && $k<2*$n-2 ) { 

 echo "X"; 

 } 

 else{ 

 echo " "; 

 } 

 } 

 echo "</pre>"; 

 } 

 if ($_SERVER["REQUEST_METHOD"] == "POST") { 

 $lines = $_POST["lines"]; 

 if (empty($lines)) { 

 echo "<p class='error'>Please enter a number.</p>"; 

 } elseif (!is_numeric($lines) || intval($lines) != $lines || intval($lines) < 4 ) { 

 echo "<p class='error'>Please enter a integer greater than or equal to 4.</p>"; 

 } else { 

 $lines = intval($lines); 

 echo "For Line No. $lines<br>"; 

 generatePattern($lines); 

 

 } 

 } 

 ?> 

</body> 

</html>
