<?php
    require_once "common/commonLibs.php";
    require_once "common/DB.php";
require_once "common/adminSession.php";
?>
<div class="w3-container w3-center w3-jumbo w3-light-blue">Quiz</div>
<div>
    <div class="w3-right">
        <button class="w3-button w3-margin-bottom w3-indigo" onclick="javascript:location.href='adminviewranklist.php'">View Ranklist</button>
        <button class="w3-button w3-margin-bottom w3-red" onclick="javascript:location.href='logout.php'">logout</button>
    </div>
    <div class="w3-row-padding w3-margin-top w3-mobile">
        <div class="w3-col l3 m4 s12">
            <div class="w3-card-4 w3-round w3-margin-bottom w3-border w3-border-orange">
                <header class="w3-container w3-xlarge w3-center w3-orange">Quiz</header>
                <p>Quiz:
                    <span class="w3-badge"></span></p>
                <footer class="w3-container w3-orange">
                    <button class="w3-button w3-right" type="button">
                        <a href="adminquiz.php" class="continue">Continue&raquo;</a>
                    </button>
                </footer>
            </div>
        </div>
        <div class="w3-col l3 m4 s12">
            <div class="w3-card-4 w3-round w3-margin-bottom w3-border w3-border-light-blue">
                <header class="w3-container w3-xlarge w3-center w3-blue">Uploaders</header>
                <p>Uploaders:
                    <span class="w3-badge"></span></p>
                <footer class="w3-container w3-blue">
                    <button class="w3-button w3-right" type="button">
                        <a href="adminuploader.php" class="continue">Continue&raquo;</a>
                    </button>
                </footer>
            </div>
        </div>
        <div class="w3-col l3 m4 s12">
            <div class="w3-card-4 w3-round w3-margin-bottom w3-border w3-border-light-blue">
                <header class="w3-container w3-xlarge w3-center w3-indigo">Users</header>
                <p>Users:
                    <span class="w3-badge"></span></p>
                <footer class="w3-container w3-indigo">
                    <button class="w3-button w3-right" type="button">
                        <a href="adminusers.php" class="continue">Continue&raquo;</a>
                    </button>
                </footer>
            </div>
        </div>
        <div class="w3-col l3 m4 s12">
            <div class="w3-card-4 w3-round w3-margin-bottom w3-border w3-border-yellow">
                <header class="w3-container w3-xlarge w3-center w3-yellow">Password</header>
                <p>Change password</p>
                <p></p>
                <footer class="w3-container w3-yellow">
                    <button class="w3-button w3-right" onclick="document.getElementById('continueModal').style.display='block'">Continue &raquo;</button>
                </footer>
            </div>
        </div>
    </div>
</div>

<div class="w3-modal" id="continueModal">
    <div class="w3-modal-content w3-display-middle w3-round" style="max-width: 500px; min-width: 300px">
        <span class="w3-button w3-display-topright" onclick="document.getElementById('continueModal').style.display='none'">&times;</span>
        <div class="w3-container w3-padding">
            <div class="w3-center w3-xxlarge">Change Password</div>
            <form method="post" action="adminPassword.php">
                <p>
                    <label for="oldPassword">Enter Old Password</label>
                    <input type="password" id="oldPassword" name="oldPassword" placeholder="enter old password"  required="true" minlength="6" class="w3-input"/>
                </p>
                <p>
                    <label for="newPassword">Enter your new Password</label>
                    <input type="password" id="newPassword" name="newPassword"  placeholder="enter new password" required="true" minlength="6" class="w3-input"/>
                </p>
                <p>
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="enter pasword again" minlength="6" required="true" class="w3-input"/>
                </p>
                <p class="w3-center">
                    <button type="submit" name="submit" class="w3-button w3-green">Submit</button>
                </p>
            </form>
        </div>
    </div>
</div>