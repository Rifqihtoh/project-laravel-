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
const nameVG= document.getElementById('nameVG');
const tanggal= document.getElementById('tanggal');
const tanggalAK= document.getElementById('tanggalAK');
const kuota= document.getElementById('kuota');
const eventDesc= document.getElementById('eventDesc');

form.addEventListener('submit', (e) => {
	e.preventDefault();

	checkInputs();

});

function checkInputs() {
	const nameValue = name.value.trim();
	const nameVGValue = nameVG.value.trim();
	const tanggalAKValue = tanggalAK.value.trim();
	const tanggalValue = tanggal.value.trim();
	const kuotaValue = kuota.value.trim();
	const eventDescValue = eventDesc.value.trim();
	if (nameValue === '') {
		setErrorFor(name, 'this field cannot be blank');
	} else {
		setSuccessFor(name);
	}
	if (nameVGValue === '') {
		setErrorFor(nameVG, 'this field cannot be blank');
	} else {
		setSuccessFor(nameVG);
	}
	if (tanggalValue === '') {
		setErrorFor(tanggal, 'this field cannot be blank');
	} else {
		setSuccessFor(tanggal);
	}
	if (tanggalAKValue === '') {
		setErrorFor(tanggalAK, 'this field cannot be blank');
	} else {
		setSuccessFor(tanggalAK);
	}
	if (kuotaValue === '') {
		setErrorFor(kuota, 'this field cannot be blank');
	} else {
		setSuccessFor(kuota);
	}
	if (eventDescValue === '') {
		setErrorFor(eventDesc, 'this field cannot be blank');
	} else {
		setSuccessFor(eventDesc);
	}
	if (nameValue && nameVGValue && tanggalValue && tanggalAKValue && kuotaValue && eventDescValue !== ''){
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
