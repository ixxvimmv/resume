<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Personal Info
    $first_name = htmlspecialchars($_POST['first_name']);
    $middle_name = htmlspecialchars($_POST['middle_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $contact = htmlspecialchars($_POST['contact']);
    $email = htmlspecialchars($_POST['email']);
    $address = htmlspecialchars($_POST['address']);
    $objectives = htmlspecialchars($_POST['objectives']);

    // Education
    $school_name = htmlspecialchars($_POST['school_name']);
    $year_graduate = htmlspecialchars($_POST['year_graduate']);

    // Skills
    $skill1 = htmlspecialchars($_POST['skill1']);
    $skill2 = htmlspecialchars($_POST['skill2']);
    $skill3 = htmlspecialchars($_POST['skill3']);

    // Trainings
    $training_title = htmlspecialchars($_POST['training_title']);
    $training_date = htmlspecialchars($_POST['training_date']);

    // References
    $ref_name = htmlspecialchars($_POST['ref_name']);
    $ref_contact = htmlspecialchars($_POST['ref_contact']);

    // Profile Picture Upload
    $profile_pic_url = '';
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
        $upload_dir = 'uploads/';
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $filename = basename($_FILES['profile_pic']['name']);
        $target_file = $upload_dir . time() . '_' . $filename;
        if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file)) {
            $profile_pic_url = $target_file;
        }
    }
} else {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $first_name . " " . $last_name; ?> - Resume</title>
  <link rel="stylesheet" href="resume.css">
</head>
<body>

<div class="resume">
    <div class="header">
        <?php if ($profile_pic_url != ''): ?>
            <img src="<?php echo $profile_pic_url; ?>" alt="Profile Picture">
        <?php endif; ?>
        <div>
            <h1><?php echo $first_name . " " . $middle_name . " " . $last_name; ?></h1>
            <p><strong>Contact:</strong> <?php echo $contact; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Address:</strong> <?php echo $address; ?></p>
        </div>
    </div>

    <div class="section">
        <h2>Career Objective</h2>
        <p><?php echo $objectives; ?></p>
    </div>

    <div class="section">
        <h2>Education</h2>
        <p><?php echo $school_name . " — Graduated " . $year_graduate; ?></p>
    </div>

    <div class="section">
        <h2>Skills</h2>
        <ul>
            <li><?php echo $skill1; ?></li>
            <li><?php echo $skill2; ?></li>
            <li><?php echo $skill3; ?></li>
        </ul>
    </div>

    <div class="section">
        <h2>Trainings & Seminars</h2>
        <p><?php echo $training_title . " (" . $training_date . ")"; ?></p>
    </div>

    <div class="section">
        <h2>References</h2>
        <p><?php echo $ref_name . " — " . $ref_contact; ?></p>
    </div>
</div>

</body>
</html>
