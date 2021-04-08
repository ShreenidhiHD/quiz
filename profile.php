<?php
require_once "common/commonLibs.php";
require_once "common/DB.php";
require_once "common/userSession.php";

$fetchDetailsQuery=mysqli_query($conn,"select * from users where type='user' and uid=".$_SESSION["id"]);
while ($fdq=mysqli_fetch_assoc($fetchDetailsQuery)){
?>
<div class="w3-modal" style="display: block">
    <div class="w3-modal-content" style="max-width: 500px">
        <span class="w3-button w3-display-topright" onclick="javascript:location.href='userhome.php'">&times;</span>
        <div class="w3-container w3-padding">
            <div class="w3-center w3-xxlarge">Profile</div>
            <form method="post" action="userProfileUpdate.php">
                <p>
                    <label for="Name"><b>Name</b></label>
                    <input type="text" id="name" name="name" placeholder="Enter Name" required="true" class="w3-input w3-border"  value="<?php echo $fdq["name"]; ?>"/>
                </p>
                <p>
                    <label for="mobileNumber"><b>Enter mobile Number</b></label>
                    <input type="text" id="mobileNumber" name="mno"  placeholder="enter Mobile Number" required="true" class="w3-border w3-input" readonly value="<?php echo $fdq["phone"]; ?>"/>
                </p>
                <p>
                    <label for="email"><b>email</b></label>
                    <input type="email" id="email" name="email" placeholder="Enter email" required="true" class="w3-input w3-border " readonly value="<?php echo $fdq["email"]; ?>"/>
                </p>
                <p>
                    <label for="city"><b>City</b></label>
                    <input type="text" id="city" name="city" placeholder="Enter city" required="true" class="w3-input w3-border "  value="<?php echo $fdq["city"]; ?>"/>
                </p>
                <p>
                    <label for="pincode"><b>Pincode</b></label>
                    <input type="number" id="pincode" name="pincode" placeholder="Enter pincode" required="true" class="w3-input w3-border "  value="<?php echo $fdq["pincode"]; ?>"/>
                </p>
                <p class="w3-center">
                    <button type="submit" name="submit" class="w3-button w3-green w3-large" >Update Profile</button>
                </p>
            </form>
        </div>
    </div>
</div>
<?php
    }
    ?>