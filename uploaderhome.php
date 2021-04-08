<?php require_once "common/commonLibs.php";
    require_once "common/DB.php";
require_once "common/uploaderSession.php";
?>
<body>
<div class="w3-container  w3-jumbo w3-center w3-light-gray w3-padding">Quiz</div>
<div>
    <div class="w3-right w3-padding">
        <button class="w3-button w3-margin-bottom w3-indigo " onclick="javascript:location.href='uploaderAddquiz.php'">Add Quiz</button>
        <button class="w3-button w3-margin-bottom w3-aqua" onclick="document.getElementById('continueModal').style.display='block'">Change Password</button>
        <button class="w3-button w3-margin-bottom w3-red" onclick="javascript:location.href='index.php'">logout</button>
    </div>
</div>
        <div id="continueModal" class="w3-modal" >
            <div class="w3-modal-content w3-round w3-display-middle w3-margin-top " style="max-width: 500px;min-width: 350px">
                <div class="w3-container w3-padding">
                    <span class="w3-button w3-display-topright" onclick="document.getElementById('continueModal').style.display='none'">&times;</span>
                    <form method="post" action="uploaderChangePassword.php">
                        <div class="w3-center w3-xxlarge">Change Password</div>
                        <p>
                            <label for="oldPassword">Enter Old Password</label>
                            <input type="password" id="oldPassword" name="oldPassword" placeholder="enter old password" minlength="6" required="true" class="w3-input"/>
                        </p>
                        <p>
                            <label for="newPassword">Enter your new Password</label>
                            <input type="password" id="newPassword" name="newPassword"  placeholder="enter new password" minlength="6" required="true" class="w3-input"/>
                        </p>
                        <p>
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="enter pasword again"  minlength="6" required="true" class="w3-input"/>
                        </p>
                        <p class="w3-center">
                            <button type="submit" name="submit" class="w3-button w3-green">Submit</button>
                        </p>
                </div>
                    </form>

            </div>
        </div>
    </form>
<div>
    <div class="w3-container">
        <table class="w3-table-all ">
            <thead>
            <tr>
                <th>id</th>
                <th>date</th>
                <th>View</th>
                <th>Status</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>
        <?php
        $getDe=mysqli_query($conn,"select * from quiz where uploaderid=".$_SESSION["id"]);
        while ($gd=mysqli_fetch_assoc($getDe)) {
            ?>
            <tr>
                <td><?php echo $gd["qid"]; ?></td>
                <td><?php echo $gd["date"]; ?></td>
                <td>
                    <button class="w3-button" onclick="javascript:location.href='uploaderAddQuestion.php?quizid=<?php echo $gd["qid"]; ?>'">
                        View
                    </button>
                <td><?php echo $gd["qstatus"]; ?></td>
                <td><button class="w3-button" onclick="javascript:location.href='uploaderQuiztoggle.php?quizid=<?php echo $gd["qid"]; ?>'">Change Status</button> </td>
                </td>
            </tr>
            <?php
        }
        ?>
            </tbody>
        </table>
    </div>
</div>
</body>