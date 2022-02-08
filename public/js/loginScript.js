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
const email = document.getElementById('email');
const password = document.getElementById('password');

form.addEventListener('submit', (e) => {
	e.preventDefault();

	checkInputs();

});

function checkInputs() {
	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();
	if(emailValue === ''){
		setErrorFor(email, 'email cannot be blank');
	} else if(!isEmail(emailValue)){
		setErrorFor(email, 'please enter a valid email');
	} else {
		setSuccessFor(email);
	}
	if (passwordValue === '') {
		setErrorFor(password, 'password cannot be blank');
	} else {
		setSuccessFor(password);
	}
	if (nameValue && emailValue && passwordValue !== ''){
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