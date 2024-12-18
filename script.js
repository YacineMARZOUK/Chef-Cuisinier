       //brguer mobile
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
   

        //Sign Up and Sign In forms
        const signUpForm = document.getElementById('signUpForm');
        const signInForm = document.getElementById('signInForm');
        const showSignUpButton = document.getElementById('showSignUp');
        const showSignInButton = document.getElementById('showSignIn');

        showSignUpButton.addEventListener('click', () => {
            signUpForm.classList.remove('hidden');
            signInForm.classList.add('hidden');
            showSignUpButton.classList.add('bg-custom', 'text-white');
            showSignUpButton.classList.remove('bg-gray-300', 'text-gray-800');
            showSignInButton.classList.add('bg-gray-300', 'text-gray-800');
            showSignInButton.classList.remove('bg-custom', 'text-white');
        });

        showSignInButton.addEventListener('click', () => {
            signInForm.classList.remove('hidden');
            signUpForm.classList.add('hidden');
            showSignInButton.classList.add('bg-custom', 'text-white');
            showSignInButton.classList.remove('bg-gray-300', 'text-gray-800');
            showSignUpButton.classList.add('bg-gray-300', 'text-gray-800');
            showSignUpButton.classList.remove('bg-custom', 'text-white');
        });
        //
        document.querySelector('#signUpForm form').addEventListener('submit', function (e) {
            // Get form values
            const fullName = document.getElementById('nom').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('mot_de_passe').value.trim();
            const role = document.getElementById('role').value;
            const address = document.getElementById('adresse').value.trim();
    
            // Regular Expression for email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
            let isValid = true;
            let errorMessages = [];
    
            // Full Name validation
            if (fullName === '') {
                isValid = false;
                errorMessages.push('Full Name is required.');
            }
    
            // Email validation
            if (!emailRegex.test(email)) {
                isValid = false;
                errorMessages.push('Please enter a valid email.');
            }
    
            // Password validation (at least 6 characters)
            if (password.length < 6) {
                isValid = false;
                errorMessages.push('Password must be at least 6 characters long.');
            }
    
            // Role validation
            if (!role) {
                isValid = false;
                errorMessages.push('Please select a role.');
            }
    
            // Address validation
            if (address === '') {
                isValid = false;
                errorMessages.push('Address is required.');
            }
    
            // Prevent form submission and show errors
            if (!isValid) {
                e.preventDefault();
                alert('Please fix the following errors:\n' + errorMessages.join('\n'));
            }
        });
    
        // Function to validate Sign-In form
        document.querySelector('#signInForm form').addEventListener('submit', function (e) {
            // Get form values
            const email = document.getElementById('email_signin').value.trim();
            const password = document.getElementById('mot_de_passe_signin').value.trim();
    
            // Regular Expression for email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
            let isValid = true;
            let errorMessages = [];
    
            // Email validation
            if (!emailRegex.test(email)) {
                isValid = false;
                errorMessages.push('Please enter a valid email.');
            }
    
            // Password validation (at least 6 characters)
            if (password.length < 6) {
                isValid = false;
                errorMessages.push('Password must be at least 6 characters long.');
            }
    
            // Prevent form submission and show errors
            if (!isValid) {
                e.preventDefault();
                alert('Please fix the following errors:\n' + errorMessages.join('\n'));
            }
        });