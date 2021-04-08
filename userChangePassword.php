<?php
require_once "common/commonLibs.php";
require_once "common/DB.php";
require_once "common/validation.php";
require_once "common/userSession.php";

if(isset($_REQUEST["oldPassword"]) and !empty($_REQUEST["oldPassword"]) and isset($_REQUEST["newPassword"]) and !empty($_REQUEST["newPassword"]) and isset($_REQUEST["confirmPassword"]) and !empty($_REQUEST["confirmPassword"])) {
    $msg = "";
    $flag = 0;
    if (!passwordMatch($_REQUEST["newPassword"], $_REQUEST["confirmPassword"])) {
        $msg = $msg . "password mismatch<br />";
        $flag = 1;
    }

    if ($flag==1) {
        ?>
        <div class="w3-modal" id="errorMsg" style="display: block">
            <div class="w3-modal-content w3-display-middle w3-mobile">
                <div class="w3-container w3-padding">
                    <div class="w3-xxlarge w3-center"><?php echo $msg; ?></div>
                    <div class="w3-center">
                        <button class="w3-button w3-indigo w3-hover-indigo w3-large"
                                onclick="javascript:location.href='userhome.php'">Back
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    else{
        $getPas= mysqli_query($conn, "select * from users where password='" . $_REQUEST["oldPassword"] . "' and uid='" . $_SESSION["id"] . "'");
        $row=mysqli_fetch_array($getPas);
        if($_REQUEST["oldPassword"]!=$row["password"])
        {
            ?>
            <div class="w3-modal" id="errorMsg" style="display: block">
                <div class="w3-modal-content w3-display-middle w3-mobile">
                    <div class="w3-container w3-padding">
                        <div class="w3-xxlarge w3-center">failed.</div>
                        <div class="w3-center">
                            <button class="w3-button w3-indigo w3-hover-indigo w3-large"
                                    onclick="javascript:location.href='userhome.php'">Back
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        else{
            $updatePas = mysqli_query($conn, "update users  set password='".$_REQUEST['newPassword'] ."' where uid=".$_SESSION["id"]);
            ?>
            <div class="w3-modal" id="errorMsg" style="display: block">
                <div class="w3-modal-content w3-display-middle w3-mobile">
                    <div class="w3-container w3-padding">
                        <div class="w3-xxlarge w3-center">password successfully changed.</div>
                        <div class="w3-center">
                            <button class="w3-button w3-indigo w3-hover-indigo w3-large"
                                    onclick="javascript:location.href='userhome.php'">Back
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
else{
    ?>
    <div class="w3-modal" id="errorMsg" style="display: block">
        <div class="w3-modal-content w3-display-middle w3-mobile">
            <div class="w3-container w3-padding">
                <div class="w3-xxlarge w3-center">enter all feilds</div>
                <div class="w3-center">
                    <button class="w3-button w3-indigo w3-hover-indigo w3-large" onclick="javascript:location.href='userhome.php'">Back</button>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>