<?php
	//echo "<pre>";
 $Name = $_GET['infos'];
 // it's the array of files to be deleted;
 $a = array();
class MyDB extends SQLite3
{
	function __construct()
	{
		$this->open('/root/.cache/rygel/media-export.db');
	}
}
$db = new MyDB();

  
  
// echo "open db success \n";
 foreach ($Name as $cur){
	echo $cur;
 	$file = '/music/'.$cur;
 	if (!unlink($file))
  {
  echo ("Error deleting $file");
  }
else
  {
  echo ("Deleted $file");
  }
 	// cur contains 
 	$cur = substr($cur, 0, sizeof($cur) - 5); // remove the ending ".mp3"
 	$start = strrpos($cur, " - ") + 3;
 	$cur =substr($cur, $start);
       echo $cur;
 	$sql =<<<EOF
      SELECT * from object where title = '$cur';
EOF;
	echo $sql;
    $ret = $db->query($sql);
     while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
      echo "ubnp_id = ". $row['upnp_id'] . "\n";
      array_push($a, $row['upnp_id']);
   }
   
   
//$db->exec('DELECT FROM company where ID = 2');
//$db->exec("INSERT INTO foo (bar) VALUES ('This is a test')");
}
echo sizeof($a);
echo "Operation done successfully\n";
foreach($a as $id) {
         echo $id;
	$sql = "DELETE FROM object where upnp_id =\"$id\"";
       echo $sql;
	$db->exec($sql);
	$sql = "DELETE FROM meta_data where object_fk = \"$id\"";
        echo $sql;
	$db->exec($sql);
}
echo "Delete successfully";
$db->close();

header("Location: ./index.php");
?>
