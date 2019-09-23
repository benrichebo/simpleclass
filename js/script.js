
function fetchData(obj,url){
    $.post({
        url:url,
        data:obj,
        success: function (response) {
            
            if (response.indexOf('course_code') >= 0){
                var myObj = JSON.parse(response);
                onsuccesscourse(myObj);
                displayCourses(myObj);
            }else if (response.indexOf('class_name') >= 0){
                var myObj2 = JSON.parse(response);
                onsuccessclass(myObj2);
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


//fetch course
function displayCourses(myObj){
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

//login on click
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
//logout on click
$('#logout').click(function(){
    $('#pModal').html('Logging out...');
    showModal();
    var obj = {logout: 1};
        var url = 'controls/account.php';
        postData(obj,url);
});


function onsuccessmaterial(response){
    var myObj = JSON.parse(response);
var i = '', txt = '';
for(i in myObj){
    txt += '<div class="col-md-2 col-sm-3">'
    txt += '<div class="card">';
    txt += '<div class="card-body text-center">'
    txt += '<img src="./images/pdf.png" width="50" alt="">';   
    txt += '</div>'
    txt += '<div class="card-footer p-2">'
    txt += '<small>' + myObj[i].material_name + '</small> <a href="uploads/'+ myObj[i].material_name +'" download class="fa fa-download"></a>';
    txt += '</div>';
    txt += '</div>';
    txt += '</div>';
}
$('#materialsTable').html(txt);
}