<?php
// بررسی می‌کنیم که آیا داده‌ای ارسال شده است یا خیر
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // دریافت داده‌ها از فرم
    $name = $_POST['name'];
    $email = $_POST['email'];

    // نام فایل و پوشه‌ای که می‌خواهیم داده‌ها را ذخیره کنیم
    $folder = "user_data";
    $filename = $folder . "/data.txt";

    // اگر پوشه وجود ندارد، آن را ایجاد می‌کنیم
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }

    // ذخیره داده‌ها در فایل
    $data = "نام: $name, ایمیل: $email\n";
    file_put_contents($filename, $data, FILE_APPEND);

    // پیام موفقیت
    echo "اطلاعات شما با موفقیت ذخیره شد!";
} else {
    echo "خطا: هیچ داده‌ای ارسال نشده است.";
}
?>
