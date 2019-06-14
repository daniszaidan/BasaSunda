loadData();
function loadData(){
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {
        if(ajax.readyState === 4 && ajax.status == 200){
        	document.getElementById('content').innerHTML = "";
        	document.getElementById('content').innerHTML = ajax.responseText;
        }
    }
    ajax.open('POST', './php/number_controller.php?type=view', true);
    ajax.send();
}

function modalEdit(id) {
	modalEditBox();

	var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if(ajax.readyState === 4 && ajax.status == 200){
        	var data = JSON.parse(ajax.responseText);
        	document.getElementById('word-id-edit').value = data["id"];
        	document.getElementById('image-label-edit').innerHTML  = "Current image : " + data["image"];
        	document.getElementById('current-image-edit').value = data["image"];
        	document.getElementById('word-label-edit').value = data["label"];
        	document.getElementById('word-sunda-edit').value = data["sunda"];
        }
    }
    ajax.open('GET', './php/number_controller.php?type=getData&id=' + id, true);
    ajax.send();
}

document.getElementById('form-edit').addEventListener("submit", function(e){
	e.preventDefault();
    document.getElementById("button-submit-edit").disabled = true;

	var idEdit 	 	 	= document.getElementById('word-id-edit').value;
	var imageEdit 	 	= document.getElementById('image-edit').value;
	
    var formData 		= new FormData(document.getElementById("form-edit"));
	var ajax 			= new XMLHttpRequest();
	var urlAjax		 	= "";

	if(imageEdit == '' || imageEdit == null){
        urlAjax = "./php/number_controller.php?type=edit&id=" + idEdit;
    }else{
    	urlAjax = "./php/number_controller.php?type=editWithImage&id=" + idEdit;   
    } 

	ajax.onreadystatechange = function() {
        if(ajax.readyState === 4 && ajax.status == 200){
        	console.log(ajax.responseText);
            document.getElementById("button-submit-edit").disabled = false;
    		loadData();
    		modalClose();
        }
    }
    ajax.open('POST', urlAjax, true);
    ajax.send(formData);
});


document.getElementById('form-add').addEventListener("submit", function(e){
	e.preventDefault();
    document.getElementById("button-submit-add").disabled = true;

	var imageAdd = document.getElementById('image-add').value;

	if(imageAdd == ''){
        alert("Pilih gambar terlebih dahulu");
        return false;
    }else{
    	var formData = new FormData(document.getElementById("form-add"));

    	var ajax = new XMLHttpRequest();
    	ajax.onreadystatechange = function() {
	        if(ajax.readyState === 4 && ajax.status == 200){
	        	console.log(ajax.responseText);
                document.getElementById("button-submit-add").disabled = false;
        		loadData();
        		modalClose();
        		scrollDown();
	        }
	    }
	    ajax.open('POST', './php/number_controller.php?type=insert', true);
	    ajax.send(formData);
    }
});

function modalDelete(id) {
	var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if(ajax.readyState === 4 && ajax.status == 200){
        	var data = JSON.parse(ajax.responseText);
        	document.getElementById('word-id-delete').value 		= data["id"];
        	document.getElementById('word-image-delete').src 		= "assets/images/" + data["image"];
        	document.getElementById('word-label-delete').innerHTML 	= data["label"];
        	document.getElementById('word-sunda-delete').innerHTML 	= data["sunda"];
        }
    }
    ajax.open('GET', './php/number_controller.php?type=getData&id=' + id, true);
    ajax.send();

	modalEditClose();
}

function deleteData(){
	var idDelete 	 = document.getElementById('word-id-delete').value;
	var imageDelete  = document.getElementById('word-image-delete').getAttribute('src');

	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {
        if(ajax.readyState === 4 && ajax.status == 200){
        	console.log(ajax.responseText);
        	loadData();
        	modalClose();
        }
    }
    ajax.open('POST', './php/number_controller.php?type=delete&id=' + idDelete + '&image=' + imageDelete, true);
    ajax.send();

    loadData();
}
