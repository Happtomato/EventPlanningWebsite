function dropHandler(ev) {
    console.log('File(s) dropped');

    // Prevent default behavior (Prevent file from being opened)
    ev.preventDefault();

    if (ev.dataTransfer.items) {
        // Use DataTransferItemList interface to access the file(s)
        for (var i = 0; i < ev.dataTransfer.items.length; i++) {

                    var file = ev.dataTransfer.items[i].getAsFile();

                    //input all the logic to parse xml file -->
                    var formData = new FormData();
                    formData.append('functionname', "upload");
                    formData.append('fileName', file.name);
                    formData.append('arguments', file);

                    //send xml file to php script
                    $.ajax({
                        url: "upload.php",
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response){
                            console.log(response);
                        },
                        error: function(){
                            console.error("error uploading");
                        }
                    });
                console.log('Correct ... file[' + i + '].name = ' + file.name);
        }
    }
    else {
        // Use DataTransfer interface to access the file(s)
        for (var i = 0; i < ev.dataTransfer.files.length; i++) {
            console.log('Wrong ... file[' + i + '].name = ' + ev.dataTransfer.files[i].name);
        }
    }
}
function dragOverHandler(ev) {
    console.log('File(s) in drop zone');

    // Prevent default behavior (Prevent file from being opened)
    ev.preventDefault();
}

//Memberpage change password
function valid()
{
if(document.chngpwd.opwd.value=="")
{
alert("Old Password Filed is Empty !!");
document.chngpwd.opwd.focus();
return false;
}
else if(document.chngpwd.npwd.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.npwd.focus();
return false;
}
else if(document.chngpwd.cpwd.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.cpwd.focus();
return false;
}
else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cpwd.focus();
return false;
}
return true;
}


