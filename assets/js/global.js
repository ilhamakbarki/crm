function base_url(url){
	if(url==null){
		return parent.url;
	}else{
		return parent.url+url;
	}
}

function ajaxCall(url, data, callback){
	$.ajax({
		'url':url,
		'data':data,
		'type':'POST',
		success:function(data){
			callback(data);
		},
		error:function(data){
			console.log(data);
		}
	});
}

function ajaxCallSelectize(url, data, callback) {
	$.ajax({
		url: url,
		type: 'POST',
		data: data,
		dataType:"json",
		error: function(e){},
		success: function(res) {
			callback(res);
		}
	});
}

function ajaxCallForm(url, data, callback){
	$.ajax({
		'url':url,
		'data':data,
		'type':'POST',
		cache:false,
		contentType: false,
		processData: false,
		success:function(data){
			callback(data);
		},
		error:function(data){
			console.log(data);
		}
	});
}

function ajaxCallJson(url, data, callback){
	var xhr = new XMLHttpRequest();
	xhr.withCredentials = true;
	xhr.addEventListener("readystatechange", function () {
		if (this.readyState === this.DONE) {
			callback(this.responseText);
		}
	});

	xhr.open("POST", url);
	xhr.setRequestHeader("content-type", "application/json");
	xhr.setRequestHeader("authorization", "Basic Og==");
	xhr.send(data);
}

open = function(verb, url, data, target) {
	var form = document.createElement("form");
	form.action = url;
	form.method = verb;
	form.target = target || "_self";
	if (data) {
		for (var key in data) {
			var input = document.createElement("textarea");
			input.name = key;
			input.value = typeof data[key] === "object" ? JSON.stringify(data[key]) : data[key];
			form.appendChild(input);
		}
	}
	form.style.display = 'none';
	document.body.appendChild(form);
	form.submit();
};