<!-- Login Required Message -->
<div class="login-required-message" id="login-required-message">
    <div class="login-message-container">
        <div class="login-message-icon">
            <i class="fas fa-exclamation-circle"></i>
        </div>
        <div class="login-message-text">
            <h2>PLEASE LOGIN TO CHECKOUT</h2>
            <p>You need to be logged in to complete your purchase.</p>
        </div>
        <button class="btn btn-primary" id="login-from-checkout">Login Now</button>
    </div>
</div>

<!-- Queue Modal -->
<div class="queue-modal" id="queue-modal">
    <div class="queue-container">
        <div class="queue-header">
            <h2>Queue</h2>
            <button class="close-queue" id="close-queue"><i class="fas fa-times"></i></button>
        </div>
        <div class="queue-list" id="queue-list">
            <!-- Queue items will be populated by JavaScript -->
        </div>
    </div>
</div>

<!-- Cart Drawer -->
<div class="cart-drawer" id="cart-drawer">
    <div class="cart-header">
        <h2>Your Cart</h2>
        <button class="close-cart" id="close-cart"><i class="fas fa-times"></i></button>
    </div>
    <div class="cart-items" id="cart-items">
        <!-- Cart items will be populated by JavaScript -->
    </div>
    <div class="cart-footer">
        <div class="cart-subtotal">
            <span>Subtotal:</span>
            <span id="cart-subtotal-price">Rp 0</span>
        </div>
        <button class="checkout-btn" id="checkout-btn">Secure Checkout</button>
    </div>
</div>

<!-- Product Detail Modal -->
<div class="product-modal" id="product-modal">
    <div class="product-container">
        <div class="product-header">
            <h2 id="product-modal-title">Product Details</h2>
            <button class="close-product" id="close-product"><i class="fas fa-times"></i></button>
        </div>
        <div class="product-content">
            <div class="product-image">
                <img id="product-modal-image" src="" alt="Product Image">
            </div>
            <div class="product-details">
                <h3 class="product-title" id="product-modal-name"></h3>
                <div class="product-price" id="product-modal-price"></div>
                <div class="product-description" id="product-modal-description"></div>
                <div class="product-features" id="product-modal-features"></div>
                <div class="product-actions">
                    <button class="btn btn-primary" id="product-add-to-cart">Add to Cart</button>
                    <button class="btn btn-outline" id="product-buy-now">Buy Now</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Checkout Modal -->
<div class="checkout-modal" id="checkout-modal">
    <div class="checkout-container">
        <div class="checkout-header">
            <h2>Checkout</h2>
            <button class="close-checkout" id="close-checkout"><i class="fas fa-times"></i></button>
        </div>
        <div class="checkout-content">
            <div class="checkout-form">
                <h3>Shipping Information</h3>
                <form id="checkout-form">
                    <div class="form-group">
                        <label for="full-name">Full Name</label>
                        <input type="text" id="full-name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" required>
                    </div>
                    
                    <!-- REVISI 1: Komponen Lokasi - Hapus dropdown dan ganti dengan input teks -->
                    <div class="location-form">
                        <h4>Shipping Address</h4>
                        <div class="location-row">
                            <div class="location-field">
                                <label for="province">Province</label>
                                <input type="text" id="province" required placeholder="Enter your province">
                            </div>
                            <div class="location-field">
                                <label for="city">City/Regency</label>
                                <input type="text" id="city" required placeholder="Enter your city/regency">
                            </div>
                        </div>
                        <div class="location-row">
                            <div class="location-field">
                                <label for="district">District</label>
                                <input type="text" id="district" required placeholder="Enter your district">
                            </div>
                            <div class="location-field">
                                <label for="village">Village</label>
                                <input type="text" id="village" required placeholder="Enter your village">
                            </div>
                        </div>
                        <div class="location-row">
                            <div class="location-field">
                                <label for="postal-code">Postal Code</label>
                                <input type="text" id="postal-code" placeholder="Enter your postal code">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="street-address">Full Address (Street, Building, etc.)</label>
                            <textarea id="street-address" required placeholder="Jl. Example No. 123, RT/RW, etc."></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="notes">Notes (Optional)</label>
                        <textarea id="notes" placeholder="Special delivery instructions..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Continue to Payment</button>
                </form>
            </div>
            <div class="checkout-summary">
                <h3>Order Summary</h3>
                <div class="checkout-items" id="checkout-items">
                    <!-- Checkout items will be populated by JavaScript -->
                </div>
                <div class="checkout-total">
                    <span>Total:</span>
                    <span id="checkout-total-price">Rp 0</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Payment Modal - BCA Transfer -->
