
<?php
$serverName = "LUIS-PC"; //serverName\instanceName
$connectionInfo = array( "Database"=>"dbnotas", "UID"=>"sa", "PWD"=>"sqlserver");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>