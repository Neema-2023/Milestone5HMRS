
    <?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:milestone5hmrs-server.mysql.database.azure.com; Database = milestone5hmrs-database", "gzfemdsgdy", "{$XdsiMGt67QSoak2}");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "gzfemdsgdy", "pwd" => "{$XdsiMGt67QSoak2}", "Database" => "milestone5hmrs-database", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:milestone5hmrs-server.mysql.database.azure.com.com";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>
