const passwordEye = document.querySelector("div.password i");
const passwordInput = document.querySelector("[name='password']");

// Pro PC a notebooky
passwordEye.addEventListener("mousedown", (event) => {
    passwordInput.type = "text";
    passwordEye.className = "fa-solid fa-eye";
});

passwordEye.addEventListener("mouseup", (event) => {
    passwordInput.type = "password";
    passwordEye.classList.remove("fa-eye");
    passwordEye.classList.add("fa-eye-slash");
});

passwordEye.addEventListener("mouseleave", (event) => {
    passwordInput.type = "password";
    passwordEye.className = "fa-solid fa-eye-slash";
});


// Pro mobilní zařízení
passwordEye.addEventListener("touchstart", (event) => {
    passwordInput.type = "text";
    passwordEye.className = "fa-solid fa-eye";
});

passwordEye.addEventListener("touchend", (event) => {
    passwordInput.type = "password";
    passwordEye.className = "fa-solid fa-eye-slash";
});
