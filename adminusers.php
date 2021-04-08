<?php
require_once "common/commonLibs.php";
require_once "common/DB.php";
require_once "common/adminSession.php";
?>
<body>
<div class="w3-container w3-center w3-jumbo w3-light-blue">Quiz</div>
<div>
    <div class="w3-right">
        <button class="w3-button w3-margin-bottom w3-orange" onclick="javascript:location.href='adminhome.php'">Back</button>
        <button class="w3-button w3-margin-bottom w3-red" onclick="javascript:location.href='logout.php'">logout</button>
    </div>
        <div class="w3-container">
            <table class="w3-table-all ">
                <thead>
                <tr>
                    <th>name</th>
                    <th>city</th>
                    <th>view profile</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $getDe=mysqli_query($conn,"select * from users where type ='user'");
                while ($gd=mysqli_fetch_assoc($getDe)){
                    ?>
                    <tr>
                        <td><?php echo $gd["name"]; ?></td>
                        <td><?php echo $gd["city"]; ?></td>
                        <td><button class="w3-button" onclick="javascript:location.href='adminusers.php?k=<?php echo $gd["uid"]; ?>'">View</button> </td>
                    </tr>
                    <?php
                }
                ?>


                </tbody>
            </table>
        </div>

    <?php
    if(isset($_REQUEST["k"]) and !empty($_REQUEST["k"])){
    $fetchDetailsQuery=mysqli_query($conn,"select * from users where type='user' and uid=".$_REQUEST["k"]);
    while ($fdq=mysqli_fetch_assoc($fetchDetailsQuery)){
    ?>

        <div id="viewProfileModal" class="w3-modal" style="display: block" >
            <div class="w3-modal-content w3-round w3-display-middle w3-margin-top " style="max-width: 500px;min-width: 350px">
                <div class="w3-container w3-padding">
                    <span class="w3-button w3-display-topright" onclick="document.getElementById('viewProfileModal').style.display='none'">&times;</span>
                    <div class="w3-center w3-xxlarge">Details</div>
                    <form>
                        <p>
                            <label for="uname">name</label>
                            <input type="text" id="uname" name="uname" placeholder="Enter name" required="true" class="w3-input" readonly value="<?php echo $fdq["name"]; ?>"/>
                        </p>
                        <p>
                            <label for="mno">Mobile Number</label>
                            <input type="number" id="mno" name="mno" placeholder="Enter Mobile Number" required="true" class="w3-input" readonly value="<?php echo $fdq["phone"]; ?>"/>
                        </p>
                        <p>
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" placeholder="Enter City" required="true" class="w3-input" readonly value="<?php echo $fdq["city"]; ?>"/>
                        </p>
                        <p>
                            <label for="pincode">Pincode</label>
                            <input type="number" id="pincode" name="pincode" placeholder="Enter pincode" required="true" class="w3-input" readonly value="<?php echo $fdq["pincode"]; ?>"/>
                        </p>
                        <p>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter email" required="true" class="w3-input" readonly value="<?php echo $fdq["email"]; ?>"/>
                        </p>
                </div>
            </div>
        </div>
    </form>
        <?php
    }
    }
    ?>

    </div>
</div>
</body>