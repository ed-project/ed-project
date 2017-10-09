$(document).ready(function () {
	function handleFileSelect(evt) {
		var files = evt.target.files;
		for (var i = 0, f; f = files[i]; i++) {
			if (!f.type.match('image.*')) {
				continue;
			}
			var reader = new FileReader();
			reader.onload = (function (theFile) {
				return function (e) {
					$('#loadpreview').html('<img class="thumb" src="' + e.target.result +
						'" title="' + theFile.name + '"/>');
				};
			})(f);
			reader.readAsDataURL(f);
		}
	}
	document.getElementById('file').addEventListener('change', handleFileSelect, false);
})