function _(el){
	return document.getElementById(el);
}
function uploadFile(ut, fn){
	var file = _("file").files[0];
	//alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
    formdata.append("file", file);
    formdata.append("ut", ut);
    
    if(fn != null)
    {
        var totalfiles = document.getElementById('files').files.length;
        for (var index = 0; index < totalfiles; index++) {
            formdata.append("files[]", document.getElementById('files').files[index]);
        }
    
        formdata.append("foldername", fn);
    }
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "pscripts/upload.php");
	ajax.send(formdata);
}
function progressHandler(event){
	var percent = (event.loaded / event.total) * 100;
    $('#upb').css('width', Math.round(percent)+'%');
    $('#upb').text(Math.round(percent)+"% ("+formatBytes(event.loaded)+" of "+formatBytes(event.total)+")");
}
function completeHandler(event){
	$('#upb').text("UPLOADING COMPLETED!");
}
function errorHandler(event){
	$('#upb').text("ERROR IN UPLOADING!");
}
function abortHandler(event){
	$('#upb').text("UPLOADING ABORTED!");
}

function formatBytes(bytes, decimals = 2) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));

    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}