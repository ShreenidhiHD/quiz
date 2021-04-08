<?php
require_once "common/commonLibs.php";
require_once "common/DB.php";
require_once "common/userSession.php";

?>


<body>
<script type="text/javascript" src="common/jq.js"></script>
<div class="w3-container  w3-jumbo w3-center w3-padding">Quiz</div>
<div>
    <div class="w3-right w3-padding">
        <button class="w3-button w3-margin-bottom w3-indigo " onclick="javascript:location.href='userhome.php'">Goto Home</button>
        <button class="w3-button w3-margin-bottom w3-red" onclick="javascript:location.href='logout.php'">logout</button>
    </div>
</div>
<div class="w3-container w3-card-4">
    <div class="w3-container w3-card-4">
        <form method="get">
            <?php
            $qno=1;
            $getquizq=mysqli_query($conn,"select a.aid,a.question,a.answera,a.answerb,a.answerc,a.answerd,a.answer,b.uanswer from questions a,user_answers b where a.quizid=".$_REQUEST["quizid"]." and b.userid=".$_SESSION["id"]." and a.quizid=b.quizid and a.aid=b.aid order by a.aid");
            while ($getquizaa=mysqli_fetch_assoc($getquizq)){
                ?>
                <h2><?php echo $qno.'.'.$getquizaa["question"]; ?></h2>
                <p>
                    <input class="w3-check a-<?php echo $getquizaa["aid"]; ?>" type="checkbox" id="a" name="a[]" value="a" <?php if($getquizaa["uanswer"]=="a") echo "checked"; ?> />
                    <label class="<?php  if($getquizaa['answer']=='a' and $getquizaa["uanswer"]=="a") echo 'w3-text-green'; else if($getquizaa['answer']!='a' and $getquizaa["uanswer"]=="a") echo 'w3-text-red'; ?>"><?php echo $getquizaa["answera"];?></label></p>
                <p>
                    <input class="w3-check a-<?php echo $getquizaa["aid"]; ?>" type="checkbox" id="a" name="a[]" value="b" <?php if($getquizaa["uanswer"]=="b") echo "checked"; ?> />
                    <label class="<?php if($getquizaa['answer']=='b' and $getquizaa["uanswer"]=="b") echo 'w3-text-green'; else if($getquizaa['answer']!='b' and $getquizaa["uanswer"]=="b") echo 'w3-text-red'; ?>"><?php echo $getquizaa["answerb"];?></label></p>
                <p>
                    <input class="w3-check a-<?php echo $getquizaa["aid"]; ?>" type="checkbox"  id="a" name="a[]" value="c" <?php if($getquizaa["uanswer"]=="c") echo "checked"; ?> />
                    <label class="<?php if($getquizaa['answer']=='c' and $getquizaa["uanswer"]=="c") echo 'w3-text-green'; else if($getquizaa['answer']!='c' and $getquizaa["uanswer"]=="c") echo 'w3-text-red'; ?>"><?php echo $getquizaa["answerc"];?></label></p>
                <p>
                    <input class="w3-check a-<?php echo $getquizaa["aid"]; ?>" type="checkbox"  id="a" name="a[]" value="d" <?php if($getquizaa["uanswer"]=="d") echo "checked"; ?> />
                    <label class="<?php if($getquizaa['answer']=='d' and $getquizaa["uanswer"]=="d") echo 'w3-text-green'; else if($getquizaa['answer']!='d' and $getquizaa["uanswer"]=="d") echo 'w3-text-red'; ?>"><?php echo $getquizaa["answerd"];?></label></p>
                <p class="w3-xlarge" id="ranswer" name="ranswer"><b><?php echo "ans is:--" .$getquizaa["answer"];?></b></p>

                <script>
                    $(".a-"+<?php echo $getquizaa["aid"]; ?>).change(function() {
                        $(".a-"+<?php echo $getquizaa["aid"]; ?>).prop('checked', false);
                        $(this).prop('checked', true);
                    });
                </script>
                <?php
                $qno=$qno+1;
            }
            ?>
            <p class="w3-center"> <button type="button" class="w3-button w3-margin-bottom w3-indigo" onclick="location.href='userhome.php'">Goback</button></p>
        </form>
    </div>
</div>
</body>
