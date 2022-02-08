/* navigation menu */
var navLinks = document.getElementById('navLinks');
function ShowMenu() {
	navLinks.style.right = "0";
}
function hideMenu() {
	navLinks.style.right = "-200px";
}

/* validation form */
const form = document.getElementById('form');
const username = document.getElementById('username');
const namaEvent = document.getElementById('namaEvent');

form.addEventListener('submit', (e) => {
	e.preventDefault();

	checkInputs();

});

function checkInputs() {
	const usernameValue = username.value.trim();
	const namaEventValue = namaEvent.value.trim();
	if (usernameValue === '') {
		setErrorFor(username, 'username cannot be blank');
	} else {
		setSuccessFor(username);
	}
	if (namaEventValue === '') {
		setErrorFor(namaEvent, 'nama event cannot be blank');
	} else {
		setSuccessFor(namaEvent);
	}
	if (namaEventValue && usernameValue !== ''){
		form.submit();
	}
}
function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	small.innerText = message;
	formControl.className = 'form-control error';
}
function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}