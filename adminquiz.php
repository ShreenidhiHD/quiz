<?php
require_once "common/commonLibs.php";
require_once "common/DB.php";
require_once "common/adminSession.php";
?>
<body>
<div class="w3-container w3-center w3-xxlarge w3-light-blue">quiz management</div>
<div>
    <div class="w3-right">
        <button class="w3-button w3-margin-bottom w3-orange" onclick="javascript:location.href='adminhome.php'">Back</button>
        <button class="w3-button w3-margin-bottom w3-red" onclick="javascript:location.href='logout.php'">logout</button>
    </div>
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
            $getDe=mysqli_query($conn,"select * from quiz");
            while ($gd=mysqli_fetch_assoc($getDe)) {
            ?>
            <tr>
                <td><?php echo $gd["qid"]; ?></td>
                <td><?php echo $gd["date"]; ?></td>
                <td>
                    <button class="w3-button" onclick="javascript:location.href='adminviewquestion.php?quizid=<?php echo $gd["qid"]; ?>'">
                        View
                    </button>
                <td><?php echo $gd["qstatus"]; ?></td>
                <td><button class="w3-button" onclick="javascript:location.href='adminQuiztoggle.php?quizid=<?php echo $gd["qid"]; ?>'">Change Status</button> </td>
                </td>
            </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</body>