window.onload = function() {
	load();
}

function load() {
	$.ajax({
		type: "POST",
		url: "backend/read.php",
		cache: false,
		success: function(data, dataType){
			$(".main-textarea").val(data);
		},error: function(XMLHttpRequest, textStatus, errorThrown){
		}
	});
}

function save() {
	$.ajax({
		type: "POST",
		url: "backend/write.php",
		data: {
			"text": $(".main-textarea").val()
		},
		cache: false,
		success: function(data, dataType){
			alert("保存しました。");
		},error: function(XMLHttpRequest, textStatus, errorThrown){
			alert("保存できませんでした。もう一度お試しください。");
		}
	});
}