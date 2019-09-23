

function showModal(){
    $('#pModal').modal('show');
}

 function checkInp(inp){
    if (inp) {
        var error = alert('Input cannot be empty');
    }
    return error;
 }



function postData(obj,url){
    $.post({
        url:url,
        data:obj,
        beforeSend: function(){
            showModal();
        },
        success: function (response) {
            if (response.indexOf('user loged in') >= 0){
                onsuccesslogin();
            } 
            if (response.indexOf('user signed up') >= 0){ 
                onsuccesssignup();
            }
            if (response.indexOf('admin loged in') >= 0){ 
                onsuccessadminlogin();
            }
            if (response.indexOf('admin signed up') >= 0){ 
                onsuccessadminsignup();
            }
            
            if (response.indexOf('Course registered') >= 0){ 
                onsuccesscoursereg();
            }

            if(response.indexOf('Course data not fetched sch') >= 0){
                $('.cresponse').html(response);
            }
            
            if (response.indexOf('logged out') >= 0){ 
                onsuccesslogout();
            }else{
                console.log(response)
                showModal();
                $('#response').html(response);
            }
        },
        error: function(xhr){
            alert(xhr);
        },
        dataType: 'text',
        time: 5000
    });
}

/* function onsuccessco(myObj){
    var i = '', txt = '';
    for(i in myObj){
        txt += '<option value="' + myObj[i].course_code + '">' + myObj[i].course_code + '</option>';
    }
    $('#selectCourses').html(txt);
}


function onsuccesslecturers2(myObj3){
    var i = '', txt = '';
    for(i in myObj3){
        txt += '<option value="' + myObj3[i].lecturer_name + '">' + myObj3[i].lecturer_name + '</option>';
    }
    $('#selectLecturers').html(txt);
}
 */


function logout(){
    var obj = {logout: 'logout'};
        var url = 'controls/account.php';
        postData(obj,url);
}

function onsuccesslogout(){
    window.location = './';
 }


 function fetch(url,obj){
    $.post({
            url:url,
            data:obj,
            success: function(response){
              if (response.indexOf('material_name') >= 0){
                  onsuccessmaterial(response);
              }
              if (response.indexOf('course_name') >= 0){
                courses(response);
              }
              if (response.indexOf('course_code') >= 0){
                fetchC(response);
                //console.log(response)
              }
              if (response.indexOf('school') >= 0){
                fetchS(response);  
              }else{
                console.log(response);
              }
            }
    });  
  }
  





