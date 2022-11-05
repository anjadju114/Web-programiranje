<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
 th,td,tr{
border:1px solid blue;
width:20px;
height:20px;
}
        
        
    </style>
</head>
<body>
<a href="index.html">vrati se</a><br>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<p>Kolona:</p>
<input type="number" name="kolona" min="0"><br>
<p>Red:</p>
<input type="number" name="red" min="0"><br>
<input type="submit" name="submit" value="Kreiraj tabelu">
</form>
<?php
$red = $kol = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $kol = test_input($_POST["kolona"]);
  $red = test_input($_POST["red"]);
 
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if($kol!=""|| $red!="")
{
    echo"<table>";
    for($i=0;$i<$red;$i++)
    {
        if($i%2==0)
        {
        echo "<tr  style='background-color:grey;'>";
        for($j=0;$j<$kol;$j++)
        {

            echo "<td></td>";
            
        }
        echo "</tr>";
        }
        else
        {
            echo "<tr  style='background-color:white;'>";
            for($j=0;$j<$kol;$j++)
            {
    
                echo "<td></td>";
             
                
            }
            
            echo "</tr>";
        }
    }
 
    echo "</table> ";

}


?>
</body>
</html>