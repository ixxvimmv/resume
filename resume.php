<?php
$submitted = false;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $submitted = true;

    // Personal Information
    $first_name = htmlspecialchars($_POST['fname']);
    $middle_name = htmlspecialchars($_POST['mname']);
    $last_name = htmlspecialchars($_POST['lname']);
    $contact = htmlspecialchars($_POST['contact']);
    $address = htmlspecialchars($_POST['address']);
    $objectives = htmlspecialchars($_POST['objectives']);

    // Education
    $school_name = htmlspecialchars($_POST['sname']);
    $year_graduate = htmlspecialchars($_POST['year_graduate']);

    // Skills
    $skill1 = htmlspecialchars($_POST['skill1']);
    $skill2 = htmlspecialchars($_POST['skill2']);

    // Trainings/Seminars
    $training_title = htmlspecialchars($_POST['training_title']);
    $training_date = htmlspecialchars($_POST['training_date']);

    // References
    $ref_name = htmlspecialchars($_POST['ref_name']);
    $ref_contact = htmlspecialchars($_POST['ref_contact']);
}
?>