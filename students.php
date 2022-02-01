<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="students.js"></script>
    <link rel = 'stylesheet' href = "students.css" />
    <link rel = 'stylesheet' href = "../bootstrap/css/bootstrap.css" />
    <link rel = 'stylesheet' href = "../fontawesome/css/all.css" />
    <title>Administrator</title>
</head>
<body>
    <div class = "header text-center">
        <div>UFRS: Students</div>
        <button type = 'button' onclick = "toggleNewStudent()"><i class = 'fa fa-plus' aria-hidden="true"></i><span>New Student</span></button>
        <button type = 'button'><i class = 'fa fa-eye' aria-hidden="true"></i><span>View Students</span></button>
        <button type = 'button'><i class = 'fa fa-home' aria-hidden="true"></i><span>Home</span></button>
        <button type = 'button'><i class = 'fa fa-desktop' aria-hidden="true"></i><span>Sign out</span></button>
    </div>

    <?php 
                                              // new students form 
        require_once('new_student.php'); 
                                             // new students form
        require_once('view_students.php');
    ?>
    <div class = 'fulldp'></div>
    <div class = 'mediaEditor'></div>
</body>
</html>