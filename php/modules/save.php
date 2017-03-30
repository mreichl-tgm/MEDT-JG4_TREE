<?php
include "db_connect.php";

$seminar_title = $_GET["seminar"];
$first_name = $_GET["firstname"];
$last_name = $_GET["lastname"];
$seminar_id = -1;
$user_id = -1;

if ($seminar_title == "" || $first_name == "" || $last_name == "") {
    $db = null;
    die();
}

$check_seminar = $db->query("SELECT seminarid, title FROM seminar");

if ($check_seminar->execute()) {
    while ($seminar = $check_seminar->fetch()) {
        if ($seminar["title"] == $seminar_title) {
            $seminar_id = $seminar["seminarid"];
            break;
        }
    }

    if ($seminar_id == -1) {
        $insert = $db->prepare("INSERT INTO seminar VALUES(0, :seminar_title)");
        $insert->bindParam(":seminar_title", $seminar_title);
        $insert->execute();

        $stmt = $db->query("SELECT MAX(seminarid) AS max_sid FROM seminar");
        if ($stmt->execute()) {
            $seminar_id = $stmt->fetch()["max_sid"];
        }
    }
}

$check_user = $db->query("SELECT userid, firstname, lastname FROM user");

if ($check_user->execute()) {
    $new = true;
    $attends = false;
    # Check if user is already in database
    while ($user = $check_user->fetch()) {
        # If given user is already in the database
        if ($user["firstname"] == $first_name && $user["lastname"] == $last_name) {
            $new = false;
            $user_id = $user["userid"];
            # Check attendance of this user
            $check_attendance = $db->query("SELECT seminarid, userid FROM attendance");
            if ($check_attendance->execute()) {
                while($attendance = $check_attendance->fetch()) {
                    # If given user already attends to this seminar
                    if ($attendance["seminarid"] == $seminar_id && $attendance["userid"] == $user_id) {
                        $attends = true;
                        break;
                    }
                }
            }

            break;
        }
    }

    if ($new) {
        $insert = $db->prepare("INSERT INTO user VALUES (0, :firstname, :lastname)");
        $insert->bindParam(":firstname", $first_name);
        $insert->bindParam(":lastname", $last_name);
        $insert->execute();

        $stmt = $db->query("SELECT MAX(userid) AS max_uid FROM user");
        if ($stmt->execute()) {
            $user_id = $stmt->fetch()["max_uid"];
        }
    }

    if (!$attends) {
        $insert = $db->prepare("INSERT INTO attendance VALUES (:userid, :seminarid)");
        $insert->bindParam(":userid", $user_id);
        $insert->bindParam(":seminarid", $seminar_id);
        $insert->execute();
    }
}

$db = null;

header('Location: ' . $_SERVER['HTTP_REFERER']);
die();