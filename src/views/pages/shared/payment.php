<style> 
    h4,
    h2 {
        color: #DAE4F0;
    }

    .simple-spinner {
        width: 25px;
        height: 25px;
    }

    .simple-spinner span {
        margin-top: 2px;
        display: block;
        width: 25px;
        height: 25px;
        border: 3px solid transparent;
        border-radius: 50%;
        border-right-color: rgba(255, 255, 255, 0.7);
        animation: spinner-anim 1s linear infinite;
    }

    @keyframes spinner-anim {
        from {
            transform: rotate(0);
        }

        to {
            transform: rotate(360deg);
        }
    }

    .line {
        border-bottom: 1px solix white;
    }
</style>

<body style="background-color: #272A31; color: #DAE4F0;">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3 ps-5">
                <div class="col-left ">
                    <div class="row border-bottom mb-3">
                        <div class="loading d-flex">
                            <h4 class="me-2">Awaiting payment</h4>
                            <div class="simple-spinner">
                                <span></span>
                            </div>
                        </div>
                        <div class="row countdown-time my-2 text-center">
                            <h3 id="countdown">05:00</span>
                        </div>
                    </div>
                    <div class="row border-bottom mb-3">
                        <p>Course name: <span class="text-primary">PHP</span></p>
                        <p>Code orders: <span class="text-primary">JHFD56FDK</span></p>
                    </div>
                    <div class="row border-bottom mb-3">
                        <h4 class="mb-4">Payment details:</h4>
                        <div class="row mb-3 mx-0 px-0 ">
                            <p>Price: <span class="text-primary">$35</span></p>
                            <p class="fs-5">Total amount: <span class="text-primary fs-4">$35</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-end p-0 mx-4" style="width: 1px;">

            </div>
            <div class="col-md-7">
                <div class="row mb-5">
                    <h2>Transfer money by QR</h2>
                    <div class="row mt-2">
                        <div class="col-3 me-2">
                            <img class="rounded" src="<?= asset('img/shared/qr.png')?>" width="150px">
                        </div>
                        <div class="col">
                            <p>Step 1: Open the banking app and scan the QR code.</p>
                            <p>Make sure the transfer content is <span class="text-primary">F8C1BK2N</span>.</p>
                            <p>Step 3: Make payment.</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <h2>Manual transfer</h2>
                    <div class="row">
                        <div class="col">
                            <p>Account number: <span class="text-primary">246785457445</span></p>
                            <p>Content: <span class="text-primary">F8C1BK2N</span></p>
                        </div>
                        <div class="col">
                            <p>Account name: <span class="text-primary">Le Van Thanh</span></p>
                            <p>Branch: <span class="text-primary">Vietcombank Hanoi</span></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h2>Note</h2>
                    <div class="row">
                        <div class="col">
                            <p>Maximum 5 minutes after the transfer time, if the system does not respond, please contact F8 support immediately.</p>
                            <p><i class="fa-solid fa-phone pe-1"></i>Phone number: 0246.329.1102</p>
                            <p><i class="fa-solid fa-envelope pe-1"></i>Email: blackwhilee04@gmail.com</p>
                            <p><i class="fa-solid fa-location-dot pe-1"></i>Address: Ngo 14 Me Tri Ha, Tu Liem, Ha Noi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function startTimer(duration, display) {
            var timer = duration,
                minutes, seconds;
            setInterval(function() {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    // Go back to the previous page
                    window.history.back();
                }
            }, 1000);
        }

        window.onload = function() {
            var fiveMinutes = (60 * 5) - 1,
                display = document.querySelector('#countdown');
            startTimer(fiveMinutes, display);
        };
    </script>