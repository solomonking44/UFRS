<?php
  require_once("../crud/login.php");
  require_once("../crud/media.php");
  require_once("../crud/students.php");
  $path = "../media/students/";
  if(isset($_POST['addStudent'])){
      $firstname = $_POST['firstname'];
      $othernames = $_POST['othernames'];
      $registration_number = $_POST['registration_number'];
      $course = $_POST['course'];
      if(students::createStudent($firstname, $othernames, $registration_number, $course, $path)){
          media::uploadMedia($path, $con->insert_id, array("JPG"));
          echo "<div class = 'alert alert-info'>Check if things are proper</div>";
      }
  }

  else if(isset($_POST['saveBio'])){
    $student_id = $_POST['student_id'];
    $firstname = $_POST['firstname'];
    $othernames = $_POST['othernames'];
    $registration_number = $_POST['regNo'];
    $course = $_POST['course'];

    students::updateStudentBio($student_id, $firstname, $othernames, $course, $registration_number);
    echo "Student data updated";
  }

  else if(isset($_POST['deletestudent'])){
    $student_id = $_POST['student_id'];
    students::deleteStudent($student_id);
  }

  else if(isset($_POST['showMediaEditor'])){
    $student_id = $_POST['student_id'];
    showMediaEditor($student_id, $path);
  }



  function showMediaEditor($student_id, $path){
    $dp = $path."profile_images/".$student_id.".jpg";
    $im1 = $path."labeled_images/".$student_id."/1.jpg";
    $im2 = $path."labeled_images/".$student_id."/2.jpg";
    echo "

    <button class = 'close-btn' onclick = 'closeMediaEditor()'><i class = 'fa fa-times'></i></button>
    <div class = 'image1Card imcard'>
    <h4 class = 'text-center'>Image 1</h4>
        <div class = 'setImage'>
           <img src = '$im1' />
        </div>
        <form method = 'POST' id = 'image1update' enctype='multipart/form-data' onsubmit = 'updateImage1(event)'>
           <label class = 'inputwrapper'>Choose First Image<span style = 'display:none'><input type = 'file' accept='image/*' name = 'image1[]' id = 'image1' onchange='imagesPreview2(this, 1)' required /></span></label>
           <button type = 'button' class = 'btn btn-success'>Update</button>
        </form>
    </div>

    <div class = 'image2Card imcard'>
    <h4 class = 'text-center'>Image 2</h4>
        <div class = 'setImage'>
           <img src = '$im2' />
        </div>
        <form method = 'POST' id = 'image2update' enctype='multipart/form-data'>
           <label class = 'inputwrapper'>Change Second Image<span style = 'display:none'><input type = 'file' accept='image/*' name = 'image2[]' id = 'image2' onchange='imagesPreview2(this, 2)' required /></span></label>
           <button type = 'button' class = 'btn btn-success'>Update</button>
        </form>
    </div>

    <div class = 'passphoto imcard'>
        <h4 class = 'text-center'>Passport</h4>
        <div class = 'setImage'>
           <img src = '$dp' />
        </div>
        <form method = 'POST' id = 'passphoto' enctype='multipart/form-data'>
           <label class = 'inputwrapper'>Choose first Image<span style = 'display:none'><input type = 'file' accept='image/*' name = 'image1[]' id = 'image1' onchange='imagesPreview2(this, 3)' required /></span></label>
           <button type = 'button' class = 'btn btn-success'>Update</button>
        </form>
    </div>
    ";
  }
?>