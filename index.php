<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kamus Enggano</title>

  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
  <div class="min-vh-100" style="overflow-x: hidden; background-color: lightgrey;">
    <div class="min-vh-100" style="overflow-x: hidden; background-color: lightgrey;">

    <div class="row text-center my-5 border border-2 border-dark" style="overflow-x: hidden; overflow-y: auto; height: 60vh; width: 100%; scrollbar-width: thin; scrollbar-color: #6c757d #e9ecef; margin: auto;">
      <div class="row py-2">
        <img src="i1.jpeg" alt="" class="col-4">
        <div class="col-8 text-start align-self-center">
          <h2>Pelinggih Padmasana</h2>
          <p>Padmasana merupakan tempat berstananya Ida Sang Hyang Widhi Wasa (Tuhan) yang merupakan pusat dari ketuhanan</p>
        </div>
      </div>
      <div class="border border-dark"></div>
      <div class="row py-2">
        <img src="i2.jpeg" alt="" class="col-4">
        <div class="col-8 text-start align-self-center">
          <h2>Pelinggih Pengaruman/ Arip - Arip Ratu Puseh</h2>
          <p>Pengaruman adalah tempat berstananya semua dewa-dewa (Ista Dewata)</p>
        </div>
      </div>
      <div class="border border-dark"></div>
      <div class="row py-2">
        <img src="i3.jpeg" alt="" class="col-4">
        <div class="col-8 text-start align-self-center">
          <h2>Pelinggih GedongRum / Kehen</h2>
          <p>Pelinggih Gedong Kehen difungsikan untuk memuja Ratu Sakti yang disimbolkan dengan arca-arca yang tersimpan dalam pelinggih tersebut</p>
        </div>
      </div>
    </div>

    <div class="row d-flex justify-content-center mb-5">
      <h2 class="text-center">SCAN BARCODE</h2>
      <button type="button" class="text-white btn btn-primary w-auto px-5 rounded-pill text-dark mt-2" onclick="window.location.href = 'scan_qr.php';">
        Scan
      </button>
    </div>

    <footer>
      <div class="footer text-muted justify-content-between d-flex px-5">
        <p>2023 &copy; Sistem Digitalisasi Pelinggih</p>
        <p>
          Crafted with
          <span class="text-danger"><i class="bi bi-heart"></i></span> by
          <a href="#">Team</a>
        </p>
      </div>
    </footer>
  </div>
</body>

</html> -->

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
  <!-- <script src="html5-qrcode.min.js"></script> -->

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
      <!-- <div id=" reader"></div>
        <script>
            function onScanSuccess(decodedText, decodedResult) {
                // Handle on success condition with the decoded text or result.
                console.log(`Scan result: ${decodedText}`, decodedResult);
            }

            var html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", {
                    fps: 10,
                    qrbox: 250
                });
            html5QrcodeScanner.render(onScanSuccess);
        </script> -->

      <!-- input -->
      <!-- <input type="file" accept="image/*" capture="camera" /> -->

      <!-- webcam -->
      <!-- <video id="vid" style="margin: auto;
                width: 100%;
                height: 90%;
                object-fit: cover;
                border-radius: 0.5rem;
            ">
            </video>
            <br />
            <div class="row px-4">
                <button id="but" style="background-color: #007bff; color: white; border: none; cursor: pointer; border-radius: 0.5rem; height: 2.5rem;" class="col-5">
                    Open WebCam
                </button>
                <div class="col-2"></div>
                <button id="stop" style="background-color: #007bff; color: white; border: none; cursor: pointer; border-radius: 0.5rem; height: 2.5rem;" class="col-5">
                    Stop WebCam
                </button>
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    let but = document.getElementById("but");
                    let stop = document.getElementById("stop");
                    let video = document.getElementById("vid");
                    let mediaDevices = navigator.mediaDevices;
                    vid.muted = true;
                    if (!mediaDevices || !mediaDevices.enumerateDevices) {
                        console.log("enumerateDevices() not supported.");
                        return;
                    }
                    but.addEventListener("click", () => {
                        // Accessing the user camera and video.
                        mediaDevices
                            .getUserMedia({
                                video: {
                                    facingMode: "environment"
                                }
                            })
                            .then((stream) => {
                                // Changing the source of video to current stream.
                                video.srcObject = stream;
                                video.addEventListener("loadedmetadata", () => {
                                    video.play();
                                });
                            })
                            .catch(alert);
                        // Stop the video track and remove the src from the video element.
                    });
                    stop.addEventListener("click", () => {
                        let stream = video.srcObject;
                        let tracks = stream.getTracks();
                        for (let i = 0; i < tracks.length; i++) {
                            let track = tracks[i];
                            track.stop();
                        }
                        video.srcObject = null;
                    });
                });
            </script> -->

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