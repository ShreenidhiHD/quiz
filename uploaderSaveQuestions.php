<?php
require_once "common/commonLibs.php";
require_once "common/DB.php";
require_once "common/validation.php";
require_once "common/uploaderSession.php";

if(isset($_REQUEST["quizId"]) and !empty($_REQUEST["quizId"]) and isset($_REQUEST["question"]) and !empty($_REQUEST["question"]) and isset($_REQUEST["answera"]) and !empty($_REQUEST["answera"]) and isset($_REQUEST["answerb"]) and !empty($_REQUEST["answerb"]) and isset($_REQUEST["answerc"]) and !empty($_REQUEST["answerc"]) and isset($_REQUEST["answerd"]) and !empty($_REQUEST["answerd"]) and isset($_REQUEST["answer"]) and !empty($_REQUEST["answer"])){
    $savequest=mysqli_query($conn,"insert into questions (question,quizid,answera,answerb,answerc,answerd,answer) values ('".$_REQUEST["question"]."',".$_REQUEST["quizId"].",'".$_REQUEST["answera"]."','".$_REQUEST["answerb"]."','".$_REQUEST["answerc"]."','".$_REQUEST["answerd"]."','".$_REQUEST["answer"]."')");
    if($savequest){
        ?>
        <div class="w3-modal" id="errorMsg" style="display: block">
            <div class="w3-modal-content w3-display-middle w3-mobile">
                <div class="w3-container w3-padding">
                    <div class="w3-xxlarge w3-center">Saved</div>
                    <div class="w3-center">
                        <button class="w3-button w3-indigo w3-hover-indigo w3-large" onclick="javascript:location.href='uploaderAddQuestion.php?quizid=<?php echo $_REQUEST["quizId"]; ?>'">Back</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    else
        {
            ?>
            <div class="w3-modal" id="errorMsg" style="display: block">
                <div class="w3-modal-content w3-display-middle w3-mobile">
                    <div class="w3-container w3-padding">
                        <div class="w3-xxlarge w3-center">Unable to save.</div>
                        <div class="w3-center">
                            <button class="w3-button w3-indigo w3-hover-indigo w3-large" onclick="javascript:location.href='uploaderAddQuestion.php?quizid=<?php echo $_REQUEST["quizId"]; ?>'">Back</button>
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
                <div class="w3-xxlarge w3-center">enter all feilds</div>
                <div class="w3-center">
                    <button class="w3-button w3-indigo w3-hover-indigo w3-large" onclick="javascript:location.href='uploaderAddQuestion.php?quizid=<?php echo $_REQUEST["quizId"]; ?>'">Back</button>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>
