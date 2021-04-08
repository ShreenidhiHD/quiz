<?php
require_once "common/commonLibs.php";
require_once "common/DB.php";
require_once "common/userSession.php";

$msg="";

if(!isset($_REQUEST["qid"]) or empty($_REQUEST["qid"]) or !isset($_REQUEST["sdate"]) or empty($_REQUEST["sdate"]) or !isset($_REQUEST["stime"]) or empty($_REQUEST["stime"]) or!isset($_REQUEST["aid"]) or empty($_REQUEST["aid"]) or !isset($_REQUEST["a"]) or empty($_REQUEST["a"])){
    $msg="Not enough data.<br />";
}

$quizid=$_REQUEST["qid"];
$score=0;
$f=0;

$userQuiz=mysqli_query($conn,"select * from user_answers where userid=".$_SESSION["id"]." and quizid=".$quizid);
if(mysqli_num_rows($userQuiz)==0){


    for($i=0;$i<sizeof($_REQUEST["aid"]);$i++){
        $userAns=mysqli_query($conn,"insert into user_answers (userid,quizid,aid,uanswer) values (".$_SESSION["id"].",".$_REQUEST["qid"].",".$_REQUEST["aid"][$i].",'".$_REQUEST["a"][$i]."')");
        if($userAns){
            $f=$f+1;
        }
        else{
            $f=0;
        }
    }

    $score=0;
    $calScore=mysqli_query($conn,"select * from user_answers a,questions b where a.userid=".$_SESSION["id"]." and a.quizid=b.quizid and a.aid=b.aid and a.uanswer=b.answer and a.quizid=".$_REQUEST["qid"]);
    $score=mysqli_num_rows($calScore);

    $date = date("Y-m-d");
    $time=date("h:i:s");
    $insertuserscore=mysqli_query($conn,"insert into userscore (userid,quizid,score,sdate,submittime) values (".$_SESSION["id"].",".$_REQUEST["qid"].",".$score.",'".$_REQUEST["sdate"]."','".$_REQUEST["stime"]."')");
    if($insertuserscore){
        $msg=$msg."Your score is ".$score.".<br />";
    }
    else{
        $msg=$msg."Unable to calculate.<br />";
    }
}
else{
    $msg=$msg."already answered.<br />";
}

?>

<div class="w3-modal" style="display: block">
    <div class="w3-modal-content w3-display-middle">
        <span class="w3-button w3-display-topright" onclick="javascript:location.href='userwriteQuiz.php?q=<?php echo $_REQUEST["qid"]; ?>'">&times;</span>
        <div class="w3-container w3-padding w3-center">
            <div class="w3-xxlarge"><?php echo $msg; ?></div>
        </div>
    </div>
</div>
