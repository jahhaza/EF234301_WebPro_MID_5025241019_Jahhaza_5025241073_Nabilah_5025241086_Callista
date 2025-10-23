@extends('layouts.app')

@section('title', 'Login - NIKI OFFICIAL')
@section('description', 'Login to your NIKI OFFICIAL account to access exclusive content, merch, and music.')

@section('content')
<div class="auth-container">
    <div class="container">
        <div class="auth-content">
            <div class="auth-form-container">
                <div class="auth-header">
                    <h1>Welcome Back</h1>
                    <p>Sign in to your NIKI OFFICIAL account</p>
                </div>
                
                <form class="auth-form" id="login-form">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                        <div class="error-message" id="email-error"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                        <div class="error-message" id="password-error"></div>
                    </div>
                    
                    <div class="form-options">
                        <div class="remember-me">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Remember me</label>
                        </div>
                        <a href="{{ route('password.request') }}" class="forgot-password">Forgot password?</a>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-auth">Sign In</button>
                    
                    <div class="error-message" id="general-error"></div>
                    <div class="success-message" id="success-message"></div>
                </form>
                
                <div class="auth-footer">
                    <p>Don't have an account? <a href="{{ route('register') }}">Create one here</a></p>
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
                    <h2>NIKI OFFICIAL</h2>
                    <p>Access exclusive content, early merch drops, and personalized music experiences.</p>
                    <div class="auth-benefits">
                        <div class="benefit-item">
                            <i class="fas fa-shopping-bag"></i>
                            <span>Early access to merch</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-music"></i>
                            <span>Exclusive music content</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-ticket-alt"></i>
                            <span>Priority concert tickets</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-gift"></i>
                            <span>Special member discounts</span>
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
    background: linear-gradient(135deg, var(--navy) 0%, var(--maroon) 100%);
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

.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.remember-me {
    display: flex;
    align-items: center;
    gap: 8px;
}

.remember-me input {
    width: auto;
}

.remember-me label {
    margin: 0;
    font-size: 14px;
    color: var(--dark-gray);
}

.forgot-password {
    color: var(--maroon);
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
}

.forgot-password:hover {
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
    text-align: center;
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
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    max-width: 400px;
    margin: 0 auto;
}

.benefit-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    backdrop-filter: blur(10px);
}

.benefit-item i {
    font-size: 20px;
    color: var(--maroon);
}

.benefit-item span {
    font-size: 14px;
    font-weight: 500;
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
    
    .form-options {
        flex-direction: column;
        gap: 15px;
        align-items: flex-start;
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
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('login-form');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    
    // Clear error messages when user starts typing
    emailInput.addEventListener('input', function() {
        hideMessage('email-error');
        hideMessage('general-error');
    });
    
    passwordInput.addEventListener('input', function() {
        hideMessage('password-error');
        hideMessage('general-error');
    });
    
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const email = emailInput.value.trim();
        const password = passwordInput.value.trim();
        const remember = document.getElementById('remember').checked;
        
        // Reset previous errors
        hideAllErrors();
        
        // Validation
        let isValid = true;
        
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
        
        if (!isValid) return;
        
        // Simulate login process
        simulateLogin(email, password, remember);
    });
    
    // Social login buttons
    document.querySelector('.btn-google').addEventListener('click', function() {
        showMessage('general-error', 'Google login integration coming soon');
    });
    
    document.querySelector('.btn-spotify').addEventListener('click', function() {
        showMessage('general-error', 'Spotify login integration coming soon');
    });
});

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function simulateLogin(email, password, remember) {
    // Show loading state
    const submitBtn = document.querySelector('.btn-auth');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Signing in...';
    submitBtn.disabled = true;
    
    // Get users from localStorage
    const users = JSON.parse(localStorage.getItem('users') || '[]');
    
    // Find user
    const user = users.find(u => u.email === email && u.password === password);
    
    setTimeout(() => {
        if (user) {
            // Login successful
            currentUser = user;
            
            // Save to localStorage if remember me is checked
            if (remember) {
                localStorage.setItem('currentUser', JSON.stringify(user));
            }
            
            // Show success message
            showMessage('success-message', 'Login successful! Redirecting...');
            
            // Redirect to home page after delay
            setTimeout(() => {
                window.location.href = '/';
            }, 1500);
        } else {
            // Login failed
            showMessage('general-error', 'Invalid email or password');
            
            // Reset button
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }
    }, 1000);
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
    hideMessage('email-error');
    hideMessage('password-error');
    hideMessage('general-error');
    hideMessage('success-message');
}
</script>
@endsection