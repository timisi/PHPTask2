<?php
    function customScandir($dir)
    {
        return array_values(array_diff(scandir($dir), array('..', '.', '.DS_Store')));
    }
?>