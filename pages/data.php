<?php


define('DB_USER','root');
define('DB_PASS',''); 
define('DB_HOST','localhost');

include ('../plugins/dhtmlxgantt/connector/gantt_connector.php');
// include ("./config.php");

$res=mysql_connect(DB_HOST,DB_USER,DB_PASS) or die ("Unable to connect!"); 
mysql_select_db("gantt_test");

$gantt = new JSONGanttConnector($res);

$gantt->render_links("gantt_links","id","source,target,type");

 $gantt->render_table(
    "gantt_tasks",
    "id",
    "start_date,duration,text,progress,sortorder,parent"    
);

?>