/*
=== Zero.CSS Framework | https://github.com/daniszaidan/Zero-CSS ===
=== Created Danis Zaidan | Portfolio : daniszaidan.me ===
=== Copyright © 31 Juli 2018 - All Rights Reserved ===
*/

function toggleMenuOpen(){
  var sidebar = document.getElementById("sidebar-mobile").classList.toggle('hide');
  var sidebar = document.getElementById("mainbar").classList.toggle('hide');
  var sidebar = document.getElementById("overlay").classList.toggle('overlay-menu');
}

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

function modalAdd() {
	document.getElementById('form-add').reset();

	var body = document.getElementById('body').style.cssText = "overflow: hidden;";
	var mainbar = document.getElementById('mainbar').style.cssText = "overflow: hidden;";
	var overlay = document.getElementById('overlay').style.cssText = "z-index: 999; opacity: 1;";

	var modalFrame = document.getElementsByClassName('modal-frame-add');
	Array.prototype.forEach.call(modalFrame, function (mf) {
		mf.style.cssText = "z-index: 999; opacity: 1;";
	});

	var modalBox = document.getElementsByClassName('modal-box-add');
	Array.prototype.forEach.call(modalBox, function (mb) {
		mb.style.cssText = "top: 50%; opacity: 1;";
	});
}

function modalClose() {
	var body 	= document.getElementById('body').style.cssText = "overflow: auto;";
	var mainbar = document.getElementById('mainbar').style.cssText = "overflow-x: auto;";
	var overlay = document.getElementById('overlay').style.cssText = "z-index: -2; opacity: 0;";

	var modal 	= document.getElementsByClassName('modal-frame');
	Array.prototype.forEach.call(modal, function (mf) {
		mf.style.cssText = "z-index: -1; opacity: 0;";
	});

	var modal = document.getElementsByClassName('modal-box');
	Array.prototype.forEach.call(modal, function (mb) {
		mb.style.cssText = "top: -50%; opacity: 0;";
	});
}

function modalEditBox(){
	document.getElementById('form-edit').reset();

	var body = document.getElementById('body').style.cssText = "overflow: hidden;";
	var mainbar = document.getElementById('mainbar').style.cssText = "overflow: hidden;";
	var overlay = document.getElementById('overlay').style.cssText = "z-index: 999; opacity: 1;";

	var modalFrame = document.getElementsByClassName('modal-frame-edit');
	Array.prototype.forEach.call(modalFrame, function (mf) {
		mf.style.cssText = "z-index: 999; opacity: 1;";
	});

	var modalBox = document.getElementsByClassName('modal-box-edit');
	Array.prototype.forEach.call(modalBox, function (mb) {
		mb.style.cssText = "top: 50%; opacity: 1;";
	});
}

function modalEditClose() {
	var body = document.getElementById('body').style.cssText = "overflow: hidden;";
	var mainbar = document.getElementById('mainbar').style.cssText = "overflow: hidden;";
	var overlay = document.getElementById('overlay').style.cssText = "z-index: 999; opacity: 1;";

	var modalFrame = document.getElementsByClassName('modal-frame-delete');
	Array.prototype.forEach.call(modalFrame, function (mf) {
		mf.style.cssText = "z-index: 999; opacity: 1;";
	});

	var modalBox = document.getElementsByClassName('modal-box-delete');
	Array.prototype.forEach.call(modalBox, function (mb) {
		mb.style.cssText = "top: 50%; opacity: 1;";
	});
}

function scrollDown(){
	document.getElementById('mainbar').scrollTop = document.getElementById('mainbar').scrollHeight - document.getElementById('mainbar').clientHeight;
}

/*
=== Zero.CSS Framework | https://github.com/daniszaidan/Zero-CSS ===
=== Created Danis Zaidan | Portfolio : daniszaidan.me ===
=== Copyright © 31 Juli 2018 - All Rights Reserved ===
*/