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
        <table class="w3-table-all">
            <thead>
            <tr>
                <th>name</th>
                <th>date</th>
                <th>View</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $getq=mysqli_query($conn,"select * from quiz where qstatus='active' ");
            while ($getqu=mysqli_fetch_assoc($getq)) {
                ?>
                <tr>
                    <td><?php echo "quiz" . $getqu["qid"]; ?></td>
                    <td><?php echo $getqu["date"]; ?></td>
                    <td><a href="adminrankviewdisplay.php?qdate=<?php echo $getqu["date"]; ?>">View</a></td>
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
