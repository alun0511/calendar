const errorField = document.querySelector(".error");

if (errorField.firstChild != null) {
    setTimeout(() => {
        errorField.classList.add("error-active");
    }, 500);
    setTimeout(() => {
        errorField.classList.remove("error-active");
    }, 5000);
    setTimeout(() => {
        errorField.classList.remove("error-active");
    }, 10000);
}
