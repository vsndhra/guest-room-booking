function showLoginForm(userType) {
    var loginForms = document.getElementsByClassName("login-form");
    for (var i = 0; i < loginForms.length; i++) {
        loginForms[i].style.display = "none";
    }
    var loginForm = document.getElementById(userType + "-login-form");
    loginForm.style.display = "block";
}

function showRegisterForm(userType) {
    var loginForms = document.getElementsByClassName("login-form");
    var registerForms = document.getElementsByClassName("register-form");
    
    for (var i = 0; i < loginForms.length; i++) {
        loginForms[i].style.display = "none";
    }
    
    for (var i = 0; i < registerForms.length; i++) {
        registerForms[i].style.display = "none";
    }
    
    var registerForm = document.getElementById(userType + "-register-form");
    registerForm.style.display = "block";
}

function showLoginFormFromRegister(userType) {
    var loginForms = document.getElementsByClassName("login-form");
    var registerForms = document.getElementsByClassName("register-form");
    
    for (var i = 0; i < loginForms.length; i++) {
        loginForms[i].style.display = "none";
    }
    
    for (var i = 0; i < registerForms.length; i++) {
        registerForms[i].style.display = "none";
    }
    
    var loginForm = document.getElementById(userType + "-login-form");
    loginForm.style.display = "block";
}

function disableForm(formId) {
    var form = document.getElementById(formId);
    var inputs = form.getElementsByTagName("input");
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].disabled = true;
    }
}
