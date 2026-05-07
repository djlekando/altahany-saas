<?php
require_once __DIR__ . '/../core/engine.php';
require_once __DIR__ . '/../core/whatsapp.php';

auth();

/* حفظ الحجز */
$stmt = db()->prepare("INSERT INTO bookings
(event_type, city, budget, services, date, notes)
VALUES (?,?,?,?,?,?)");

$stmt->execute([
    $_POST['event_type'],
    $_POST['city'],
    $_POST['budget'],
    json_encode($_POST['services'] ?? []),
    $_POST['date'],
    $_POST['notes']
]);

/* WhatsApp Message */
$message =
"📌 New Booking - ALTATAHANY\n"
."Event: ".$_POST['event_type']."\n"
."City: ".$_POST['city']."\n"
."Budget: ".$_POST['budget']."\n"
."Date: ".$_POST['date'];

sendWhatsApp("971500000000", $message);

/* Redirect */
header("Location: ../dashboard.php");
exit;

<?php
require_once __DIR__ . '/../core/ai_booking.php';
require_once __DIR__ . '/../core/whatsapp.php';

$ai = suggestPackage($_POST['budget']);

$message =
"🤖 AI Booking Suggestion\n"
."Package: ".$ai['package']."\n"
."Services: ".implode(", ", $ai['services'])."\n"
."City: ".$_POST['city']."\n"
."Budget: ".$_POST['budget'];

sendWhatsApp("971500000000", $message);
?>
