<div class = 'all_students'>

    <h3 class = 'text-center'>These are the students registered on the system</h3>

    <table class = 'table table-hover table-striped'>
        <thead>
            <tr>
                 <th></th>
                 <th>First name</th>
                 <th>Other names</th>
                 <th>Course</th>
                 <th>registration_number</th>
            </tr>
        </thead>
        <tbody>
    <?php
       $pathToDp = "../media/students/profile_images/";
       require_once("../crud/login.php");
       require_once("../crud/students.php");
       $students = students::readStudent();
       for($i = 0; $i < sizeof($students); $i++){
           $id = $students[$i]['student_id'];
           $firstname = $students[$i]['firstname'];
           $othernames = $students[$i]['othernames'];
           $course = $students[$i]['course'];
           $registration_number = $students[$i]['regNo'];
           $dp = $pathToDp.$id.".jpg";
           echo "
           <tr class = '$id'>
                 <td><img src = '{$dp}' class = 'tabledp' onclick = 'toggleFullDp($id)'/></td>
                 <td class = 'firstname'>$firstname</td>
                 <td class = 'othernames'>$othernames</td>
                 <td class = 'course'>$course</td>
                 <td class = 'regNo'>$registration_number</td>
                 <td>
                      <button onclick = 'startedit($id)'><i class = 'fa fa-edit edit' style = 'color:blue'></i></button>
                      <button onclick = 'showMediaEditor($id)'><i class = 'fas fa-video media' style = 'color:green'></i></button>
                      <button onclick = 'deleteStudent($id)'><i class = 'fa fa-trash delete' style = 'color:red'></i></button>

                      <button onclick = 'saveBioEdit($id)' style = 'display:none' class = 'save'><i class = 'fa fa-save' style = 'color:green'></i></button>
                      <button onclick = 'canceledit($id)' style = 'display:none' class = 'cancel'><i class = 'fa fa-times' style = 'color:red'></i></button>
                 </td>
           </tr>";
       }
    ?>
        </tbody>
        <tfoot>
            <tr><td colspan="5"><h3 class = 'text-center'>End of data set</h3></td></tr>
        </tfoot>
    </table>
</div>