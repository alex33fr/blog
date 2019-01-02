<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 02/01/2019
 * Time: 00:37
 */

require('controller/frontend.php');

try {
}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}
