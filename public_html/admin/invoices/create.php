<?php
require_once __DIR__ . '/../core/invoice.php';
auth();

if($_POST){
    $id = createInvoice($_POST);
    header("Location: view.php?id=".$id);
    exit;
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>Create Invoice</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

<div class="container py-4">

<h2>🧾 إنشاء فاتورة</h2>

<form method="POST">

<input name="customer_name" class="form-control my-2" placeholder="اسم العميل">

<input name="customer_email" class="form-control my-2" placeholder="الإيميل">

<input name="customer_phone" class="form-control my-2" placeholder="رقم الواتساب">

<input name="amount" class="form-control my-2" placeholder="المبلغ">

<textarea name="items" class="form-control my-2" placeholder="تفاصيل الخدمات"></textarea>

<button class="btn btn-warning w-100">إنشاء وإرسال</button>

</form>

</div>

</body>
</html>
