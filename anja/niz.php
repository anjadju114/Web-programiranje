<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <a href="index.html">vrati se</a><br>


  <?php
  $boje=array("plava","crvena","zelena","zuta");
 
  echo implode(", ",$boje). "<br>";
    $zboja = array_pop($boje);
    echo implode(", ",$boje). " i ".$zboja."<br>";
    $boje=array("plava","crvena","zelena","zuta");
    $broj=count($boje);
  for($i=0;$i<$broj;$i++)
{
    if($i<$broj-2)
    {
        echo $boje[$i].",";
    }
    else if($i<$broj-1)
    {
        echo $boje[$i]."";
    }
    else
    {
        echo " i " . $boje[$i];
    }
}
  
  ?>

</body>
</html>