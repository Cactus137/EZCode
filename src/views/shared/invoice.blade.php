@extends('layouts.shared')
@section('content')
    @php
        $dataInvoice = $dataInvoice[0];
    @endphp
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Invoice
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                            <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                            </svg>
                            Print
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card card-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <p class="h5">Invoice from EZCode</p>
                                <hr class="w-50">
                                <address>
                                    Contact Person: <br>
                                    Phone: (+84) 382606012<br>
                                    Email: Blackwhilee04@gmail.com<br>
                                </address>
                            </div>
                            <div class="col-4">
                            </div>
                            <div class="col-4 text-end">
                                <br><br>
                                <div class="row">
                                    <div class="col-4 text-start">Invoice No</div>
                                    <div class="col d-flex justify-content-between">:
                                        <div class="col">{{ $dataInvoice['code_invoice'] }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 text-start">Invoice Date</div>
                                    <div class="col d-flex justify-content-between">:
                                        <div class="col">{{ $dataInvoice['issue_date'] }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 text-start">Email Client</div>
                                    <div class="col d-flex justify-content-between">:
                                        <div class="col">{{ $dataInvoice['email'] }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-transparent table-responsive">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 1%"></th>
                                    <th>COURSES</th>
                                    <th class="text-center" style="width: 1%">QUANTITY</th>
                                    <th class="text-end" style="width: 1%">UNIT PRICE</th>
                                    <th class="text-end" style="width: 1%">INTO MONEY</th>
                                </tr>
                            </thead>
                            <tr>
                                <td class="text-center">1</td>
                                <td>
                                    <p class="strong mb-1">{{ $dataInvoice['name_course'] }}</p>
                                </td>
                                <td class="text-center">
                                    1
                                </td>
                                <td class="text-end">${{ number_format($dataInvoice['total_price']) }}</td>
                                <td class="text-end">${{ number_format($dataInvoice['total_price']) }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="strong text-end">Total</td>
                                <td class="text-end">${{ number_format($dataInvoice['total_price']) }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="strong text-end">Payments</td>
                                <td class="text-end">Online</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="strong text-end">Trading code</td>
                                <td class="text-end">{{ $dataInvoice['code_invoice'] }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="strong text-end">VAT</td>
                                <td class="text-end">$0</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="font-weight-bold text-uppercase text-end">TOTAL PAYMENT</td>
                                <td class="font-weight-bold text-end">${{ number_format($dataInvoice['total_price']) }}
                                </td>
                            </tr>
                        </table>
                        <div class="card-foot row" style="height: 200px;">
                            <div class="col-12">
                                <span class="fw-bold m-5">Confirm</span>
                            </div>
                        </div>
                        <p class="text-secondary text-center mt-5">Congratulations on completing your payment for our
                            Course. Wishing you good studying!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