<div class="payment-modal" id="payment-modal">
    <div class="payment-container">
        <div class="payment-header">
            <h2>Transfer to BCA</h2>
            <button class="close-payment" id="close-payment"><i class="fas fa-times"></i></button>
        </div>
        <div class="bca-transfer-info">
            <h3>BCA Transfer Information</h3>
            <div class="bank-details">
                <p><strong>Bank:</strong> BCA</p>
                <p><strong>Account Number:</strong> 1234567890</p>
                <p><strong>Account Name:</strong> NIKI OFFICIAL</p>
            </div>
            <div class="upload-section">
                <h4>Upload Transfer Proof (PNG or PDF, max 5MB)</h4>
                <form id="upload-form">
                    <div class="form-group">
                        <label for="transfer-proof">Choose File</label>
                        <input type="file" id="transfer-proof" accept=".png,.jpg,.jpeg,.pdf" required>
                        <div class="file-preview" id="file-preview"></div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Submit Proof</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Upload Success Modal -->
<div class="upload-success-modal" id="upload-success-modal">
    <div class="upload-success-container">
        <div class="upload-success-icon">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="upload-success-message">
            <h2>Your Payment Was Successful!</h2>
            <p>Your payment will be confirmed via email.</p>
        </div>
    </div>
</div>

<!-- Receipt Modal -->
<div class="receipt-modal" id="receipt-modal">
    <div class="receipt-container">
        <div class="receipt-header">
            <h2>Payment Receipt</h2>
            <button class="close-receipt" id="close-receipt"><i class="fas fa-times"></i></button>
        </div>
        <div class="receipt-content">
            <div class="niki-photo">
                <!-- Ganti dengan path foto NIKI yang sesuai -->
                <img src="{{ asset('images/NIKIThankYou.jpg') }}" alt="NIKI">
            </div>
            <div class="thank-you-message">
                <p>Hello, <span id="receipt-customer-name"></span>!</p>
                <p>Thank you — NIKI.</p>
                <p>I truly appreciate your support and trust in what I create.</p>
                <p>We will confirm your payment shortly and send the official receipt to your email.</p>
                <p>If you need any assistance, please reply to this email and we will help you right away.</p>
            </div>
            <div class="transaction-details">
                <h3>Transaction Details</h3>
                <p><strong>Order ID:</strong> <span id="receipt-order-id"></span></p>
                <p><strong>Date:</strong> <span id="receipt-date"></span></p>
                <p><strong>Amount:</strong> <span id="receipt-amount"></span></p>
                <p><strong>Bank:</strong> BCA</p>
                <p><strong>Account Name:</strong> NIKI OFFICIAL</p>
                <p><strong>Account Number:</strong> 1234567890</p>
            </div>
            <div class="proof-image">
                <h4>Transfer Proof</h4>
                <img id="receipt-proof-image" src="" alt="Transfer Proof">
            </div>
            <button class="btn btn-primary" id="download-receipt-pdf">Download Receipt (PDF)</button>
        </div>
    </div>
</div>

