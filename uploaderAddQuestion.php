<?php
require_once "common/commonLibs.php";
require_once "common/DB.php";
require_once "common/uploaderSession.php";

#Check if quizid is set
if(!isset($_REQUEST["quizid"]) or empty($_REQUEST["quizid"])){
    ?>
<div class="w3-modal" id="tempSelectDateModal" style="display: block">
    <div class="w3-modal-content w3-display-middle" style="max-width: 500px">
        <div class="w3-container w3-padding">
            <div class="w3-center w3-xxlarge">Select Valid quiz</div>
            <p class="w3-center"><button class="w3-button w3-margin-bottom w3-green" type="button" onclick="javascript:location.href='uploaderhome.php'">close</button></p>
        </div>
    </div>
<?php
die();
}

#Check number of questions
$getques=mysqli_query($conn,"select * from questions where quizid='".$_REQUEST["quizid"]."'");
if(mysqli_num_rows($getques)>=10) {
    $qid=-1;
    while ($gq=mysqli_fetch_assoc($getques)){
        $qid=$gq["quizid"];
    }
    ?>
    <div class="w3-modal" id="errorMsg" style="display: block">
        <div class="w3-modal-content  w3-mobile">
            <div class="w3-container w3-padding">
                <div
                        class="w3-center w3-xxlarge">already all questions entered
                do you want to see the questions</div>
                <p class="w3-center">
                    <button class="w3-button w3-center w3-green" onclick="location.href='uploaderViewquestions.php?quizid=<?php echo $qid;?>'">Yes</button>
                    <button class="w3-button w3-center w3-green" onclick="location.href='uploaderhome.php'">No</button>
                </p>
            </div>
        </div>
    </div>
    <?php
    die();
}
?>
    <div class="w3-container  w3-jumbo w3-center w3-padding">Quiz</div>
    <div>
        <div class="w3-right w3-padding">
            <button class="w3-button w3-margin-bottom w3-indigo " onclick="javascript:location.href='uploaderhome.php'">Back</button>
            <button class="w3-button w3-margin-bottom w3-red" onclick="javascript:location.href='index.php'">logout</button>
        </div>
    </div>
    <div class="w3-container w3-card-4">
        <div class="w3-container w3-card-4 w3-padding">
            <form method="post" action="uploaderSaveQuestions.php">
                <label for="question">write questions here</label>
                <input type="hidden" id="quizId" name="quizId" value="<?php echo $_REQUEST["quizid"]; ?>" />
                <p>
                    <?php
                    $getNumbers=mysqli_query($conn,"select * from questions where quizid=".$_REQUEST["quizid"]);
                    echo "<b>Q.No: ";
                    echo (mysqli_num_rows($getNumbers)+1)."</b>";
                    ?>
    <input type="text" id="question" name="question" placeholder="Enter question" required="true" class="w3-input" />
    </p>
    <label>Enter otions here</label><br>
    <p class="w3-row"><label><b>A.</b></label><input type="text" id="answera" name="answera" required="true"/></p>
    <p class="w3-row"><label><b>B.</b></label><input type="text" id="answerb" name="answerb" required="true"/></p>
    <p class="w3-row"><label><b>C.</b></label><input type="text" id="answerc" name="answerc" required="true"/></p>
    <p class="w3-row"><label><b>D.</b></label><input type="text" id="answerd" name="answerd" required="true"/></p>
    <p class="w3-row"><label><b>&nbsp;Select Answer:-</b></label>
        <select class="w3-large" name="answer" id="answer" required>
            <option selected disabled value="">Select</option>
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
            <option value="d">D</option>
        </select>
    </p>
    <p class="w3-center"><button class="w3-button w3-margin-bottom w3-green" type="submit">Save</button></p>
    </form>
    <p class="w3-text-green">saved successfully</p>
</div>
</div>