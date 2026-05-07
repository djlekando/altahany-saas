session_start();
require_once __DIR__ . '/../core/app.php';

auth();

$id = $_GET['id'] ?? 0;

$stmt = db()->prepare("DELETE FROM bookings WHERE id=?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
