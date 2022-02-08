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
const name= document.getElementById('name');
const email = document.getElementById('email');
const password = document.getElementById('password');
const noTelp = document.getElementById('noTelp');
const tglLahir = document.getElementById('tglLahir');
const userDesc = document.getElementById('userDesc');

form.addEventListener('submit', (e) => {
	e.preventDefault();

	checkInputs();

});

function checkInputs() {
	const nameValue = name.value.trim();
	const emailValue = email.value.trim();
	const passwordValue = password.value.trim();
	const noTelpValue = noTelp.value.trim();
	const tglLahirValue = tglLahir.value.trim();
	if (nameValue === '') {
		setErrorFor(name, 'name cannot be blank');
	} else {
		setSuccessFor(name);
	}
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
	if (noTelpValue === '') {
		setErrorFor(noTelp, 'phone number cannot be blank');
	} else {
		setSuccessFor(noTelp);
	}
	if (tglLahirValue === '') {
		setErrorFor(tglLahir, 'birthday date cannot be blank');
	} else {
		setSuccessFor(tglLahir);
	}
	if (nameValue && emailValue && passwordValue && noTelpValue && tglLahirValue !== ''){
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