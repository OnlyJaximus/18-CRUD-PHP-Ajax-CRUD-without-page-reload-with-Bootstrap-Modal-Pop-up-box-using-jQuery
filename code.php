<?php
require_once("dbconn.php");


# ili bez dbconn.php
// $con = mysqli_connect('localhost', 'root', '', 'adminpanel');

//  ************************************** Dodavanje Studenta **************************************
if (isset($_POST['save_student'])) {

    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
    $course = mysqli_real_escape_string($mysqli, $_POST['course']);


    if ($name == NULL || $email == NULL || $phone == NULL || $course == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory!'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "INSERT INTO students_crud (name, email, phone, course)
     VALUES ('$name', '$email', '$phone', '$course')";

    $query_run = mysqli_query($mysqli, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Student Created Successfully!'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Student Not Created!!'
        ];
        echo json_encode($res);
        return false;
    }
}



// **************************************  Editovanje Studenta **************************************
if (isset($_GET['student_id'])) {
    $student_id = mysqli_real_escape_string($mysqli, $_GET['student_id']);

    $query = "SELECT * FROM students_crud WHERE id = '$student_id' LIMIT 1";
    $query_run = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($query_run) == 1) {

        $student = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'Student Fetch Successfully by id!',
            'data' => $student
        ];
        echo json_encode($res);
        return true;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Student ID Not Found!'
        ];
        echo json_encode($res);
        return false;
    }
}

// ************************************** Sacuvavanje Studenta **************************************
if (isset($_POST['update_student'])) {

    $student_id = mysqli_real_escape_string($mysqli, $_POST['student_id']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
    $course = mysqli_real_escape_string($mysqli, $_POST['course']);


    if ($name == NULL || $email == NULL || $phone == NULL || $course == NULL) {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory!'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "UPDATE students_crud  SET name ='$name', email='$email', phone='$phone', course='$course' 
    WHERE id='$student_id'";

    $query_run = mysqli_query($mysqli, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Student Updated Successfully!'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Student Not Updated!!'
        ];
        echo json_encode($res);
        return false;
    }
}


// **************************************  Brisanje Studenta **************************************
if (isset($_POST['delete_student'])) {

    $student_id = mysqli_real_escape_string($mysqli, $_POST['student_id']);

    $query = "DELETE FROM  students_crud WHERE id = '$student_id'";
    $query_run = mysqli_query($mysqli, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Student Deleted Successfully!'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Student Not Deleted!'
        ];
        echo json_encode($res);
        return false;
    }
}
