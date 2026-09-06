<?php
// Save command to a binary file
$command = chr(27) . chr(112) . chr(0) . chr(25) . chr(250);
file_put_contents("open_drawer.bin", $command);

// Use exec to send via RawPrint
exec("RawPrint.exe open_drawer.bin \"POS80\"");
echo "✅ Cash drawer command sent via RawPrint.";
?>