<!-- Account Modal -->
<div class="account-modal" id="account-modal">
    <div class="account-container">
        <div class="account-header">
            <h2>My Account</h2>
            <button class="close-account" id="close-account"><i class="fas fa-times"></i></button>
        </div>
        <div class="account-content">
            <div class="account-tabs">
                <div class="account-tab active" data-tab="profile">Profile</div>
                <div class="account-tab" data-tab="membership">Membership</div>
                <div class="account-tab" data-tab="password">Change Password</div>
                <div class="account-tab" data-tab="transactions">Transaction History</div>
            </div>
            
            <div class="account-tab-content active" id="profile-tab">
                <h3>Profile Information</h3>
                <form id="profile-form">
                    <div class="form-group">
                        <label for="profile-name">Full Name</label>
                        <input type="text" id="profile-name" required>
                    </div>
                    <div class="form-group">
                        <label for="profile-email">Email</label>
                        <input type="email" id="profile-email" required readonly>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Profile</button>
                </form>
            </div>
            
            <!-- TAB MEMBERSHIP BARU -->
            <div class="account-tab-content" id="membership-tab">
                <h3>NIKI Membership</h3>
                <p>Join NIKI's exclusive membership program for special perks, early access, and more!</p>
                
                <!-- Current Membership Status -->
                <div class="current-membership" id="current-membership" style="display: none;">
                    <div class="membership-status">ACTIVE</div>
                    <h3 id="current-plan-name">NIKI Premium - Monthly</h3>
                    <p id="current-plan-description">You're currently subscribed to NIKI Premium Monthly plan.</p>
                    
                    <div class="membership-details">
                        <div class="membership-detail">
                            <div class="membership-detail-label">Next Billing Date</div>
                            <div class="membership-detail-value" id="next-billing-date">June 15, 2025</div>
                        </div>
                        <div class="membership-detail">
                            <div class="membership-detail-label">Payment Method</div>
                            <div class="membership-detail-value" id="payment-method">Credit Card (****1234)</div>
                        </div>
                        <div class="membership-detail">
                            <div class="membership-detail-label">Auto Renewal</div>
                            <div class="membership-detail-value" id="auto-renewal-status">ON</div>
                        </div>
                    </div>
                    
                    <div class="membership-actions">
                        <button class="btn btn-outline" id="manage-subscription">Manage Subscription</button>
                        <button class="btn cancel-membership" id="cancel-membership">Cancel Membership</button>
                    </div>
                </div>
                
                <!-- Membership Plans -->
                <div class="membership-plans" id="membership-plans">
                    <div class="membership-plan">
                        <div class="membership-header">
                            <h3 class="membership-title">NIKI Basic</h3>
                            <div class="membership-price">Free</div>
                            <div class="membership-period">Forever</div>
                        </div>
                        <div class="membership-features">
                            <ul>
                                <li>Access to limited content</li>
                                <li>Basic newsletter</li>
                                <li>Standard pre-sale access</li>
                            </ul>
                        </div>
                        <div class="membership-actions">
                            <button class="btn btn-outline" disabled>Current Plan</button>
                        </div>
                    </div>
                    
                    <div class="membership-plan popular">
                        <div class="popular-badge">MOST POPULAR</div>
                        <div class="membership-header">
                            <h3 class="membership-title">NIKI Premium</h3>
                            <div class="membership-price">Rp 50.000</div>
                            <div class="membership-period">per month</div>
                        </div>
                        <div class="membership-features">
                            <ul>
                                <li>Early access to new music</li>
                                <li>Exclusive merchandise pre-orders</li>
                                <li>Priority concert ticket access</li>
                                <li>10% discount on all merchandise</li>
                                <li>Members-only content</li>
                                <li>Digital album downloads</li>
                            </ul>
                        </div>
                        <div class="membership-actions">
                            <button class="btn btn-primary subscribe-btn" data-plan="premium-monthly">Subscribe Now</button>
                        </div>
                    </div>
                    
                    <div class="membership-plan">
                        <div class="membership-header">
                            <h3 class="membership-title">NIKI Premium</h3>
                            <div class="membership-price">Rp 500.000</div>
                            <div class="membership-period">per year</div>
                        </div>
                        <div class="membership-features">
                            <ul>
                                <li>All monthly benefits</li>
                                <li>2 months free compared to monthly</li>
                                <li>Exclusive annual member gift</li>
                                <li>VIP concert experience entry</li>
                                <li>Personalized video message entry</li>
                            </ul>
                        </div>
                        <div class="membership-actions">
                            <button class="btn btn-primary subscribe-btn" data-plan="premium-yearly">Subscribe Now</button>
                        </div>
                    </div>
                </div>
                
                <!-- Membership Benefits -->
                <div class="membership-benefits">
                    <h3>Membership Benefits</h3>
                    <div class="benefits-grid">
                        <div class="benefit-card">
                            <div class="benefit-icon">
                                <i class="fas fa-music"></i>
                            </div>
                            <h4 class="benefit-title">Early Music Access</h4>
                            <p>Listen to new releases before anyone else</p>
                        </div>
                        <div class="benefit-card">
                            <div class="benefit-icon">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <h4 class="benefit-title">Merchandise Discounts</h4>
                            <p>Get exclusive discounts on all NIKI merchandise</p>
                        </div>
                        <div class="benefit-card">
                            <div class="benefit-icon">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                            <h4 class="benefit-title">Ticket Priority</h4>
                            <p>Early access to concert tickets before general sale</p>
                        </div>
                        <div class="benefit-card">
                            <div class="benefit-icon">
                                <i class="fas fa-gem"></i>
                            </div>
                            <h4 class="benefit-title">Exclusive Content</h4>
                            <p>Access to behind-the-scenes content and more</p>
                        </div>
                    </div>
                </div>
                
                <!-- Membership History -->
                <div class="membership-history" id="membership-history" style="display: none;">
                    <h3>Membership History</h3>
                    <table class="membership-history-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Plan</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="membership-history-body">
                            <!-- Membership history will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="account-tab-content" id="password-tab">
                <h3>Change Password</h3>
                <form id="password-form">
                    <div class="form-group">
                        <label for="current-password">Current Password</label>
                        <input type="password" id="current-password" required>
                    </div>
                    <div class="form-group">
                        <label for="new-password">New Password</label>
                        <input type="password" id="new-password" required>
                        <div class="password-strength" id="password-strength"></div>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm New Password</label>
                        <input type="password" id="confirm-password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </form>
            </div>
            
            <div class="account-tab-content" id="transactions-tab">
                <h3>Transaction History</h3>
                <table class="transaction-history">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="transaction-history-body">
                        <!-- Transaction history will be populated by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Subscription Modal -->
