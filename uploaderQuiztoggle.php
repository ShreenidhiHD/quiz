<?php
require_once "common/commonLibs.php";
require_once "common/DB.php";
require_once "common/validation.php";

require_once "common/uploaderSession.php";

if(isset($_REQUEST["quizid"]) and !empty($_REQUEST["quizid"])){
    $getStatus=mysqli_query($conn,"select * from quiz where qid=".$_REQUEST["quizid"]);
    $status="";
    while ($gs=mysqli_fetch_assoc($getStatus)){
        if($gs["qstatus"]=="active"){
            $status="deactive";
        }
        else{
            $status="active";
        }
    }

    $updateStatus=mysqli_query($conn,"update quiz set qstatus='".$status."' where qid=".$_REQUEST["quizid"]);
    if($updateStatus){
        ?>
        <div class="w3-modal" style="display: block">
            <div class="w3-modal-content w3-display-middle">
                <div class="w3-container w3-padding">
                    <div class="w3-center">
                        <div class="w3-xxxlarge">status changed successfully</div>
                        <button class="w3-button w3-orange w3-hover-orange" onclick="javascript:location.href='uploaderhome.php'">Back</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    else{
        ?>
        <div class="w3-modal" style="display: block">
            <div class="w3-modal-content w3-display-middle">
                <div class="w3-container w3-padding">
                    <div class="w3-center">
                        <div class="w3-xxxlarge">Unable to change status.</div>
                        <button class="w3-button w3-orange w3-hover-orange" onclick="javascript:location.href='uploaderhome.php'">Back</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
else{
    ?>
    <div class="w3-modal" style="display: block">
        <div class="w3-modal-content w3-display-middle">
            <div class="w3-container w3-padding">
                <div class="w3-center">
                    <div class="w3-xxxlarge">Invalid uploader.</div>
                    <button class="w3-button w3-orange w3-hover-orange" onclick="javascript:location.href='uploaderhome.php'">Back</button>
                </div>
            </div>
        </div>
    </div>
    <?php
}

?>