<?php
function myTable($obConn,$sql)
{
$rsResult = mysqli_query($obConn, $sql) or die(mysqli_error($obConn));
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

$where_cols = $_POST['where_cols'];
$conn = OpenCon();
$sql = 
"select PlantHas.P_ID AS PlantID, P_ScientificName AS ScientificName, P_Description AS Description,P_CommonName AS CommonName, Amount AS InventoryAmount,GrowthRate.LengthGrowth
from PlantHas,GrowthRate
where P_ScientificName like '%$where_cols%' AND GrowthRate.PG_ID = PlantHas.P_ID";
myTable($conn,$sql);

?>