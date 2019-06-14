var buttons = document.getElementsByClassName('ripple-effect');
Array.prototype.forEach.call(buttons, function (b) {
	b.addEventListener('click', createRipple);
});
function createRipple(e) {
	var circle = document.createElement('div');
	this.appendChild(circle);
	var d = Math.max(this.clientWidth, this.clientHeight);
	circle.style.width = circle.style.height = d + 'px';

	var rect = this.getBoundingClientRect();
	circle.style.left = e.clientX - rect.left - d / 2 + 'px';
	circle.style.top = e.clientY - rect.top - d / 2 + 'px';

	circle.classList.add('ripple');
}

loadData();
function loadData(){
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {
        if(ajax.readyState === 4 && ajax.status == 200){
        	document.getElementById('content').innerHTML = "";
        	document.getElementById('content').innerHTML = ajax.responseText;
        }
    }
    ajax.open('POST', './php/phrases_controller.php?type=view', true);
    ajax.send();
}

function modalClose() {
	var body = document.getElementById('body');
	body.style.cssText = "overflow: auto;";

	var mainbar = document.getElementById('mainbar');
	mainbar.style.cssText = "overflow-x: auto;";


	var overlay = document.getElementById('overlay');
	overlay.style.cssText = "z-index: -2; opacity: 0;";

	var modal = document.getElementsByClassName('modal-frame');
	Array.prototype.forEach.call(modal, function (mf) {
		mf.style.cssText = "z-index: -1; opacity: 0;";
	});

	var modal = document.getElementsByClassName('modal-box');
	Array.prototype.forEach.call(modal, function (mb) {
		mb.style.cssText = "top: -50%; opacity: 0;";
	});
}

function modalAdd() {
	document.getElementById('form-add').reset();

	var body = document.getElementById('body');
	body.style.cssText = "overflow: hidden;";

	var mainbar = document.getElementById('mainbar');
	mainbar.style.cssText = "overflow: hidden;";


	var overlay = document.getElementById('overlay');
	overlay.style.cssText = "z-index: 999; opacity: 1;";

	var modalFrame = document.getElementsByClassName('modal-frame-add');
	Array.prototype.forEach.call(modalFrame, function (mf) {
		mf.style.cssText = "z-index: 999; opacity: 1;";
	});

	var modalBox = document.getElementsByClassName('modal-box-add');
	Array.prototype.forEach.call(modalBox, function (mb) {
		mb.style.cssText = "top: 50%; opacity: 1;";
	});
}

// modalEdit(1);
function modalEdit(id) {
	document.getElementById('form-edit').reset();

	var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if(ajax.readyState === 4 && ajax.status == 200){
        	var data = JSON.parse(ajax.responseText);
        	document.getElementById('word-id-edit').value = data["id"];
        	document.getElementById('word-label-edit').value = data["label"];
        	document.getElementById('word-sunda-edit').value = data["sunda"];
        }
    }
    ajax.open('GET', './php/phrases_controller.php?type=getData&id=' + id, true);
    ajax.send();


	var body = document.getElementById('body');
	body.style.cssText = "overflow: hidden;";

	var mainbar = document.getElementById('mainbar');
	mainbar.style.cssText = "overflow: hidden;";


	var overlay = document.getElementById('overlay');
	overlay.style.cssText = "z-index: 999; opacity: 1;";

	var modalFrame = document.getElementsByClassName('modal-frame-edit');
	Array.prototype.forEach.call(modalFrame, function (mf) {
		mf.style.cssText = "z-index: 999; opacity: 1;";
	});

	var modalBox = document.getElementsByClassName('modal-box-edit');
	Array.prototype.forEach.call(modalBox, function (mb) {
		mb.style.cssText = "top: 50%; opacity: 1;";
	});
}

document.getElementById('form-edit').addEventListener("submit", function(e){
	e.preventDefault();
	document.getElementById("button-submit-add").disabled = true;

	var idEdit 	 	 	= document.getElementById('word-id-edit').value;

    var formData = new FormData(document.getElementById("form-edit"));
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {
        if(ajax.readyState === 4 && ajax.status == 200){
        	console.log(ajax.responseText);
        	document.getElementById("button-submit-add").disabled = false;
    		loadData();
    		modalClose();
        }
    }
    ajax.open('POST', "./php/phrases_controller.php?type=edit&id=" + idEdit, true);
    ajax.send(formData);

});


document.getElementById('form-add').addEventListener("submit", function(e){
	e.preventDefault();
	document.getElementById("button-submit-add").disabled = true;

	var formData = new FormData(document.getElementById("form-add"));

	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {
        if(ajax.readyState === 4 && ajax.status == 200){
        	console.log(ajax.responseText);
        	document.getElementById("button-submit-add").disabled = false;
    		loadData();
    		modalClose();
        }
    }
    ajax.open('POST', './php/phrases_controller.php?type=insert', true);
    ajax.send(formData);
        
});

function modalDelete(id) {
	var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if(ajax.readyState === 4 && ajax.status == 200){
        	var data = JSON.parse(ajax.responseText);
        	document.getElementById('word-id-delete').value 		= data["id"];
        	document.getElementById('word-label-delete').innerHTML 	= data["label"];
        	document.getElementById('word-sunda-delete').innerHTML 	= data["sunda"];
        }
    }
    ajax.open('GET', './php/phrases_controller.php?type=getData&id=' + id, true);
    ajax.send();

	var body = document.getElementById('body');
	body.style.cssText = "overflow: hidden;";

	var mainbar = document.getElementById('mainbar');
	mainbar.style.cssText = "overflow: hidden;";


	var overlay = document.getElementById('overlay');
	overlay.style.cssText = "z-index: 999; opacity: 1;";

	var modalFrame = document.getElementsByClassName('modal-frame-delete');
	Array.prototype.forEach.call(modalFrame, function (mf) {
		mf.style.cssText = "z-index: 999; opacity: 1;";
	});

	var modalBox = document.getElementsByClassName('modal-box-delete');
	Array.prototype.forEach.call(modalBox, function (mb) {
		mb.style.cssText = "top: 50%; opacity: 1;";
	});
}

function deleteData(){
	var idDelete 	 = document.getElementById('word-id-delete').value;

	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {
        if(ajax.readyState === 4 && ajax.status == 200){
        	console.log(ajax.responseText);
        	loadData();
        	modalClose();
        }
    }
    ajax.open('POST', './php/phrases_controller.php?type=delete&id=' + idDelete, true);
    ajax.send();

    loadData();
}