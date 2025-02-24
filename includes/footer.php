<?php
// اتصال به دیتابیس
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "example";

$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
  $email = $_POST['email'];

  // اعتبارسنجی ایمیل
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // آماده‌سازی و اجرای دستور SQL برای درج ایمیل
    $stmt = $conn->prepare("INSERT INTO news (email) VALUES (?)");
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
      echo "<script>alert('ایمیل شما با موفقیت ثبت شد!');</script>";
    } else {
      echo "<script>alert('خطا در ثبت ایمیل.');</script>";
    }

    $stmt->close();
  } else {
    echo "<script>alert('ایمیل وارید شده معتبر نیست.');</script>";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>footer | example bootstrap template</title>
</head>
<body>
  <footer id="footer" class="footer dark-background" dir="rtl">

  <div class="container footer-top">
    <div class="row gy-4">
      <div class="col-lg-4 col-md-6 footer-about">
        <a href="index.html" class="logo d-flex align-items-center">
          <span class="sitename">PixelWEbStudio</span>
        </a>
        <div class="footer-contact pt-3">
          <p>202</p>
          <p>کابل، افغانستان</p>
          <p class="mt-3"><strong>تلفن:</strong> <span>150 349 791 93+</span></p>
          <p><strong>ایمیل:</strong> <span>bahadori@kabulnewcity.com</span></p>
        </div>
        <div class="social-links d-flex mt-4">
          <a href=""><i class="bi bi-facebook"></i></a>
          <a href=""><i class="bi bi-instagram"></i></a>
          <a href=""><i class="bi bi-youtube"></i></a>
        </div>
      </div>

      <div class="col-lg-2 col-md-3 footer-links">
        <h4>لینک‌های مفید</h4>
        <ul>
          <li><a href="#">خانه</a></li>
          <li><a href="#">درباره ما</a></li>
          <li><a href="#">خدمات</a></li>
          <li><a href="#">شرایط خدمات</a></li>
          <li><a href="#">سیاست حریم خصوصی</a></li>
        </ul>
      </div>

      <div class="col-lg-2 col-md-3 footer-links">
        <h4>خدمات ما</h4>
        <ul>
          <li><a href="#">طراحی وب</a></li>
          <li><a href="#">توسعه وب</a></li>
          <li><a href="#">مدیریت محصول</a></li>
          <li><a href="#">بازاریابی</a></li>
          <li><a href="#">طراحی گرافیک</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-12 footer-newsletter">
        <h4>خبرنامه ما</h4>
        <p>با عضویت در خبرنامه ما، جدیدترین اخبار و خدمات ما را دریافت کنید!</p>
        <form method="post" class="php-email-form">
          <div class="newsletter-form">
            <input type="email" name="email" placeholder="ایمیل خود را وارد کنید">
            <input type="submit" name="submit" value="اشتراک‌گذاری">
          </div>
        </form>
      </div>

    </div>
  </div>

  <div class="container copyright text-center mt-4">
    <p>© <span>کپی‌رایت</span> <strong class="px-1 sitename">PixelWebStudio</strong> <span>تمامی حقوق محفوظ است</span></p>
    <div class="credits">
      طراحی شده توسط <a href="https://bootstrapmade.com/">صبغت الله بهادری</a>
    </div>
  </div>

</footer>
</body>
</html>

