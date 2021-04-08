<?php
require_once "common/commonLibs.php";
require_once "common/DB.php";
require_once "common/userSession.php";

if(!isset($_REQUEST["q"]) or empty($_REQUEST["q"])){
    ?>
    <div class="w3-modal" id="errorMsg" style="display: block">
    <div class="w3-modal-content  w3-mobile">
        <div class="w3-container w3-padding">
        <div class="w3-center w3-xxlarge">Please select quiz</div>
          <p class="w3-center"><button class="w3-button w3-center w3-green" onclick="location.href='userhome.php'">Okey</button></p>
        </div>
    </div>
</div>
<?php
    die();
}


$checkd=mysqli_query($conn,"select date from quiz where qid='".$_REQUEST["q"]."' and qstatus='active'");
$currentDate=date("d-m-Y");
if($checkd and mysqli_num_rows($checkd)>0){
    while($cd=mysqli_fetch_assoc($checkd)){
        if(isset($cd["date"]) and strtotime($currentDate)<strtotime($cd["date"])){
            ?>
            <div class="w3-modal" id="errorMsg" style="display: block">
                <div class="w3-modal-content  w3-mobile">
                    <div class="w3-container w3-padding">
                        <div class="w3-center w3-xxlarge">this quiz is not published</div>
                        <p class="w3-center"><button class="w3-button w3-center w3-green" onclick="location.href='userhome.php'">Okey</button></p>
                    </div>
                </div>
            </div>
            <?php
            die();
        }
    }
}
else{
    ?>
    <div class="w3-modal" id="errorMsg" style="display: block">
        <div class="w3-modal-content  w3-mobile">
            <div class="w3-container w3-padding">
                <div class="w3-center w3-xxlarge">this quiz is deactivated.</div>
                <p class="w3-center"><button class="w3-button w3-center w3-green" onclick="location.href='userhome.php'">Okey</button></p>
            </div>
        </div>
    </div>
    <?php
    die();
}

$checkqstns=mysqli_query($conn,"select * from questions where quizid=".$_REQUEST["q"]);
if(mysqli_num_rows($checkqstns)!=10){
    ?>
    <div class="w3-modal" id="errorMsg" style="display: block">
        <div class="w3-modal-content  w3-mobile">
            <div class="w3-container w3-padding">
                <div class="w3-center w3-xxlarge">this quiz is not completely uploaded.</div>
                <p class="w3-center"><button class="w3-button w3-center w3-green" onclick="location.href='userhome.php'">Okey</button></p>
            </div>
        </div>
    </div>
    <?php
    die();
}

$checks=mysqli_query($conn,"select * from userscore where quizid='".$_REQUEST["q"]."' and userid='".$_SESSION["id"]."'");
$score="";
$dates=date("d-m-Y");
while($cs=mysqli_fetch_assoc($checks)) {
    $score = $cs["score"];
    $dates = $cs["sdate"];
}
if(!empty($score) and !empty($dates)) {
    ?>
    <div class="w3-modal" id="errorMsg" style="display: block">
        <div class="w3-modal-content  w3-mobile">
            <div class="w3-container w3-padding">
                <div
                    class="w3-center w3-xxlarge"><?php echo "you wrote this quiz on this day ". date('d-m-Y',strtotime($dates)).".<br />Your score is ".$score; ?></div>
                <p class="w3-center">
                    <button class="w3-button w3-center w3-green" onclick="location.href='userhome.php'">Back</button>
                    <button class="w3-button w3-center w3-green" onclick="location.href='userviewquestions.php?quizid=<?php echo $_REQUEST["q"];?>'">View Answers</button>
                </p>
            </div>
        </div>
    </div>
    <?php
    die();
}
$quizCheck=mysqli_query($conn,"select * from user_answers where quizid='".$_REQUEST["q"]."' and userid=".$_SESSION["id"]);
$quizScore=mysqli_query($conn,"select * from user_answers a,questions b where a.userid=".$_SESSION["id"]." and a.quizid=b.quizid and a.aid=b.aid and a.uanswer=b.answer and a.quizid=".$_REQUEST["q"]);
$score=mysqli_num_rows($quizScore);
if(mysqli_num_rows($quizCheck)>0){
    ?>
    <div class="w3-modal" id="errorMsg" style="display: block">
        <div class="w3-modal-content  w3-mobile">
            <div class="w3-container w3-padding">
                <div
                    class="w3-center w3-xxlarge"><?php echo "You wrote this quiz.<br />Your score is:".$score; ?></div>
                <p class="w3-center">
                    <button class="w3-button w3-center w3-green" onclick="location.href='userhome.php'">Okey</button>
                </p>
            </div>
        </div>
    </div>
    <?php
    die();
}


?>
<body>
<script type="text/javascript" src="common/jq.js"></script>
<div class="w3-container  w3-jumbo w3-center w3-padding">Quiz</div>
<div>
    <div class="w3-right w3-padding">
        <button class="w3-button w3-margin-bottom w3-indigo " onclick="javascript:location.href='userhome.php'">Back</button>
        <button class="w3-button w3-margin-bottom w3-red" onclick="javascript:location.href='logout.php'">logout</button>
    </div>
</div>
<div class="w3-container w3-card-4">
    <div class="w3-container w3-card-4">
        <form method="get" action="userAnsSave.php">
            <?php
            $qno=1;

            $date = date("d-m-Y");
            $time=date("h:i:s");

            echo "<input type='date' name='sdate' hidden required readonly value='<?php echo $date; ?>'>";
            echo "<input type='text' name='stime' hidden required readonly value='<?php echo $time; ?>'>";
            $getquiz=mysqli_query($conn,"select aid,question,answera,answerb,answerc,answerd from questions where quizid=".$_REQUEST["q"]." order by aid");
            while ($getquiza=mysqli_fetch_assoc($getquiz)){
                ?>
                <h2><?php echo $qno.'.'.$getquiza["question"]; ?></h2>
                <p>
                    <input name="aid[]" hidden readonly value="<?php echo $getquiza["aid"]; ?>">
                    <input name="qid" hidden readonly value="<?php echo $_REQUEST["q"]; ?>">
                    <input class="w3-check a-<?php echo $getquiza["aid"]; ?>" type="checkbox" hidden checked id="a" name="a[]" value="0" />
                    <input class="w3-check a-<?php echo $getquiza["aid"]; ?>" type="checkbox" id="a" name="a[]" value="a" />
                    <label><?php echo $getquiza["answera"];?></label></p>
                <p>
                    <input class="w3-check a-<?php echo $getquiza["aid"]; ?>" type="checkbox" id="a" name="a[]" value="b" />
                    <label><?php echo $getquiza["answerb"];?></label></p>
                <p>
                    <input class="w3-check a-<?php echo $getquiza["aid"]; ?>" type="checkbox"  id="a" name="a[]" value="c"/>
                    <label><?php echo $getquiza["answerc"];?></label></p>
                <p>
                    <input class="w3-check a-<?php echo $getquiza["aid"]; ?>" type="checkbox"  id="a" name="a[]" value="d" />
                    <label><?php echo $getquiza["answerd"];?></label></p>
                <script>
                    $(".a-"+<?php echo $getquiza["aid"]; ?>).change(function() {
                        $(".a-"+<?php echo $getquiza["aid"]; ?>).prop('checked', false);
                        $(this).prop('checked', true);
                    });
                </script>
                 <?php
                $qno=$qno+1;
            }
            ?>
            <p class="w3-center"> <button type="submit" class="w3-button w3-margin-bottom w3-green">Submit</button></p>
        </form>
    </div>
</div>
</body>


