function checkInp(inp){
    if (inp) {
        var error = alert('Input cannot be empty');
    }
    return error;
}

 function onsuccesslogin(){
    window.location = 'dashboard.php';
 }
 function onsuccesslogout(){
   window.location = './';
 }
 function onsuccesssignup(){
    window.location = 'dashboard.php';
 }
 function onsuccessadminlogin(){
   window.location = 'dashboard.php';
 }
 function onsuccessadminsignup(){
    window.location = 'dashboard.php';
 }

function postData(obj,url){
    $.post({
        url:url,
        data:obj,
        success: function (response) {
            if (response.indexOf('user loged in') >= 0){
                onsuccesslogin();
            } else if (response.indexOf('user signed up') >= 0){ 
                onsuccesssignup();
            }else if (response.indexOf('admin loged in') >= 0){ 
                onsuccessadminlogin();
            }else if (response.indexOf('admin signed up') >= 0){ 
                onsuccessadminsignup();
            }else if (response.indexOf('logged out') >= 0){ 
                onsuccesslogout();
            }else{
                alert(response);
            }
        },
        error: function(xhr){
            alert(xhr);
        },
        dataType: 'text',
        time: 5000
    });
}
function onsuccesscourse(myObj){
                var i = '', txt = '';
                for(i in myObj){
                    txt += '<tr>';
                    txt += '<td>#</td>';
                    txt += '<td>' + myObj[i].course_name + '</td>';
                    txt += '<td>' + myObj[i].course_code + '</td>';
                    txt += '<td>' + myObj[i].lecturer + '</td>';
                    txt += '</tr>';
                }
                $('#cour').html(txt);
}

function onsuccesscourses(myObj){
    var i = '', txt = '';
    for(i in myObj){
        txt += '<option value="' + myObj[i].course_name + '">' + myObj[i].course_name + '</option>';
    }
    $('#selectCourses').html(txt);
}


function onsuccessclass(myObj2){
    var i = '', txt = '';
    for(i in myObj2){
        txt += '<tr>';
        txt += '<td>#</td>';
        txt += '<td>' + myObj2[i].class_name + '</td>';
        txt += '<td>' + myObj2[i].number_of_students + '</td>';
        txt += '</tr>';
    }
    $('#classesTable').html(txt);
}

function onsuccessclass2(myObj2){
    var i = '', txt = '';
    for(i in myObj2){
        txt += '<option value="' + myObj2[i].class_name + '">' + myObj2[i].class_name + '</option>';
    }
    $('#selectClasses').html(txt);
}


function onsuccesslecturers1(myObj3){
    var i = '', txt = '';
    for(i in myObj3){
        txt += '<tr>';
        txt += '<td>#</td>';
        txt += '<td>' + myObj3[i].lecturer_name + '</td>';
        txt += '<td>' + myObj3[i].department + '</td>';
        txt += '<td>' + myObj3[i].courses + '</td>';
        txt += '<td>' + myObj3[i].materials + '</td>';
        txt += '</tr>';
    }
    $('#lecturersTable').html(txt);
}

function onsuccesslecturers2(myObj3){
    var i = '', txt = '';
    for(i in myObj3){
        txt += '<option value="' + myObj3[i].lecturer_name + '">' + myObj3[i].lecturer_name + '</option>';
    }
    $('#selectLecturers').html(txt);
}

function onsuccessstudent(myObj4){
    var i = '', txt = '';
    for(i in myObj4){
        txt += '<tr>';
        txt += '<td>#</td>';
        txt += '<td>' + myObj4[i].email + '</td>';
        txt += '<td>' + myObj4[i].class + '</td>';
        txt += '</tr>';
    }
    $('#studentsTable').html(txt);
}

function onsuccessmaterial(myOb){
    var i = '', txt = '';
    for(i in myOb){
        txt += '<tr>';
        txt += '<td>#</td>';
        txt += '<td>' + myOb[i].material_name + '<a href="uploads/'+ myOb[i].material_name +'" download><i class="fa fa-arrow-down"></i></a>' + '</td>';
        txt += '<td>' + myOb[i].course_name + '</td>';
        txt += '</tr>';
    }
    $('#materialsTable').html(txt);
}


