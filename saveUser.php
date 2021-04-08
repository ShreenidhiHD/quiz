<?php
    require_once "common/commonLibs.php";
    require_once "common/DB.php";
    require_once "common/validation.php";



    if(isset($_REQUEST["name"]) and !empty($_REQUEST["name"]) and isset($_REQUEST["mno"]) and !empty($_REQUEST["mno"]) and isset($_REQUEST["email"]) and !empty($_REQUEST["email"])  and isset($_REQUEST["city"]) and !empty($_REQUEST["city"]) and isset($_REQUEST["pincode"]) and !empty($_REQUEST["pincode"]) and isset($_REQUEST["Password"]) and !empty($_REQUEST["Password"]) and isset($_REQUEST["confirmPassword"]) and !empty($_REQUEST["confirmPassword"])){
        $msg="";
        $flag=0;
        $name=personNameVal($_REQUEST["name"]);
        if(!$name){
            $msg=$msg."Invalid name.<br />";
            $flag=1;
        }
        $mbl=phoneVal($_REQUEST["mno"]);
        if(!$mbl){
            $msg=$msg."Invalid mobile number<br />";
            $flag=1;
        }
        $email=emailVal($_REQUEST["email"]);
        if(!$email){
            $msg=$msg."invalid email<br />";
            $flag=1;
        }
        $city=entityNameVal($_REQUEST["city"]);
        if(!$city){
            $msg=$msg."invalid city<br/>";
            $flag=1;
        }
        $pincode=pinVal($_REQUEST["pincode"]);
        if(!$pincode){
            $msg=$msg."invalid pincode<br />";
            $flag=1;
        }
        if(!passwordMatch($_REQUEST["Password"],$_REQUEST["confirmPassword"])){
            $msg=$msg."password mismatch<br />";
            $flag=1;
        }
        if($flag==1){
            ?>
            <div class="w3-modal" id="errorMsg" style="display: block">
                <div class="w3-modal-content w3-display-middle w3-mobile">
                    <div class="w3-container w3-padding">
                        <div class="w3-xxlarge w3-center"><?php echo $msg; ?></div>
                        <div class="w3-center">
                            <button class="w3-button w3-indigo w3-hover-indigo w3-large" onclick="javascript:location.href='regestration.php'">Back</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        else{
            $checkUs=mysqli_query($conn,"select * from users where phone='".$_REQUEST["mno"]."' or email='".$_REQUEST["email"]."'");
            if(mysqli_num_rows($checkUs)>0){
                ?>
                <div class="w3-modal" id="errorMsg" style="display: block">
                    <div class="w3-modal-content w3-display-middle w3-mobile">
                        <div class="w3-container w3-padding">
                            <div class="w3-xxlarge w3-center">User already exists. please login.</div>
                            <div class="w3-center">
                                <button class="w3-button w3-indigo w3-hover-indigo w3-large" onclick="javascript:location.href='index.php'">Back</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            else{
                $saveUs=mysqli_query($conn,"insert into users (name,phone,email,city,pincode,password,status,type) values ('".$_REQUEST["name"]."','".$_REQUEST["mno"]."','".$_REQUEST["email"]."','".$_REQUEST["city"]."','".$_REQUEST["pincode"]."','".$_REQUEST["Password"]."','active','user')");
                if($saveUs){
                    ?>
                    <div class="w3-modal" id="errorMsg" style="display: block">
                        <div class="w3-modal-content w3-display-middle w3-mobile">
                            <div class="w3-container w3-padding">
                                <div class="w3-xxlarge w3-center">Account created.</div>
                                <div class="w3-center">
                                    <button class="w3-button w3-indigo w3-hover-indigo w3-large" onclick="javascript:location.href='index.php'">Back</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                else{
                    ?>
                    <div class="w3-modal" id="errorMsg" style="display: block">
                        <div class="w3-modal-content w3-display-middle w3-mobile">
                            <div class="w3-container w3-padding">
                                <div class="w3-xxlarge w3-center">Unable to create account. Please try again.</div>
                                <div class="w3-center">
                                    <button class="w3-button w3-indigo w3-hover-indigo w3-large" onclick="javascript:location.href='regestration.php'">Back</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        }
    }
    else
        {
           ?>
            <div class="w3-modal" id="errorMsg" style="display: block">
                <div class="w3-modal-content w3-display-middle w3-mobile">
                    <div class="w3-container w3-padding">
                        <div class="w3-xxlarge w3-center">enter all feilds</div>
                        <div class="w3-center">
                            <button class="w3-button w3-indigo w3-hover-indigo w3-large" onclick="javascript:location.href='regestration.php'">Back</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

?>
