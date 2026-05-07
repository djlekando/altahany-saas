<?php

function buildWhatsAppMessage($data){

$msg = "🎉 New Wedding Booking\n\n";
$msg .= "Stage: ".$data['stage']."\n";
$msg .= "Decoration: ".$data['decoration']."\n";
$msg .= "DJ: ".$data['dj']."\n\n";
$msg .= "📞 Please confirm booking";

return urlencode($msg);
}
?>
