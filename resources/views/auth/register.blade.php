@extends('layouts.app')

@section('title', 'Register - NIKI OFFICIAL')
@section('description', 'Create your NIKI OFFICIAL account to access exclusive content, merch, and music.')

@section('content')
<div class="auth-container">
    <div class="container">
        <div class="auth-content">
            <div class="auth-form-container">
                <div class="auth-header">
                    <h1>Join NIKI OFFICIAL</h1>
                    <p>Create your account to get started</p>
                </div>
                
                <form class="auth-form" id="register-form">
                    @csrf
                    <div class="form-group">
                        <label for="full-name">Full Name</label>
                        <input type="text" id="full-name" name="name" required>
                        <div class="error-message" id="name-error"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                        <div class="error-message" id="email-error"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                        <div class="password-strength" id="password-strength"></div>
                        <div class="error-message" id="password-error"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" id="confirm-password" name="password_confirmation" required>
                        <div class="error-message" id="confirm-error"></div>
                    </div>
                    
                    <div class="form-options">
                        <div class="terms-agreement">
                            <input type="checkbox" id="terms" name="terms" required>
                            <label for="terms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
                        </div>
                    </div>
                    
                    <div class="form-options">
                        <div class="newsletter-optin">
                            <input type="checkbox" id="newsletter" name="newsletter" checked>
                            <label for="newsletter">Send me updates about new music, merch drops, and exclusive content</label>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-auth">Create Account</button>
                    
                    <div class="error-message" id="general-error"></div>
                    <div class="success-message" id="success-message"></div>
                </form>
                
                <div class="auth-footer">
                    <p>Already have an account? <a href="{{ route('login') }}">Sign in here</a></p>
                </div>
                
                <div class="auth-divider">
                    <span>Or continue with</span>
                </div>
                
                <div class="social-auth">
                    <button class="btn btn-social btn-google">
                        <i class="fab fa-google"></i>
                        Continue with Google
                    </button>
                    <button class="btn btn-social btn-spotify">
                        <i class="fab fa-spotify"></i>
                        Continue with Spotify
                    </button>
                </div>
            </div>
            
            <div class="auth-hero">
                <div class="auth-hero-content">
                    <h2>Welcome to the Community</h2>
                    <p>Join thousands of fans who get exclusive access to NIKI's world.</p>
                    <div class="auth-benefits">
                        <div class="benefit-item">
                            <i class="fas fa-shopping-bag"></i>
                            <div>
                                <strong>Early Merch Access</strong>
                                <span>Shop new collections before anyone else</span>
                            </div>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-music"></i>
                            <div>
                                <strong>Exclusive Content</strong>
                                <span>Behind-the-scenes and unreleased tracks</span>
                            </div>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-ticket-alt"></i>
                            <div>
                                <strong>Priority Tickets</strong>
                                <span>Early access to concert tickets</span>
                            </div>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-gift"></i>
                            <div>
                                <strong>Member Discounts</strong>
                                <span>Special pricing on merch and albums</span>
                            </div>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-users"></i>
                            <div>
                                <strong>Fan Community</strong>
                                <span>Connect with other NIKI fans</span>
                            </div>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-star"></i>
                            <div>
                                <strong>Exclusive Events</strong>
                                <span>Virtual meetups and listening parties</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.auth-container {
    min-height: 100vh;
    background: linear-gradient(135deg, var(--maroon) 0%, var(--navy) 100%);
    padding: 100px 0 50px;
    display: flex;
    align-items: center;
}

.auth-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
}

.auth-form-container {
    background: var(--white);
    padding: 50px 40px;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
}

.auth-header {
    text-align: center;
    margin-bottom: 40px;
}

.auth-header h1 {
    font-size: 32px;
    color: var(--navy);
    margin-bottom: 10px;
    font-weight: 700;
}

.auth-header p {
    color: var(--dark-gray);
    font-size: 16px;
}

.auth-form {
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 25px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: var(--navy);
    font-size: 14px;
}

.form-group input {
    width: 100%;
    padding: 15px;
    border: 2px solid var(--medium-gray);
    border-radius: 10px;
    font-size: 16px;
    transition: var(--transition);
}

.form-group input:focus {
    border-color: var(--maroon);
    outline: none;
    box-shadow: 0 0 0 3px rgba(123, 27, 27, 0.1);
}

.password-strength {
    height: 4px;
    margin-top: 8px;
    border-radius: 2px;
    transition: all 0.3s ease;
}

.strength-weak {
    background-color: #e74c3c;
    width: 25%;
}

.strength-fair {
    background-color: #f39c12;
    width: 50%;
}

.strength-good {
    background-color: #f1c40f;
    width: 75%;
}

.strength-strong {
    background-color: #27ae60;
    width: 100%;
}

.form-options {
    margin-bottom: 20px;
}

