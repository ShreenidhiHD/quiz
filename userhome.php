<?php
require_once "common/commonLibs.php";
require_once "common/DB.php";
require_once "common/userSession.php";
?>
<body>
<div>
    <!-- Sidebar -->
    <div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
        <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
        <a href="profile.php" class="w3-bar-item w3-button">profile</a>
        <a href="userviewranklist.php" class="w3-bar-item w3-button">view ranklist</a>
        <a href="#" class="w3-bar-item w3-button" onclick="document.getElementById('changePasswordModal').style.display='block'">Change Password</a>
        <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
    </div>

    <!-- Page Content -->
    <div class="w3-black">
        <button class="w3-button w3-black w3-xlarge" onclick="w3_open()">☰</button>
    </div>
   <table class="w3-table-all">
       <thead>
       <tr>
           <th>Name</th>
           <th>Date</th>
           <th>join</th>
       </tr>
       </thead>
        <tbody>
        <?php
        $getq=mysqli_query($conn,"select * from quiz where qstatus='active' ");
        while ($getqu=mysqli_fetch_assoc($getq)){
            ?>
            <tr>
                <td><?php echo "quiz".$getqu["qid"];?></td>
                <td><?php echo $getqu["date"];?></td>
                <td><button class="w3-button w3-circle w3-indigo w3-hover-indigo" onclick="location.href='userwriteQuiz.php?q=<?php echo $getqu["qid"];?>'">+</button> </td>
            </tr>
            <?php
        }
        ?>

        </tbody>
   </table>


    <script>
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
        }
    </script>
</div>

<!-- change password modal-->

    <div id="changePasswordModal" class="w3-modal" >
        <div class="w3-modal-content w3-round w3-display-middle w3-margin-top " style="max-width: 500px;min-width: 350px">
            <div class="w3-container w3-padding">
                <span class="w3-button w3-display-topright" onclick="document.getElementById('changePasswordModal').style.display='none'">&times;</span>
                <div class="w3-center w3-xxlarge">Change Password</div>
                <form method="post" action="userChangePassword.php">
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
                        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="enter pasword again" minlength="6"  required="true" class="w3-input"/>
                    </p>
                    <p class="w3-center">
                        <button type="submit" name="submit" class="w3-button w3-green">Submit</button>
                    </p>
                </form>
            </div>
        </div>
    </div>


</body>



