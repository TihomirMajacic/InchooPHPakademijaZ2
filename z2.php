<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
//Provjera dali je POST postavljen.
if (!isset($_POST['broj'])){
    echo 'Nije prosljeđenja POST metoda <br>';
    echo '<a href="index.html">Povratak na stranicu</a>';
    exit;
}
$prvi=false;
 $string=$_POST['broj'];
 $string = preg_replace('/[^0-9,]/', '', $string);
 $array=explode(',',$string);
 $array = array_filter($array);

 if (!empty($array)){
     $box =intval(floor(sqrt(max($array)))+1);
     $aritSredina=array_sum($array) / count($array);
     echo '<table>';
     for ($y=0;$y<$box;$y++){
         echo '<tr>';
         for ($x=0;$x<$box;$x++){
             echo '<td style="border: 1px solid;width: 29px;height: 29px ;">';
             foreach ($array as $i)
             {
                 if (($i%2 === 0) && (($y*$box+$x+1) === intval($i))){
                     if (!$prvi && $i>$aritSredina) {
                         echo '<b>',$i,'</b>';
                         $prvi=true;
                         break;
                     }
                     echo $i ;
                     break;
                 }
             }
             echo '</td>';
         }
         echo '</tr>';
     }
    echo '</table>';
 }
 ?>

</body>
</html>