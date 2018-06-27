
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');
//
// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */
//
// Vue.component('example', require('./components/Example.vue'));
//
// const app = new Vue({
//     el: '#app'
// });


function getInfo(method, file, async) {
	var xhr ;

	if(window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xhr.open(method, file, async);

	xhr.onreadystatechange = function() {
		if(this.readyState === 4 && this.status === 200) {

			var divisor = Math.floor(this.responseText / 5);

			if(divisor !== 0) {
				for(var i = 0; i <= divisor; i++) {

					if(i === 0) {
						document.getElementById('number_of_questions').innerHTML = '<option value="none" selected disabled>' + i * 5 + '</option>';
					} else {
						document.getElementById('number_of_questions').innerHTML += '<option value="' + i * 5 + '">' + i * 5 + '</option>';
					}
				}
			} else {
				document.getElementById('number_of_questions').innerHTML += '<option value="' + this.responseText + '">' + this.responseText + '</option>';
			}
			return this.responseText;
		}
	}
	xhr.send();
}

document.querySelector('select[name="category"]').addEventListener('change', function() {
    var question_category = this.value;
	getInfo('get', '/ajax/count/' + this.value, true);
    document.getElementById('time').innerText = '0 Minutes';
	// console.log(data);
	document.getElementById('choiceForm').action = '/question/' + this.value + '/1';
});
document.querySelector('select[name="number_of_questions"]').addEventListener('change', function() {
	var totalTestTime = this.value;
	document.getElementById('time').innerText = (totalTestTime/2) + " Minutes";
});
