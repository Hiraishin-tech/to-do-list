const first_password = document.querySelector(".first-password")
const second_password = document.querySelector(".second-password")
const paragraphText = document.querySelector("p.password-text")

const registration_btn = document.getElementById("btn")

first_password.addEventListener("input", ()=> {
    password1Value = first_password.value
    password2Value = second_password.value
    
    if (password1Value === password2Value) {
        paragraphText.textContent = "Hesla jsou shodná"
        paragraphText.classList.add("valid")
        paragraphText.classList.remove("invalid")
        registration_btn.removeAttribute("disabled")

    } else {
        paragraphText.textContent = "Hesla nejsou shodná"
        paragraphText.classList.add("invalid")
        paragraphText.classList.remove("valid")
        registration_btn.setAttribute("disabled", "disabled")
    }

    if (password1Value === "" && password2Value === "") {
        paragraphText.textContent = ""
        registration_btn.setAttribute("disabled", "disabled")
    }

})


second_password.addEventListener("input", () => {
    password1Value = first_password.value
    password2Value = second_password.value
    if (password1Value === password2Value) {
        paragraphText.textContent = "Hesla jsou shodná"
        paragraphText.classList.add("valid")
        paragraphText.classList.remove("invalid")
        registration_btn.removeAttribute("disabled")
    } else {
        paragraphText.textContent = "Hesla nejsou shodná"
        paragraphText.classList.add("invalid")
        paragraphText.classList.remove("valid")
        registration_btn.setAttribute("disabled", "disabled")
    }
    if (password1Value === "" && password2Value === "") {
        paragraphText.textContent = ""
        registration_btn.setAttribute("disabled", "disabled")
    }

})