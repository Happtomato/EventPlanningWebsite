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
                    formData.append('arguments', file);

                    //send xml file to php script
                    $.ajax({
                        url: "../ServerSide/upload.php",
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

