<?php
function myTable($obConn,$sql2)
{
$rsResult = mysqli_query($obConn, $sql2) or die(mysqli_error($obConn));
if(mysqli_num_rows($rsResult)>0)
{
//We start with header. >>>Here we retrieve the field names<<<
echo "<table width=\"100%\" border=\"0\" cellspacing=\"2\"
cellpadding=\"0\"><tr align=\"center\" bgcolor=\"#CCCCCC\">";
$i = 0;
while ($i < mysqli_num_fields($rsResult)){
$field = mysqli_fetch_field_direct($rsResult, $i);
$fieldName=$field->name;
echo "<td><strong>$fieldName</strong></td>";
$i = $i + 1;
}
echo "</tr>";
//>>>Field names retrieved<<<
//We dump info
$bolWhite=true;
while ($row = mysqli_fetch_assoc($rsResult)) {
echo $bolWhite ? "<tr bgcolor=\"#CCCCCC\">" : "<tr bgcolor=\"#FFF\">";
$bolWhite=!$bolWhite; foreach($row as $data) {
echo "<td>$data</td>";
}
echo "</tr>";
}
echo "</table>";
}
}
include 'connecthg.php';

$where_cols2 = $_POST['where_cols2'];
$conn2 = OpenCon();
$sql2 = 
"select PlantHas.P_ID AS PlantID, P_ScientificName AS ScientificName, P_Description AS Description,P_CommonName AS CommonName, Amount AS InventoryAmount,GrowthRate.LengthGrowth
from PlantHas,GrowthRate
where P_CommonName like '%$where_cols2%' AND GrowthRate.PG_ID = PlantHas.P_ID";
myTable($conn2,$sql2);

?>