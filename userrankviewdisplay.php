<?php
require_once "common/commonLibs.php";
require_once "common/DB.php";

require_once "common/userSession.php";
?>
<div class="w3-container w3-center w3-jumbo w3-light-blue">Quiz</div>
<div>
    <div class="w3-right">
        <button class="w3-button w3-margin-bottom w3-orange" onclick="javascript:location.href='userviewranklist.php'">Back</button>
        <button class="w3-button w3-margin-bottom w3-red" onclick="javascript:location.href='logout.php'">logout</button>
    </div>
    <div class="w3-container">
        <table class="w3-table-all">
            <thead>
            <tr>
                <th>name</th>
                <th>score</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $getq=mysqli_query($conn,"select * from userscore a,quiz b,users c where a.quizid=b.qid and a.sdate=b.date  and a.userid=c.uid and a.sdate='".$_REQUEST["qdate"]."'order by a.score desc");
            if($getq) {
                while ($getqscore = mysqli_fetch_assoc($getq)) {
                    if($getqscore["userid"]==$_SESSION["id"]){
                        ?>
                        <tr>
                            <th><?php echo $getqscore["name"]; ?></th>
                            <th><?php echo $getqscore["score"]; ?></th>
                        </tr>
                        <?php
                    }
                    else{
                        ?>
                        <tr>
                            <td><?php echo $getqscore["name"]; ?></td>
                            <td><?php echo $getqscore["score"]; ?></td>
                        </tr>
                        <?php
                    }
                }
            }
            else{
                echo "failed to load";
            }
            ?>

            </tbody>
        </table>
    </div>
</div>
</div>