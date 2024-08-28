function changeVisibility(passwordInput){
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        } else {
        passwordInput.type = "password";
}
}

// Fonction pour basculer entre le mode masqué et le mode texte du mot de passe
function togglePasswordVisibility() {
    const passwordInput = document.getElementById("input_password");
    changeVisibility(passwordInput);
}

function togglePasswordVisibilityConfirm() {
    const passwordInput = document.getElementById("confirm_password");
    changeVisibility(passwordInput)
}

