<?php
require_once "common/commonLibs.php";
require_once "common/DB.php";
require_once "common/adminSession.php";

?>


<body>
<script type="text/javascript" src="common/jq.js"></script>
<div class="w3-container  w3-jumbo w3-center w3-padding">Quiz</div>
<div>
    <div class="w3-right w3-padding">
        <button class="w3-button w3-margin-bottom w3-indigo " onclick="javascript:location.href='adminquiz.php'">Back</button>
        <button class="w3-button w3-margin-bottom w3-red" onclick="javascript:location.href='logout.php'">logout</button>
    </div>
</div>
<div class="w3-container w3-card-4">
    <div class="w3-container w3-card-4">
        <form method="get">
            <?php
            $qno=1;
            $getquizq=mysqli_query($conn,"select aid,question,answera,answerb,answerc,answerd,answer from questions where quizid=".$_REQUEST["quizid"]." order by aid");
            while ($getquiza=mysqli_fetch_assoc($getquizq)){
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
                <p class="w3-xlarge" id="ranswer" name="ranswer"><b><?php echo "ans is:--" .$getquiza["answer"];?></b></p>

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
            <p class="w3-center"> <button type="button" class="w3-button w3-margin-bottom w3-indigo" onclick="location.href='adminquiz.php'">Goback</button></p>
        </form>
    </div>
</div>
</body>
