<?php
require_once "common/commonLibs.php";
require_once "common/DB.php";


if(isset($_REQUEST["mno"]) and !empty($_REQUEST["mno"]) and isset($_REQUEST["Password"]) and !empty($_REQUEST["Password"])) {
    $checkUser=mysqli_query($conn,"select * from users where phone='".$_REQUEST["mno"]."' and password='".$_REQUEST["Password"]."'");
    if(mysqli_num_rows($checkUser)==1){
        $id="";
        $type="";
        $status="";
        while ($cU=mysqli_fetch_assoc($checkUser)){
            $id=$cU["uid"];
            $type=$cU["type"];
            $status=$cU["status"];
            $password=$cU["password"];
        }

        if($_REQUEST["Password"]==$password){
            if($status=='active'){
                session_start();
                if($type=='admin'){
                    $_SESSION["id"]=$id;
                    echo "<script>location.href='adminhome.php';</script>";
                }
                elseif ($type=='uploader'){
                    $_SESSION["id"]=$id;
                    echo "<script>location.href='uploaderhome.php';</script>";
                }
                elseif ($type=='user'){
                    $_SESSION["id"]=$id;
                    echo "<script>location.href='userhome.php';</script>";
                }
                else{
                    ?>
                    <div class="w3-modal" id="errorMsg" style="display: block">
                        <div class="w3-modal-content w3-display-middle w3-mobile">
                            <div class="w3-container w3-padding">
                                <div class="w3-xxlarge w3-center">invalid user type</div>
                                <div class="w3-center">
                                    <button class="w3-button w3-indigo w3-hover-indigo w3-large" onclick="javascript:location.href='index.php'">Back
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            else{
                ?>
                <div class="w3-modal" id="errorMsg" style="display: block">
                    <div class="w3-modal-content w3-display-middle w3-mobile">
                        <div class="w3-container w3-padding">
                            <div class="w3-xxlarge w3-center">Account disabled.</div>
                            <div class="w3-center">
                                <button class="w3-button w3-indigo w3-hover-indigo w3-large" onclick="javascript:location.href='index.php'">Back
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        else{
            ?>
            <div class="w3-modal" id="errorMsg" style="display: block">
                <div class="w3-modal-content w3-display-middle w3-mobile">
                    <div class="w3-container w3-padding">
                        <div class="w3-xxlarge w3-center">Invalid password.</div>
                        <div class="w3-center">
                            <button class="w3-button w3-indigo w3-hover-indigo w3-large" onclick="javascript:location.href='index.php'">Back
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    else{
        ?>
        <div class="w3-modal" id="errorMsg" style="display: block">
            <div class="w3-modal-content w3-display-middle w3-mobile">
                <div class="w3-container w3-padding">
                    <div class="w3-xxlarge w3-center">invalid credentials</div>
                    <div class="w3-center">
                        <button class="w3-button w3-indigo w3-hover-indigo w3-large" onclick="javascript:location.href='index.php'">Back
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
else{
    ?>
    <div class="w3-modal" id="errorMsg" style="display: block">
        <div class="w3-modal-content w3-display-middle w3-mobile">
            <div class="w3-container w3-padding">
                <div class="w3-xxlarge w3-center">Enter all fields</div>
                <div class="w3-center">
                    <button class="w3-button w3-indigo w3-hover-indigo w3-large"
                            onclick="javascript:location.href='index.php'">
                    </button>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>