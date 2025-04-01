<?php
header('Content-Type: application/json');

// مسیر فایل ذخیره لینک‌ها
$filePath = 'photos.txt';

// دریافت داده‌های ارسالی
$data = json_decode(file_get_contents('php://input'), true);

if (empty($data['links'])) {
    echo json_encode(['success' => false, 'message' => 'داده‌ای دریافت نشد']);
    exit;
}

try {
    // تبدیل آرایه لینک‌ها به رشته
    $linksText = "لینک عکس‌ها - " . date('Y-m-d H:i:s') . "\n";
    $linksText .= implode("\n\n", $data['links']);
    $linksText .= "\n\n----------------\n";
    
    // ذخیره در فایل
    if (file_put_contents($filePath, $linksText, FILE_APPEND | LOCK_EX)) {
        echo json_encode(['success' => true, 'message' => 'لینک‌ها ذخیره شدند']);
    } else {
        throw new Exception('خطا در نوشتن فایل');
    }
    
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>