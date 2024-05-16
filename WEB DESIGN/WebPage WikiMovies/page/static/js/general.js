/*CHECK LOGIN STATUS*/
checkAuthStatus();

function checkAuthStatus() {
    fetch('/static/php/status-login.php')
        .then(response => response.json())
        .then(data => {
            //console.log("Auth status:", data);
            const profilePic = document.querySelector('.profile-img');
            const accountIcon = document.querySelector('.login-icon')
            if (data.loggedIn) {  
                profilePic.src = 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTKNvN1d8BSJPWenCvCOx2oOTDYqBSzjLkuDplC6Iw89KZONqnk';

                accountIcon.classList.add('disactive');
                profilePic.style.display = 'block';            
            } else if (!data.loggedIn) {
                accountIcon.classList.remove('disactive');
                profilePic.style.display = 'none';
            }
        })
        .catch(error => {
            console.error('Error fetching authentication status:', error);
        });
}



/*BACK BUTTON*/
var backButton = document.querySelector('.back-button');

backButton.addEventListener('click', function() {
    window.history.back();
});



/*PASSWORD VISIBILITY*/
var pwVisibButton = document.getElementById('pw-visib');
pwVisibButton.addEventListener('click', function(event) {
    event.preventDefault();

    var passwordBox = document.getElementById('password-input');
    var icon = document.querySelector('#pw-visib-icon');

    togglePwVisibility(icon, passwordBox);
});

var confPwVisibButton = document.getElementById('confirm-pw-visib');
confPwVisibButton.addEventListener('click', function(event) {
    event.preventDefault();

    var passwordBox = document.getElementById('confirm-password-input');
    var icon = document.querySelector('#confirm-password-visib-icon');

    togglePwVisibility(icon, passwordBox);
});



function togglePwVisibility(icon, passwordInput) {
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.textContent = "visibility_off";
    } else {
        passwordInput.type = "password";
        icon.textContent = "visibility";
    }
}