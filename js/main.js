window.onload = function() {
	checkUser();
}

function checkUser() {
	const url = new URL(window.location.href);
	const params = url.searchParams;
	$.ajax({
		type: "POST",
		url: "backend/checkUser.php",
		data: {
			"id": params.get("id"),
			"pass": params.get("pass")
		},
		cache: false,
		success: function(data, dataType){
			if (data == "OK") {
				load();
			} else {
				alert("ユーザ名またはパスワードが違います。");
			}
		},error: function(XMLHttpRequest, textStatus, errorThrown){
			alert("ユーザ名またはパスワードが違います。");
		}
	});
	
}

function load() {
	$.ajax({
		type: "POST",
		url: "backend/read.php",
		cache: false,
		success: function(data, dataType){
			$(".main-textarea").prop("disabled", false);
			$(".main-textarea").val(data);
		},error: function(XMLHttpRequest, textStatus, errorThrown){
		}
	});
}

function save() {
	$(".main-textarea").prop("disabled", true);
	$.ajax({
		type: "POST",
		url: "backend/write.php",
		data: {
			"text": $(".main-textarea").val()
		},
		cache: false,
		success: function(data, dataType){
			$(".main-textarea").prop("disabled", false);
			alert("保存しました。");
		},error: function(XMLHttpRequest, textStatus, errorThrown){
			$(".main-textarea").prop("disabled", false);
			alert("保存に失敗しました。もう一度お試しください。");
		}
	});
}