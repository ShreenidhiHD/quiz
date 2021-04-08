<?php
require_once "common/DB.php";
session_start();
if(!isset($_SESSION["id"]) or empty($_SESSION["id"])){
    ?>
    <div class="w3-modal" style="display: block">
        <div class="w3-modal-content w3-display-middle">
            <div class="w3-container w3-padding">
                <div class="w3-center">
                    <div class="w3-xxxlarge">Invalid user please login to continue</div>
                    <button class="w3-button w3-orange w3-hover-orange" onclick="javascript:location.href='logout.php'">Back</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    die();
}

?>
<?php

$check=$conn->query("select type from users where type='user' and status='active' and uid=".$_SESSION["id"]);
if($check->num_rows!=1){
    ?>
    <div class="w3-modal" style="display: block">
        <div class="w3-modal-content w3-display-middle">
            <div class="w3-container w3-padding">
                <div class="w3-center">
                    <div class="w3-xxxlarge">Invalid user please login to continue</div>
                    <button class="w3-button w3-orange w3-hover-orange" onclick="javascript:location.href='logout.php'">Back</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    die();
}

?>