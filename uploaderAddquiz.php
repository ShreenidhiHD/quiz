<?php
require_once "common/commonLibs.php";
require_once "common/DB.php";
require_once "common/uploaderSession.php";
?>

<body>

<div class="w3-modal" id="tempSelectDateModal" style="display: block">
<div class="w3-modal-content" style="max-width: 500px">
    <div class="w3-container w3-padding">
        <div class="w3-center w3-xxlarge">Select Date</div>
        <form method="post">
            <p>
                <label for="SelectDate"><b>Select Date</b></label>
                <input type="date" id="date" name="date" title="select date" required="true" class="w3-input w3-border"/>
            </p>
            <p class="w3-center"><button class="w3-button w3-margin-bottom w3-green" name="continue" type="submit">Continue</button>
                <button class="w3-button w3-margin-bottom w3-green" name="continue" type="button" onclick="location.href='uploaderhome.php'">goback</button></p>
        </form>
    </div>
</div>
    <?php
    if(isset($_REQUEST["continue"])){
        $currentDate=date("Y-m-d");
        if(isset($_REQUEST["date"]) and strtotime($currentDate)<strtotime($_REQUEST["date"])){
            $saveDate=mysqli_query($conn,"insert into quiz (date,qstatus,uploaderid) values ('".$_REQUEST["date"]."','active','".$_SESSION["id"]."')");
            if($saveDate){
                ?>
                <div class="w3-modal" id="errorMsg" style="display: block">
                    <div class="w3-modal-content  w3-mobile">
                        <span class="w3-button w3-display-topright" onclick="location.href='uploaderhome.php'">&times;</span>
                        <div class="w3-container w3-padding">
                            <div class="w3-xxlarge w3-center">quiz added</div>
                        </div>
                    </div>
                </div>
                <?php
            }
            else{
                ?>
                <div class="w3-modal" id="errorMsg" style="display: block">
                    <div class="w3-modal-content  w3-mobile">
                        <span class="w3-button w3-display-topright" onclick="location.href='uploaderhome.php'">&times;</span>
                        <div class="w3-container w3-padding">
                            <div class="w3-xxlarge w3-center">query failed</div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
          else{
              ?>
              <div class="w3-modal" id="errorMsg" style="display: block">
                <div class="w3-modal-content  w3-mobile">
                  <span class="w3-button w3-display-topright" onclick="location.href='uploaderhome.php'">&times;</span>
                    <div class="w3-container w3-padding">
                        <div>unable to save date</div>
                    </div>
                 </div>
                </div>
            <?php
          }
    }

    ?>
</body>