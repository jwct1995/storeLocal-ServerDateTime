<?php
include "db.php";

$post=$_POST["post"];

$rtn="";

if($post=="uploadDT")
{
    $lDT=$_POST["lDT"];

    $t = microtime(true);
    $micro = sprintf("%06d",($t - floor($t)) * 1000000);
    $d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );
    $sDT =$d->format("Y-m-d  H:i:s");

    $query="INSERT INTO tblrecorddatetime(localDT, serverDT) VALUES ('".$lDT."','".$sDT."')";
    $result=mysqli_query($mysqli,$query);
    if($result==true)
    	$rtn=1;
    else
        $rtn=2;
	echo json_encode($rtn);
}

else if($post=="getList")
{
    $c=0;
    $rtn=array();
	$query="SELECT * FROM tblrecorddatetime ORDER BY localDT DESC LIMIT 100";
	$sql=mysqli_query($mysqli,$query)or die(mysql_error());

	while ($row = mysqli_fetch_array($sql, MYSQLI_BOTH))
	{
		$c++;
		$rtn[$c-1]=array("lDT"=>$row["localDT"],"sDT"=>$row["serverDT"]);
	}
	echo json_encode($rtn);
}

?>
