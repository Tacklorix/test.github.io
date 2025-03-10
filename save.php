<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // دریافت داده‌ها از فرم
    $name = $_POST['name'];
    $email = $_POST['email'];

    // ذخیره داده‌ها در فایل
    $folder = "user_data";
    $filename = $folder . "/data.txt";

    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    file_put_contents($filename, "نام: $name, ایمیل: $email\n", FILE_APPEND);
    echo "اطلاعات شما با موفقیت ذخیره شد!";
} else {
    echo "خطا: هیچ داده‌ای ارسال نشده است.";
}
?>
