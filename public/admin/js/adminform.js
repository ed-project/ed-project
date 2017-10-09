$(document).ready(function() {
    $(".chosen").chosen();
    
    $("#fmimagebutton").click(function() {
	window.open("/admin/filemanager/window/image", "Выбор изображения", "width=1000,height=500,resizable=no,scrollbars=yes,status=yes");
    })
})