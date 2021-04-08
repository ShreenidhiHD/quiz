<?php
require_once "common/commonLibs.php";
require_once "common/DB.php";

?>

<div class="w3-hide-large w3-hide-medium">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: white;
        }

        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
            background-color: white;
        }

        /* Full-width input fields */
        .inp {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        .inp:focus{
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .registertion {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registertion:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .heading{

        }
    </style>

    <form method="post" action="checkUser.php">
        <div>
            <h1><center>Quiz Compitation<center> </h1>
        </div>
        <div class="container">
            <h1><center>Login</center></h1>
            <p>
                <label for="mno"><b>Mobile Number</b></label>
                <input type="text" id="mno" name="mno" placeholder="Enter Mobile Number" required="true" class="w3-input inp"/>
            </p>
            <p>
                <label for="Password"><b>Enter Password</b></label>
                <input type="password" id="Password" name="Password" placeholder="enter  password" minlength="6"  required="true" class="w3-input inp"/>
            </p>
            <p class="w3-center">
                <button type="submit" name="submit" class="registertion">submit</button>
            </p>
        </div>

    </form>
    <div class="w3-container w3-small w3-right w3-text-blue"><a href="regestration.php">don't have account??? click here</a></div>
</div>

    <div class="w3-hide-small">
        <div class="w3-modal" style="display: block">
            <div class="w3-modal-content w3-display-middle" style="max-width: 500px">
                <div class="w3-container w3-padding">
                    <div class="w3-center w3-xxlarge">Login</div>
                    <form method="post" action="checkUser.php">
                        <p>
                            <label for="mobileNumber">Enter mobile Number</label>
                            <input type="text" id="mobileNumber" name="mno"  placeholder="enter Mobile Number" required="true" class="w3-border w3-input"/>
                        </p>
                        <p>
                            <label for="password">Password</label>
                            <input type="password" id="password" name="Password" placeholder="enter password" minlength="6"  required="true" class="w3-border w3-input"/>
                        </p>
                        <p class="w3-center">
                            <button type="submit" name="submit" class="w3-button w3-green w3-large">Submit</button>
                        </p>
                    </form>
                    <div class="w3-container w3-small w3-right w3-text-blue"><a href="regestration.php">don't have account??? click here</a></div>
                </div>
            </div>
        </div>
    </div>

</div>