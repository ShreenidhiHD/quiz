<?php

    $conn=new mysqli("sql206.epizy.com","epiz_25570868","5EZ7SbpYrLqf");
    $db_name="quiz";
    if($conn->connect_error){
        die($conn->connect_error);
    }

    if ($conn->query("create database if not exists ".$db_name)==true){
        $conn->select_db($db_name);
        if($conn->query("select 1 from users")==false){
            $tbl_one_status=$conn->query("create table users (uid int(10) auto_increment PRIMARY KEY,name VARCHAR (50),phone varchar(15),email VARCHAR (50),city varchar(30), pincode varchar(6), password varchar(50), status varchar(10), type varchar(10) )");

            if(!$tbl_one_status){
                die($conn->error);
            }
        }

        if($conn->query("select 1 from quiz")==false){
            $tbl_two_status=$conn->query("create table quiz (qid int(10) auto_increment PRIMARY key,date DATE, qstatus VARCHAR (10),uploaderid int(10) references users (uid))");

            if(!$tbl_two_status){
                die($conn->error);
            }
        }

        if($conn->query("select 1 from questions")==false){
            $tbl_three_status=$conn->query("create table questions (aid int(10) auto_increment PRIMARY KEY ,quizid int(10) REFERENCES quiz(qid),question VARCHAR (300), answera VARCHAR (50), answerb VARCHAR (50),answerc VARCHAR (50), answerd VARCHAR (50), answer VARCHAR (50))");

            if(!$tbl_three_status){
                die($conn->error);
            }
        }

        if($conn->query("select 1 from userscore")==false){
            $tbl_four_status=$conn->query("create table userscore (userid int(10) REFERENCES users(uid),quizid int(10) REFERENCES quiz(qid), score int(2),sdate date,submittime varchar(100))");

            if(!$tbl_four_status){
                die($conn->error);
            }
        }
        if($conn->query("select 1 from user_answers")==false){
            $tbl_four_status=$conn->query("create table user_answers (userid int(10) REFERENCES users(uid),quizid int(10) REFERENCES quiz(qid),aid int(10) REFERENCES questions(aid),uanswer varchar(1))");

            if(!$tbl_four_status){
                die($conn->error);
            }
        }
    }
    else{
        die($conn->connect_error);
    }

?>