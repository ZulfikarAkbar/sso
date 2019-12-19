<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once 'SSOServer.php';
$sso_server = new SSOServer();
$command = isset($_REQUEST['command']) ? $_REQUEST['command'] : null;
if (!$command || !method_exists($sso_server, $command)) {
    echo "<h1>~ Congrats, You Connected to SSO Server UNJ ~</h1>";
    exit();
}
$result_open = $sso_server->$command();
?>