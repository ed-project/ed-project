$(function() {
  $("#infodialog").dialog({
  	autoOpen: false,
  	show: {
	    effect: "fade",
	    duration: 300
  	},
  	hide: {
	    effect: "fade",
	    duration: 300
  	}
  });
  
  $("#addfolderdialog").dialog({
  	autoOpen: false,
  	show: {
	    effect: "fade",
	    duration: 300
  	},
  	hide: {
	    effect: "fade",
	    duration: 300
  	}
  });
  
  $("#deletedialog").dialog({
  	autoOpen: false,
  	show: {
	    effect: "fade",
	    duration: 300
  	},
  	hide: {
	    effect: "fade",
	    duration: 300
  	}
  });
  
  $("#loadfolderbtn").click(function() {
	$("#addfolderdialog").dialog("open");
  })
  
  $(".modalclose").click(function() {
      $($(this).data("modalobj")).dialog("close");
  })
  
  $(".deletebtn").click(function() {
	$("#deletedialog input[name='deletepath']").val($(this).data("path"));
	if($(this).data("type") == "folder") {
		$("#deletedialog input[name='action']").val("deletefolder");
		$("#delete-message").html("Удалить данную папку? - " + $(this).data("name") + "<hr>Папка будет удалена вместе с содержимыми файлами!");
	} else {
		$("#deletedialog input[name='action']").val("deletefile");
		$("#delete-message").html("Удалить данный файл? - " + $(this).data("name"));
	}
	$("#deletedialog").dialog("open");
  })
});