.terms-agreement,
.newsletter-optin {
    display: flex;
    align-items: flex-start;
    gap: 10px;
}

.terms-agreement input,
.newsletter-optin input {
    width: auto;
    margin-top: 3px;
}

.terms-agreement label,
.newsletter-optin label {
    margin: 0;
    font-size: 14px;
    color: var(--dark-gray);
    line-height: 1.4;
}

.terms-agreement a,
.newsletter-optin a {
    color: var(--maroon);
    text-decoration: none;
}

.terms-agreement a:hover,
.newsletter-optin a:hover {
    text-decoration: underline;
}

.btn-auth {
    width: 100%;
    padding: 15px;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 20px;
}

.auth-footer {
    text-align: center;
    margin-bottom: 30px;
}

.auth-footer p {
    color: var(--dark-gray);
    font-size: 14px;
}

.auth-footer a {
    color: var(--maroon);
    font-weight: 500;
    text-decoration: none;
}

.auth-footer a:hover {
    text-decoration: underline;
}

.auth-divider {
    position: relative;
    text-align: center;
    margin-bottom: 30px;
}

.auth-divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: var(--medium-gray);
}

.auth-divider span {
    background: var(--white);
    padding: 0 15px;
    color: var(--dark-gray);
    font-size: 14px;
    position: relative;
}

.social-auth {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.btn-social {
    padding: 15px;
    border: 2px solid var(--medium-gray);
    border-radius: 10px;
    background: var(--white);
    color: var(--navy);
    font-weight: 500;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: var(--transition);
}

.btn-social:hover {
    border-color: var(--maroon);
    transform: translateY(-2px);
}

.btn-google:hover {
    background: #4285F4;
    color: white;
    border-color: #4285F4;
}

.btn-spotify:hover {
    background: #1DB954;
    color: white;
    border-color: #1DB954;
}

.auth-hero {
    color: var(--white);
}

.auth-hero-content h2 {
    font-size: 48px;
    margin-bottom: 20px;
    font-weight: 700;
}

.auth-hero-content p {
    font-size: 18px;
    margin-bottom: 40px;
    opacity: 0.9;
    line-height: 1.6;
}

.auth-benefits {
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
}

.benefit-item {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    padding: 20px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    backdrop-filter: blur(10px);
    transition: var(--transition);
}

.benefit-item:hover {
    background: rgba(255, 255, 255, 0.15);
    transform: translateX(5px);
}

.benefit-item i {
    font-size: 24px;
    color: var(--maroon);
    margin-top: 2px;
}

.benefit-item div {
    flex: 1;
}

.benefit-item strong {
    display: block;
    font-size: 16px;
    margin-bottom: 5px;
    font-weight: 600;
}

.benefit-item span {
    font-size: 14px;
    opacity: 0.8;
    line-height: 1.4;
}

.error-message {
    color: #e74c3c;
    font-size: 14px;
    margin-top: 5px;
    display: none;
}

.success-message {
    color: #27ae60;
    font-size: 14px;
    margin-top: 5px;
    display: none;
}

/* Responsive */
@media (max-width: 968px) {
    .auth-content {
        grid-template-columns: 1fr;
        gap: 40px;
    }
    
    .auth-hero {
        order: -1;
    }
    
    .auth-hero-content h2 {
        font-size: 36px;
    }
}

@media (max-width: 768px) {
    .auth-container {
        padding: 80px 0 30px;
    }
    
    .auth-form-container {
        padding: 40px 30px;
    }
    
    .auth-benefits {
        grid-template-columns: 1fr;
    }
    
    .benefit-item {
        padding: 15px;
    }
}

@media (max-width: 480px) {
    .auth-form-container {
        padding: 30px 20px;
        margin: 0 10px;
    }
    
    .auth-header h1 {
        font-size: 28px;
    }
    
    .auth-hero-content h2 {
        font-size: 32px;
    }
    
    .terms-agreement,
    .newsletter-optin {
        align-items: flex-start;
    }
    
    .terms-agreement label,
    .newsletter-optin label {
        font-size: 13px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.getElementById('register-form');
    const nameInput = document.getElementById('full-name');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const confirmInput = document.getElementById('confirm-password');
    const termsCheckbox = document.getElementById('terms');
    const passwordStrength = document.getElementById('password-strength');
    
    // Clear error messages when user starts typing
    [nameInput, emailInput, passwordInput, confirmInput].forEach(input => {
        input.addEventListener('input', function() {
            const fieldName = this.name;
            hideMessage(fieldName + '-error');
            hideMessage('general-error');
            
            // Update password strength in real-time
            if (this.name === 'password') {
                updatePasswordStrength(this.value);
            }
            
            // Check password match in real-time
            if (this.name === 'password' || this.name === 'password_confirmation') {
                checkPasswordMatch();
            }
        });
    });
    
    termsCheckbox.addEventListener('change', function() {
        hideMessage('general-error');
    });
    
    registerForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const name = nameInput.value.trim();
        const email = emailInput.value.trim();
        const password = passwordInput.value.trim();
        const confirmPassword = confirmInput.value.trim();
        const termsAccepted = termsCheckbox.checked;
        
        // Reset previous errors
        hideAllErrors();
        
        // Validation
        let isValid = true;
        
        if (!name) {
            showMessage('name-error', 'Full name is required');
            isValid = false;
        } else if (name.length < 2) {
            showMessage('name-error', 'Name must be at least 2 characters');
            isValid = false;
        }
        
        if (!email) {
            showMessage('email-error', 'Email is required');
            isValid = false;
        } else if (!isValidEmail(email)) {
            showMessage('email-error', 'Please enter a valid email address');
            isValid = false;
        }
        
        if (!password) {
            showMessage('password-error', 'Password is required');
            isValid = false;
        } else if (password.length < 6) {
            showMessage('password-error', 'Password must be at least 6 characters');
            isValid = false;
        }
        
        if (!confirmPassword) {
            showMessage('confirm-error', 'Please confirm your password');
            isValid = false;
        } else if (password !== confirmPassword) {
            showMessage('confirm-error', 'Passwords do not match');
            isValid = false;
        }
        
        if (!termsAccepted) {
            showMessage('general-error', 'You must agree to the Terms of Service and Privacy Policy');
            isValid = false;
        }
        
        if (!isValid) return;
        
        // Simulate registration process
        simulateRegistration(name, email, password);
    });
    
    // Social register buttons
    document.querySelector('.btn-google').addEventListener('click', function() {
        showMessage('general-error', 'Google registration integration coming soon');
    });
    
    document.querySelector('.btn-spotify').addEventListener('click', function() {
        showMessage('general-error', 'Spotify registration integration coming soon');
    });
});

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function updatePasswordStrength(password) {
    const strengthBar = document.getElementById('password-strength');
    
    if (!password) {
        strengthBar.className = 'password-strength';
        return;
    }
    
    let strength = 0;
    
    // Length check
    if (password.length >= 8) strength += 1;
    
    // Contains lowercase
    if (/[a-z]/.test(password)) strength += 1;
    
    // Contains uppercase
    if (/[A-Z]/.test(password)) strength += 1;
    
    // Contains numbers
    if (/[0-9]/.test(password)) strength += 1;
    
    // Contains special characters
    if (/[^A-Za-z0-9]/.test(password)) strength += 1;
    
    // Update strength display
    switch(strength) {
        case 0:
        case 1:
            strengthBar.className = 'password-strength strength-weak';
            break;
        case 2:
            strengthBar.className = 'password-strength strength-fair';
            break;
        case 3:
            strengthBar.className = 'password-strength strength-good';
            break;
        case 4:
        case 5:
            strengthBar.className = 'password-strength strength-strong';
            break;
    }
}

