<div class = "new_student">   

<form method="POST" enctype="multipart/form-data" id = "newStudentForm" onsubmit="handleNewStudent(event)">

<h4 class = 'text-center'>Add New Student</h4>

<div class = 'passport'></div>
<label class = 'inputwrapper form-control text-center'>passport photo<span style = 'display:none'><input type = 'file' accept="image/*" name = 'passport[]' id = 'passort' onchange="imagesPreview(this, '.passport')" required/></span></label>
<input type = 'text' class = 'form-control' name = 'firstname' placeholder = 'first name' required /> 
<input type = 'text' class = 'form-control' name = 'othernames' placeholder = 'other names' required />
<input type = 'text' class = 'form-control' name = 'registration_number' placeholder = 'registration number' required />
<input type = 'text' class = 'form-control' name = 'course' placeholder="Course of study" list = 'courses'>
<datalist id = 'courses'>
    <option value="BSE">BSE</option>
    <option value="BCS">BCS</option>
    <option value="BEE">BEE</option>
    <option value="BCE">BCE</option>
    <option value="BME">BME</option>
</datalist> 

<div class = 'alert alert-info'>Please: provide two student Photos with their face clear, these will be used for facial recorgnition</div>
<div class = 'photo photo1'>
     <div class = 'inputholder'>
         <label class = 'inputwrapper'>Choose first Image<span style = 'display:none'><input type = 'file' accept="image/*" name = 'image1[]' id = 'image1' onchange="imagesPreview(this, '.photo1 .imgdiv')" required /></span></label>
     </div> 

     <div class = "imgdiv"></div>
</div>
<div class = 'photo photo2'>
     <div class = 'inputholder'>
         <label class = 'inputwrapper'>Choose second Image<span style = 'display:none'><input type = 'file' accept="image/*" name = 'image2[]' id = 'image2' onchange="imagesPreview(this, '.photo2 .imgdiv')" required /></span></label>
     </div>

     <div class = 'imgdiv'></div>
</div>

<div class = 'server-response'></div>
<button type = 'submit' class = 'btn btn-success btn-submit'>Save</button>
<button type = 'reset' class = 'btn btn-primary btn-clear'>Clear</button>
</form>
</div>