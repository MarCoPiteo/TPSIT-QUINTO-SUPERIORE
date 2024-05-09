document.addEventListener("DOMContentLoaded", function() {
    const slides = document.querySelectorAll(".slide");
    const continueButtons = document.querySelectorAll(".continue-button");
    const backButton = document.querySelectorAll('.back-button')
    const registerButton = document.querySelector('#register-button');
    let currentSlideIndex = 0;

    hideAllSlides();
    showSlide(currentSlideIndex);
    

    continueButtons.forEach(function(button, index) {
        button.addEventListener("click", function(e) {
            const errorElement = slides[currentSlideIndex].querySelector('.error'); 
            const isValid = validateInput(currentSlideIndex); 
    
            if (!isValid) {
                return;
            }
    
            if (currentSlideIndex < slides.length - 1) {
                hideSlide(currentSlideIndex);
                currentSlideIndex++; 
                showSlide(currentSlideIndex);
            }
        });
    });

    backButton.forEach(function(button) {
        button.addEventListener("click", function(e) {
            if (currentSlideIndex > 0) {
                hideSlide(currentSlideIndex);
                currentSlideIndex--;
                showSlide(currentSlideIndex);
            }
        });
    });

    registerButton.addEventListener("click", function(e) {
        const isValid = validateInput(currentSlideIndex);

        if (!isValid) {
            e.preventDefault(); // Impedisce l'invio del modulo se ci sono errori di validazione
        }
    });
    

    function hideAllSlides() {
        slides.forEach(function(slide) {
            slide.style.display = "none";
        });
    }

    function hideSlide(index) {
        slides[index].style.display = "none";
    }

    function showSlide(index) {
        slides[index].style.display = "block";
    }

    function validateInput(index) {
        const passwordInput = slides[index].querySelector('.password');
        const confirmPasswordInput = slides[index].querySelector('.confirm-password');
    
        if (index === 0) { // Slide 1
            const emailInput = slides[index].querySelector('input[type="email"]');
            const email = emailInput.value.trim();
        
            if (!isEmailValid(email)) {
                emailInput.style.backgroundColor = 'lightcoral'; 
                showError(slides[index], 'L\'email non è valida');
                return false;
            } else {
                emailInput.style.backgroundColor = ''; 
            }
        }
        
         if (index === 1) { // Slide 2
            const nameInput = slides[index].querySelector('input[name="name"]');
            const surnameInput = slides[index].querySelector('input[name="surname"]');
            const name = nameInput.value.trim();
            const surname = surnameInput.value.trim();
        
            if (!isNameValid(name) || !isNameValid(surname)) {
                nameInput.style.backgroundColor = 'lightcoral'
                surnameInput.style.backgroundColor = 'lightcoral'
                showError(slides[index], 'Il nome e il cognome non possono contenere caratteri speciali o numeri.');
                return false;
            }
        }
        
        if (index === 2) { // Slide 3
            const birthdateInput = slides[index].querySelector('input[name="birthdate"]');
            const birthdate = birthdateInput.value;
            
            if (!isAdult(birthdate)) {
                birthdateInput.style.backgroundColor = 'lightcoral'
                showError(slides[index], 'Devi avere almeno 18 anni per registrarti.');
                return false;
            }
        }
        
        if (index === 3) { // Slide 4
            const genderInput = slides[index].querySelector('select[name="gender"]');
            const gender = genderInput.value;
            
            if (!isGenderValid(gender)) {
                genderInput.style.backgroundColor = 'lightcoral'
                showError(slides[index], 'Seleziona il tuo sesso.');
                return false;
            }
        }

        if (index === 4) {
            const licenseNumberInput = slides[index].querySelector('input[name="licenseNumber"]');
            const licenseNumber = licenseNumberInput.value;
        
            //console.log("Numero patente:", licenseNumber);
        
            if (licenseNumber === '') {
                licenseNumberInput.style.backgroundColor = 'lightcoral';
                showError(slides[index], 'Il numero della patente è obbligatorio.');
                return false;
            }
        
            const licenseCreateInput = slides[index].querySelector('input[name="licenseCreate"]');
            const licenseCreate = licenseCreateInput.value;
        
            //console.log("Data emissione:", licenseCreate);
        
            if (licenseCreate === '') {
                licenseCreateInput.style.backgroundColor = 'lightcoral';
                showError(slides[index], 'La data di emissione della patente è obbligatoria.');
                return false;
            }
        
            const licenseExpireInput = slides[index].querySelector('input[name="licenseExpiration"]');
            const licenseExpire = licenseExpireInput.value;
        
            //console.log("Data scadenza:", licenseExpire);
        
            if (licenseExpire === '') {
                licenseExpireInput.style.backgroundColor = 'lightcoral';
                showError(slides[index], 'La data di scadenza della patente è obbligatoria.');
                return false;
            }
        
            if (licenseNumber.length < 10 || licenseNumber.length > 10) {
                licenseNumberInput.style.backgroundColor = 'lightcoral';
                showError(slides[index], 'Il numero della patente deve essere un codice alfanumerico composto da esattamente 10 caratteri.');
                return false;
            }
        
            const currentDate = new Date();
        
            if (new Date(licenseCreate) > currentDate) {
                showError(slides[index], 'La data di emissione della patente non può essere successiva alla data attuale.');
                return false;
            }
        
            if (new Date(licenseExpire) < currentDate) {
                showError(slides[index], 'La patente è scaduta di validità.');
                return false;
            }
        
            if (new Date(licenseExpire) < new Date(licenseCreate)) {
                showError(slides[index], 'La data di emissione della patente non può essere successiva alla data di scadenza.');
                return false;
            }
        }
        
        
        if (index === 5) {
            const passwordInput = slides[index].querySelector('#password-input');
            const confirmPasswordInput = slides[index].querySelector('#confirm-password-input');
            const password = passwordInput.value.trim();
            const confirmPassword = confirmPasswordInput.value.trim();
            
            if (password.length < 6) {
                passwordInput.style.backgroundColor = 'lightcoral';
                confirmPasswordInput.style.backgroundColor = "lightcoral";
                showError(slides[index], 'La password deve contenere almeno 6 caratteri.');
                return false;
            }
            
            if (password !== confirmPassword) {
                passwordInput.style.backgroundColor = 'lightcoral'
                confirmPasswordInput.style.backgroundColor = 'lightcoral';
                showError(slides[index], 'Le password non corrispondono.');
                return false;
            }
        }
    
        return true;
    }

    function showError(slide, message) {
        const errorElement = slide.querySelector('.error');
        errorElement.textContent = alert(message);
    }
    

    function isEmailValid(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }
    
    
    function isNameValid(name) {
        console.log("Valore del nome:", name); 
        return /^[a-zA-Z]+$/.test(name);
    }
    
    

    function isAdult(birthdate) {
        const today = new Date();
        const birthDate = new Date(birthdate);
    

        if (birthDate.getFullYear() < 2006) {
            return true;
        } else if (birthDate.getFullYear() === 2006) {
          
            const todayMonth = today.getMonth();
            const todayDay = today.getDate();
            const birthMonth = birthDate.getMonth();
            const birthDay = birthDate.getDate();
    
            if (todayMonth > birthMonth || (todayMonth === birthMonth && todayDay >= birthDay)) {
                return true; 
            }
        }
    
        return false;
    }
    
    function isGenderValid(gender) {
        return gender === 'male' || gender === 'female' || gender === 'other';
    }

    
    const passwordInput = document.getElementById('password-input');
    const confirmPasswordInput = document.getElementById('confirm-password-input');
    const togglePasswordButton = document.querySelector('.toggle-password-button');
    const toggleConfirmPasswordButton = document.querySelector('.toggle-confirm-password-button');
    const togglePassword = document.querySelector('.toggle-password')
    const confirmTogglePassword = document.querySelector('.toggle-confirm-password')

    togglePasswordButton.addEventListener('click', function() {
        togglePasswordVisibility(passwordInput, togglePasswordButton);
    });

    toggleConfirmPasswordButton.addEventListener('click', function() {
        togglePasswordVisibility(confirmPasswordInput, toggleConfirmPasswordButton);
    });

    function togglePasswordVisibility(inputField, toggleButton) {
        if (inputField.type === 'password') {
            inputField.type = 'text';
            togglePassword.classList.remove('.fa-eye')
            togglePassword.classList.add('.fa-eye-slash')
            confirmTogglePassword.classList.remove('.fa-eye')
            confirmTogglePassword.classList.add('.fa-eye-slash')
        } else if (inputField.type === 'text') {
            inputField.type = 'password';
            toggleButton.classList.remove('.fa-eye-slash')
            toggleButton.classList.add('.fa-eye')
            confirmTogglePassword.classList.remove('.fa-eye-slash')
            confirmTogglePassword.classList.add('.fa-eye')
        }
    }
});
