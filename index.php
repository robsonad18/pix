<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';

use App\Pix\Payload;
use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\Output;

// Instancia principal do payload pix
$obPayload = (new Payload)
    ->setPixKey(PIX_KEY)
    ->setDescription(DESCRIPTION)
    ->setMerchantName(NAME)
    ->setMerchantCity(CITY)
    ->setAmount(AMOUNT)
    ->setTxId(TXID);

// Codigo de pagamento pix
$payloadQrCode = $obPayload->getPayload();
// QR Code
$obQrCode      = new QrCode($payloadQrCode);
// Imagem do Qrcode
$image         = (new Output\Png)->output($obQrCode, 400);

header('Content-Type: image/png');
print $image;
