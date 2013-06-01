<?php

$name = $_GET['name'];
$lvl = get_data($name);
//Report any errors
ini_set ("display_errors", "1");
error_reporting(E_ALL);
 
//Set the correct content type 
header('content-type: image/png');
 
//Create our basic image stream 
//125px width, 125px height
$image = imagecreatefrompng('Screenshot_7.png'); //fona attēls
 $font = './arial.ttf';  //fonta fails
$yellow = imagecolorallocate($image, 255, 255, 0);

$Attack = $lvl[4];
$Defence = $lvl[7];
$Strength = $lvl[10];
$Hitpoints = $lvl[13];
$Ranged = $lvl[16];
$Prayer = $lvl[19];
$Magic = $lvl[22];
$Cooking = $lvl[25];
$Woodcutting = $lvl[28];
$Fletching = $lvl[31];
$Fishing = $lvl[34];
$Firemaking = $lvl[37];
$Crafting = $lvl[40];
$Smithing = $lvl[43];
$Mining = $lvl[46];
$Herblore = $lvl[49];
$Agility = $lvl[52];
$Thieving = $lvl[55];
$Slayer = $lvl[58];
$Farming = $lvl[61];
$Runecraft = $lvl[64];
$Hunter = $lvl[67];
$Construction = $lvl[70];
$Overall = $lvl[1];



imagettftext($image, 15, 0, 33, 25, $yellow, $font, $Attack); imagettftext($image, 15, 0, 99, 25, $yellow, $font, $Hitpoints); imagettftext($image, 15, 0, 160, 25, $yellow, $font, $Mining);
imagettftext($image, 15, 0, 33, 55, $yellow, $font, $Strength); imagettftext($image, 15, 0, 99, 55, $yellow, $font, $Agility); imagettftext($image, 15, 0, 160, 55, $yellow, $font, $Smithing);
imagettftext($image, 15, 0, 33, 88, $yellow, $font, $Defence); imagettftext($image, 15, 0, 99, 88, $yellow, $font, $Herblore); imagettftext($image, 15, 0, 160, 88, $yellow, $font, $Fishing);
imagettftext($image, 15, 0, 33, 118, $yellow, $font, $Ranged); imagettftext($image, 15, 0, 99, 118, $yellow, $font, $Thieving); imagettftext($image, 15, 0, 160, 118, $yellow, $font, $Cooking);
imagettftext($image, 15, 0, 33, 148, $yellow, $font, $Prayer); imagettftext($image, 15, 0, 99, 148, $yellow, $font, $Crafting); imagettftext($image, 15, 0, 160, 148, $yellow, $font, $Firemaking);
imagettftext($image, 15, 0, 33, 178, $yellow, $font, $Magic); imagettftext($image, 15, 0, 99, 178, $yellow, $font, $Fletching); imagettftext($image, 15, 0, 160, 178, $yellow, $font, $Woodcutting);
imagettftext($image, 15, 0, 33, 208, $yellow, $font, $Runecraft); imagettftext($image, 15, 0, 99, 208, $yellow, $font, $Slayer); imagettftext($image, 15, 0, 160, 208, $yellow, $font, $Farming);
imagettftext($image, 15, 0, 33, 238, $yellow, $font, $Construction); imagettftext($image, 15, 0, 99, 238, $yellow, $font, $Hunter); imagettftext($image, 7, 0, 162, 244, $yellow, $font, $Overall);













imagepng($image);
imagedestroy($image);





function get_data($name)
{
$url = 'http://services.runescape.com/m=hiscore_oldschool/index_lite.ws?player=' . $name;
$ch = curl_init();
$timeout = 5;
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
$data = curl_exec($ch);

curl_close($ch);
$final = preg_replace('/,/', ' ', $data); // iznemam komatus, nahuj ķēpa ar 2 cikliem un '3d masīvu'
$final = preg_replace('/\n/', ' ', $final);  // iznem enterus
$ski = explode(' ', $final); //$ski ir skilu vertibu masivs (man vajag 0-71) 
return $ski;

}

?>