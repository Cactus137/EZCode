@extends('layouts.shared')
@section('content')
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 0;
            background: url('{{ asset('img/shared/bg-checkout.png') }}') no-repeat center center fixed;
            background-size: cover;
            background-color: rgba(255, 255, 255, 0.4);
        }

        .container-xxl {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
        }
    </style>
    @php
        $orderCode = $data['orderCode'];
        $course = $data['course'][0];
    @endphp
    <div class="container-xxl p-5 mt-5 position-relative">
        <div class="log position-absolute">
            <a href="/"><img class="pt-4 ps-4" src="{{ asset('img/shared/logo-2.png') }}" width="30%"></a>
        </div>
        <div class="contain d-flex justify-content-center">
            <div class="col-6 background-payment">
                <img src="{{ asset('img/shared/checkout.jpg') }}" alt="">
            </div>
            <div class="col background-payment m-5 d-flex align-items-center">
                <div class="mb-5">
                    <div class="mb-3">
                        <div class="loading d-flex">
                            <h4 class="me-2">Order Summary</h4>
                        </div>
                    </div>
                    <div class="border-bottom mb-3">
                        <div class="row mb-3">
                            <div class="col-5 text-start">Course name: </div>
                            <div class="col text-end">{{ $course['name'] }}</div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-5 text-start">Code orders: </div>
                            <div class="col text-end">{{ $orderCode }}</div>
                        </div>
                    </div>
                    <div class="">
                        <div class="row py-1">
                            <div class="col-5 text-start">Price: </div>
                            <div class="col text-end fw-bold">${{ $course['price'] }}</div>
                        </div>
                        <div class="row py-1">
                            <div class="col-5 text-start">VAT: </div>
                            <div class="col text-end fw-bold">$0</div>
                        </div>
                        <div class="row py-1">
                            <div class="col-5 text-start fs-5">Total amount: </div>
                            <div class="col text-end fw-bold fs-5">${{ $course['price'] }}</div>
                        </div>
                    </div>
                    <div id="paypal-button-container" class=" mt-3"></div>
                </div>
            </div>
        </div>
        <form action="/checkout/handle/{{ $orderCode }}" method="post" id="inf-invoice">
            <input type="hidden" name="id_account" value="{{ $_SESSION['user']['id'] }}">
            <input type="hidden" name="email" value="{{ $_SESSION['user']['email'] }}">
            <input type="hidden" name="id_course" value="{{ $course['id'] }}">
            <input type="hidden" name="total_price" value="{{ $course['price'] }}">
        </form>
    </div>
    <script
        src="https://www.paypal.com/sdk/js?client-id=ASOFGw9z0HiVokWcHkFMTE5iJNqeyzcznSntNEBRvzoBJMfTp7k0OFXOM7blBN0L4MK31Gn_wGQfEFsm&currency=USD">
    </script>
    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({
            style: {
                tagline: 'false',
                layout: 'horizontal'
            },
            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{ $course['price'] }}'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Get data from the form and send it to the server
                    var form = document.getElementById('inf-invoice');
                    if (details.status === 'COMPLETED') {
                        form.submit();
                    }
                });
            }
        }).render('#paypal-button-container');
    </script>
@endsection