<div class="subscription-modal" id="subscription-modal">
    <div class="subscription-container">
        <div class="subscription-header">
            <h2 id="subscription-modal-title">Subscribe to NIKI Premium</h2>
            <button class="close-subscription" id="close-subscription"><i class="fas fa-times"></i></button>
        </div>
        <div class="subscription-content">
            <div class="subscription-summary">
                <h4>Order Summary</h4>
                <div class="summary-item">
                    <span id="summary-plan-name">NIKI Premium - Monthly</span>
                    <span id="summary-plan-price">Rp 50.000</span>
                </div>
                <div class="summary-total">
                    <span>Total</span>
                    <span id="summary-total-price">Rp 50.000</span>
                </div>
            </div>
            
            <h4>Payment Information</h4>
            <form id="subscription-form">
                <div class="form-group">
                    <label for="card-number">Card Number</label>
                    <input type="text" id="card-number" placeholder="1234 5678 9012 3456" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="expiry-date">Expiry Date</label>
                        <input type="text" id="expiry-date" placeholder="MM/YY" required>
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" placeholder="123" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="card-name">Name on Card</label>
                    <input type="text" id="card-name" required>
                </div>
                <div class="auto-renewal">
                    <input type="checkbox" id="auto-renew" checked>
                    <label for="auto-renew">Enable auto-renewal</label>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 20px;">Complete Subscription</button>
            </form>
        </div>
    </div>
</div>

<!-- Login Modal -->
<div class="modal-overlay" id="login-modal">
    <div class="modal">
        <div class="modal-header">
            <h2>Login</h2>
            <button class="close-modal" id="close-login"><i class="fas fa-times"></i></button>
        </div>
        <form id="login-form">
            <div class="form-group">
                <label for="login-email">Email</label>
                <input type="email" id="login-email" required>
                <div class="error-message" id="login-email-error"></div>
            </div>
            <div class="form-group">
                <label for="login-password">Password</label>
                <input type="password" id="login-password" required>
                <div class="error-message" id="login-password-error"></div>
            </div>
            <div class="form-options">
                <div class="remember-me">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <a href="#" class="forgot-password" id="show-forgot-password">Forgot password?</a>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
            <div class="error-message" id="login-general-error"></div>
            <div class="success-message" id="login-success-message"></div>
        </form>
        <div class="modal-footer">
            <p>Don't have an account? <a href="#" id="show-register">Register</a></p>
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal-overlay" id="register-modal">
    <div class="modal">
        <div class="modal-header">
            <h2>Register</h2>
            <button class="close-modal" id="close-register"><i class="fas fa-times"></i></button>
        </div>
        <form id="register-form">
            <div class="form-group">
                <label for="register-name">Full Name</label>
                <input type="text" id="register-name" required>
                <div class="error-message" id="register-name-error"></div>
            </div>
            <div class="form-group">
                <label for="register-email">Email</label>
                <input type="email" id="register-email" required>
                <div class="error-message" id="register-email-error"></div>
            </div>
            <div class="form-group">
                <label for="register-password">Password</label>
                <input type="password" id="register-password" required>
                <div class="password-strength" id="password-strength"></div>
                <div class="error-message" id="register-password-error"></div>
            </div>
            <div class="form-group">
                <label for="register-confirm">Confirm Password</label>
                <input type="password" id="register-confirm" required>
                <div class="error-message" id="register-confirm-error"></div>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Register</button>
            <div class="error-message" id="register-general-error"></div>
            <div class="success-message" id="register-success-message"></div>
        </form>
        <div class="modal-footer">
            <p>Already have an account? <a href="#" id="show-login">Login</a></p>
        </div>
    </div>
</div>

<!-- Forgot Password Modal -->
<div class="modal-overlay" id="forgot-password-modal">
    <div class="modal">
        <div class="modal-header">
            <h2>Forgot Password</h2>
            <button class="close-modal" id="close-forgot-password"><i class="fas fa-times"></i></button>
        </div>
        <form id="forgot-password-form">
            <div class="form-group">
                <label for="forgot-password-email">Email</label>
                <input type="email" id="forgot-password-email" required>
                <div class="error-message" id="forgot-password-email-error"></div>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Reset Password</button>
            <div class="error-message" id="forgot-password-general-error"></div>
            <div class="success-message" id="forgot-password-success-message"></div>
        </form>
        <div class="modal-footer">
            <p>Remember your password? <a href="#" id="show-login-from-forgot">Login</a></p>
        </div>
    </div>
</div>