function fetchData(obj,url){
    $.post({
        url:url,
        data:obj,
        success: function (response) {
            
            if (response.indexOf('course_name') >= 0){
                var myObj = JSON.parse(response);
                onsuccesscourse(myObj);
                onsuccesscourses(myObj);
            }else if (response.indexOf('class_name') >= 0){
                var myObj2 = JSON.parse(response);
                onsuccessclass(myObj2);
                onsuccessclass2(myObj2);
                onsuccessclass6(myObj6);
            }else if (response.indexOf('lecturer_name') >= 0){
                var myObj3 = JSON.parse(response);
                onsuccesslecturers1(myObj3);
                onsuccesslecturers2(myObj3);
            }
            else if (response.indexOf('class') >= 0){
                var myObj4 = JSON.parse(response);
                onsuccessstudent(myObj4);
            }else if (response.indexOf('material_name') >= 0){
                var myOb = JSON.parse(response);
                onsuccessmaterial(myOb);
            }
             else {
                console.log(response);
            }
        },
        error: function(xhr){
            alert(xhr);
        },
        dataType: 'text',
        time: 5000
    });
}

$('#signup').click(function(){
    var email = $('#inputEmail').val();
    var password = $('#inputPassword').val();
    var myClass = $('#selectClasses').val();
    var inp = email == '' || password == '' || myClass == '';
    checkInp(inp);
    if (!inp) {
        var obj = {signup:1,email:email, password:password, myClass:myClass};
        var url = 'controls/account.php';
        postData(obj,url);
    }
});

$('#signupAdmin').click(function(){
    var lecname = $('#inputName').val();
    var email = $('#inputEmail').val();
    var password = $('#inputPassword').val();
    var code = $('#inputCode').val();
    var department = $('#inputDepartment').val();
    var inp = lecname == '' || email == '' || password == '' || code == '' || department == '';
    checkInp(inp);
    if (!inp) {
        var obj = {signupAdmin:1,lecname:lecname, email:email, password:password, code:code, department:department};
        var url = 'controls/account.php';
        postData(obj,url);
    }
});


$('#login').click(function(){
    var email = $('#inputEmail').val();
    var password = $('#inputPassword').val();
    var inp = email == '' || password == '';
    checkInp(inp);
    if (!inp) {
        var obj = {login:1,email:email, password:password};
        var url = 'controls/account.php';
        postData(obj,url);
    }
});

$('#logout').click(function(){
    confirm('Are you sure you want to logout');
    var obj = {logout: 1};
        var url = 'controls/account.php';
        postData(obj,url);
});

$('#createCourse').click(function(){
    var courseName = $('#courseName').val();
    var courseCode = $('#courseCode').val();
    var lecturer = $('#selectLecturers').val();
    var inp = courseName == '' || courseCode == '' || lecturer == '';
    checkInp(inp);
    if (!inp) {
        var obj = {createCourse:1,courseName:courseName, courseCode:courseCode, lecturer:lecturer};
        //alert(obj);
        var url = 'controls/course.php';
        postData(obj,url);
    }
  })

var obj = {fetchCourse: 1};
var url = 'controls/course.php';
fetchData(obj,url);

$('#createClass').click(function(){
    var className = $('#className').val();
    var inp = className == '';
    checkInp(inp);
    if (!inp) {
        var obj = {createClass:1,className:className};
        var url = 'controls/class.php';
        postData(obj,url);
    }
  })
//fetch classes
var obj = {fetchClass: 1};
var url = 'controls/class.php';
fetchData(obj,url);

//fetch lecturers
var obj = {fetchLecturer: 1};
var url = 'controls/account.php';
fetchData(obj,url);

//fetch students
var obj = {fetchStudents: 1};
var url = 'controls/account.php';
fetchData(obj,url);

//fetch courses
var obj = {fetchCourses: 1};
var url = 'controls/course.php';
fetchData(obj,url);


//fetch courses
var obj = {fetchMaterials: 1};
var url = 'controls/material.php';
fetchData(obj,url);
