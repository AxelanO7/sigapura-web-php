<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>QR Code</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>

</head>

<body>
    <div class="min-vh-100" style="overflow-x: hidden; background-color: lightgrey;">
        <? include 'navbar.php'; ?>

        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-3 d-flex justify-content-end align-items-center">
                <i class="bi bi-arrow-left-circle" style="font-size: 2rem; cursor: pointer;" onclick="
                window.location.href = 'index.php';
                "></i>
            </div>
            <h3 class="text-center text-uppercase my-5 col" style="margin: auto;">Scan QR Code</h3>
            <div class="col-3"></div>
        </div>

        <div class="text-center border border-2 border-dark mb-5" style="height: 60vh;">

            <!-- html5-qrcode -->
            <div id="qr-reader" style="height: 100%;" class="py-5"></div>
            <script>
                function onScanSuccess(decodedText, decodedResult) {
                    console.log(`Code scanned = ${decodedText}`, decodedResult);
                    setTimeout(() => {
                        window.location.href = decodedText;
                    }, 1000);
                }
                var html5QrcodeScanner = new Html5QrcodeScanner(
                    "qr-reader", {
                        fps: 10,
                        qrbox: 250
                    });
                html5QrcodeScanner.render(onScanSuccess);
            </script>
        </div>

        <? include 'footer.php'; ?>
    </div>
</body>

</html>