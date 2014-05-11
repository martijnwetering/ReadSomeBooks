<html>
<head>
    <title>Arrays in PHP</title>
</head>
<body>
<?php
//Twee eenvoudige geïndiceerde array's maken
$sortiment=array("Tafel","Kast","Bed","Nachtkastje","Krukje","Stoel");
$aantal =array(1,5,884,34,6,12,77,93,21);
//Alle items in de array achter elkaar weergeven
echo "<b>Array ongesorteerd</b><br>";
echo "<b>Sortiment: </b>";
$i=0;
while(isset($sortiment[$i])){
    echo $sortiment[$i] . " ";
    $i++;
}
echo "<br><b>Aantal: </b>";
$i=0;
while($aantal[$i]){
    echo $aantal[$i] . " ";
    $i++;
}
echo "<br><br>";
//Arrayelementen op de posities 2 en 4
echo "<b>Arrayelement 2 (Sortiment):</b> " . $sortiment[2] . "<br>";
echo "<b>Arrayelement 4 (Aantal): </b>" . $aantal[4] . "<br>";
echo "<br>";
//Aantal elementen in de Array berekenen
echo "<b>Aantal arrayelementen: </b><br>";
echo "<b>Sortiment: </b>" . count($sortiment) . "<br>";
echo "<b>Aantal: </b>" . count($aantal) . "<br>";
echo "<br>";
//Arrays oplopend sorteren en weergeven
sort($sortiment);
sort($aantal);
echo "<b>Array oplopend gesorteerd </b><br>";
echo "<b>Sortiment: </b>";
$i=0;
while($sortiment[$i]){
    echo $sortiment[$i] . " ";
    $i++;
}
echo "<br><b>Aantal: </b>";
$i=0;
while($aantal[$i]){
    echo $aantal[$i] . " ";
    $i++;
}
echo "<br><br>";

//Arrays dalend sorteren
rsort($sortiment);
rsort($aantal);
echo "<b>Array dalend gesorteerd</b><br>";
echo "<b>Sortiment: </b>";
$i=0;
while($sortiment[$i]){
    echo $sortiment[$i] . " ";
    $i++;
}
echo "<br><b>Aantal: </b>";
$i=0;
while($aantal[$i]){
    echo $aantal[$i] . " ";
    $i++;
}
echo "<br><br>";
//Maximum en Minimum van de Arrays berekenen
echo "<b>Maximum Sortiment: </b>" . max($sortiment) . "<br>";
echo "<b>Minimum Sortiment: </b>" . min($sortiment) . "<br><br>";
echo "<b>Maximum Aantal: </b>" . max($aantal) . "<br>";
echo "<b>Minimum Aantal: </b>" . min($aantal);
?>
</body>
</html>