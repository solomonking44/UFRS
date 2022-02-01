var imagesPreview = function(input, placeToInsertImagePreview) {
    $(placeToInsertImagePreview).html("")
    if (input.files) {
        var filesAmount = input.files.length
        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();
            reader.onload = function(event) {
                $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview)
            }
            reader.readAsDataURL(input.files[i])
        }
    }
}


var imagesPreview2 = function(input, placeToInsertImagePreview) {
    if (placeToInsertImagePreview == 1) {
        placeToInsertImagePreview = ".image1Card .setImage"
    } else if (placeToInsertImagePreview == 2) {
        placeToInsertImagePreview = ".image2Card .setImage"
    } else {
        placeToInsertImagePreview = ".passphoto .setImage"
    }
    $(placeToInsertImagePreview).html("")
    if (input.files) {
        var filesAmount = input.files.length
        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();
            reader.onload = function(event) {
                $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview)
            }
            reader.readAsDataURL(input.files[i])
        }
    }
}


var handleNewStudent = function(e) {
    e.preventDefault()
    alert("Form Submit prevented")
    var form = new FormData(document.getElementById("newStudentForm"))
    form.append("addStudent", true)
    $.ajax({
        url: 'bck.php',
        type: 'POST',
        data: form,
        processData: false,
        contentType: false,
        success: function(result) {
            $(".server-response").html(result)
                //$("#spinner").hide()
        }
    })
}


function toggleNewStudent() {
    $('.new_student').toggle('slow')
}
firstname = othernames = course = regNo = ""

function startedit(id) {
    hideOther(id)
    firstname = $("." + id + " .firstname").text()
    othernames = $("." + id + " .othernames").text()
    course = $("." + id + " .course").text()
    regNo = $("." + id + " .regNo").text()

    $("." + id + " .firstname").attr("contenteditable", "true")
    $("." + id + " .othernames").attr("contenteditable", "true")
    $("." + id + " .course").attr("contenteditable", "true")
    $("." + id + " .regNo").attr("contenteditable", "true")

    $("." + id + " .firstname").css("color", "red")
    $("." + id + " .othernames").css("color", "red")
    $("." + id + " .course").css("color", "red")
    $("." + id + " .regNo").css("color", "red")
}


function canceledit(id) {
    showOther(id)
    $("." + id + " .firstname").text(firstname)
    $("." + id + " .othernames").text(othernames)
    $("." + id + " .course").text(course)
    $("." + id + " .regNo").text(regNo)

    $("." + id + " .firstname").attr("contenteditable", "false")
    $("." + id + " .othernames").attr("contenteditable", "false")
    $("." + id + " .course").attr("contenteditable", "false")
    $("." + id + " .regNo").attr("contenteditable", "false")

    $("." + id + " .firstname").css("color", "black")
    $("." + id + " .othernames").css("color", "black")
    $("." + id + " .course").css("color", "black")
    $("." + id + " .regNo").css("color", "black")
}


function hideOther(id) {
    $("." + id + " .edit").hide()
    $("." + id + " .media").hide()
    $("." + id + " .delete").hide()

    $("." + id + " .save").show()
    $("." + id + " .cancel").show()
}

function showOther(id) {
    $("." + id + " .edit").show()
    $("." + id + " .media").show()
    $("." + id + " .delete").show()

    $("." + id + " .save").hide()
    $("." + id + " .cancel").hide()
}


function saveBioEdit(id) {
    firstname = $("." + id + " .firstname").text()
    othernames = $("." + id + " .othernames").text()
    course = $("." + id + " .course").text()
    regNo = $("." + id + " .regNo").text()

    $.post("bck.php", { saveBio: true, firstname: firstname, othernames: othernames, course: course, regNo: regNo, student_id: id }, function(data, success) {
        alert(data)
        canceledit(id)
    })
}

function deleteStudent(id) {
    if (confirm("Please confirm to delete this student. All their data will be removed")) {
        // $.post("bck.php", { deletestudent: true, student_id: id }, function(data, success) {
        $("." + id).hide("slow")
            // })
    }
}

function toggleFullDp(dp) {
    path = $("." + dp + " img").attr("src")
    $('.fulldp').toggle()
    $('.fulldp').html("<img src = '" + path + "' />")
}

function showMediaEditor(id) {
    $.post("bck.php", { showMediaEditor: true, student_id: id }, function(data, success) {
        $(".mediaEditor").show()
        $(".mediaEditor").html(data)
    })
}

function closeMediaEditor() {
    $(".mediaEditor").hide()
}