function checkPasswordMatch() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
    const confirmError = document.getElementById('confirm-error');
    
    if (confirmPassword && password !== confirmPassword) {
        showMessage('confirm-error', 'Passwords do not match');
    } else if (confirmPassword && password === confirmPassword) {
        hideMessage('confirm-error');
    }
}

function simulateRegistration(name, email, password) {
    // Show loading state
    const submitBtn = document.querySelector('.btn-auth');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Creating Account...';
    submitBtn.disabled = true;
    
    // Get users from localStorage
    const users = JSON.parse(localStorage.getItem('users') || '[]');
    
    // Check if user already exists
    if (users.find(u => u.email === email)) {
        showMessage('email-error', 'Email already registered');
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
        return;
    }
    
    setTimeout(() => {
        // Create new user
        const newUser = {
            id: Date.now(),
            name: name,
            email: email,
            password: password,
            createdAt: new Date().toISOString(),
            newsletter: document.getElementById('newsletter').checked
        };
        
        // Save user
        users.push(newUser);
        localStorage.setItem('users', JSON.stringify(users));
        
        // Auto login
        currentUser = newUser;
        localStorage.setItem('currentUser', JSON.stringify(newUser));
        
        // Show success message
        showMessage('success-message', 'Account created successfully! Welcome to NIKI OFFICIAL');
        
        // Redirect to home page after delay
        setTimeout(() => {
            window.location.href = '/';
        }, 2000);
    }, 1500);
}

function showMessage(elementId, message) {
    const element = document.getElementById(elementId);
    element.textContent = message;
    element.style.display = 'block';
}

function hideMessage(elementId) {
    const element = document.getElementById(elementId);
    element.style.display = 'none';
}

function hideAllErrors() {
    hideMessage('name-error');
    hideMessage('email-error');
    hideMessage('password-error');
    hideMessage('confirm-error');
    hideMessage('general-error');
    hideMessage('success-message');
}
</script>
@endsection