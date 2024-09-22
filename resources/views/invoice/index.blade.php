@extends('layouts.admin')
@section('content')
<ol class="breadcrumb page-breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('admins/dashboard')}}">@lang('lang.dashboard')</a></li>
    <li class="breadcrumb-item"><a href="{{url('admins/new-invoice')}}">@lang('lang.new_invoice')</a></li>
</ol>
<div class="row">
    <div class="col-xl-8" style="margin: auto">
        <div id="panel-1" class="panel">
            <div class="panel-container show ">
                <div class="panel-content ">
                    <div class="" id="print-area">
                        <div class="invoice-head">
                            <div class="invoice-head-top">
                                <div class="invoice-head-top-left  text-start ">
                                    <img src="{{ asset('/images/fetch_photo/logo.png') }}">
                                </div>
                                <div class="invoice-head-top-right">
                                    <h3>ព្រះរាជាណាចក្រកម្ពុជា <p>ជាតិ សាសនា ព្រះមហាក្សត្រ</p>
                                    </h3>
                                </div>
                            </div>
                            <div class="invoice-head-bottom">
                                <div class="invoice-head-bottom-left">
                                    <ul>
                                        <li class='text-bold'>អាសយដ្ឋានទទួលវិក្កយបត្រ:</li>
                                        <li>ផ្សារឃ្លំាងលើៈ......................................................</li>
                                        <li>ប្រចំាខែៈ...........................................................</li>
                                        <li>អ្នកទទួលវិក្កយបត្រៈ..........................................</li>
                                        <li>តួនាទីៈ.............................................................</li>
                                        <li>កាលបរិច្ឆេទៈ....................................................</li>
                                    </ul>
                                </div>

                                <div class="invoice-head-bottom-right">
                                    <ul class="text-end-c">
                                        <li>លេខវិក្កយបត្រៈ......................................................</li>
                                        <li>កាលបរិច្ឆេទៈ......................................................</li>
                                        <li>លេខអតិថិជនៈ......................................................</li>
                                        <li>Customer VAT TIN:......................................................</li>
                                        <li>ទឹកប្រាក់ៈ......................................................</li>
                                        <li>អ្នកទទួលប្រាក់ៈ......................................................</li>
                                        <li>កាលបរិច្ឆេទៈ......................................................</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="hr"></div>
                        <div class="" id="print-area">
                            <div class="invoice-head">
                                <div class="invoice-head-top">
                                    <div class="invoice-head-top-left  text-start ">
                                        <img src="{{ asset('/images/fetch_photo/logo.png') }}">
                                    </div>
                                    <div class="invoice-head-top-right ">
                                        <h3>ព្រះរាជាណាចក្រកម្ពុជា <p>ជាតិ សាសនា ព្រះមហាក្សត្រ</p></h3>
                                    </div>
                                </div>
                                <div class="invoice-head-top-right text-start ">
                                    <img src="{{ asset('/images/fetch_photo/QR.jpg') }}">
                                </div>
                                <div class=" text-center ">
                                    <span class='text-bold'>វិក្កយបត្រថ្លៃសេវាដឹកជញ្ជូនសំរាម <p>Solid Wastie Collection
                                            Service Invoice</span>
                                </div>
                            </div>
                            <div class="invoice-head-bottom">
                                <div class="invoice-head-bottom-left">
                                    <ul>
                                        <li class='text-bold'>អាសយដ្ឋានទទួលវិក្កយបត្រ / Address </li>
                                    </ul>
                                </div>
                                <div class="invoice-head-bottom-right">
                                    <ul class="text-end-c">
                                        <li>លេខវិក្កយបត្រៈ......................................................</li>
                                        <li>កាលបរិច្ឆេទៈ......................................................</li>
                                        <li>លេខអតិថិជនៈ......................................................</li>
                                        <li>Customer VAT TIN:......................................................</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="invoice-head-bottom-right ">
                                <h5 class='text-bold'>ចំណំាៈ</p>
                                    -គ្រប់វិក្កយបត្រទំាងអស់គ្មានការកោសលុប ឫសរសេរដោយដៃ</p>
                                    -ការបង់ថ្លៃសេវាត្រូវតែមានវិក្កយបត្រ</p>
                                    -សូមពិនិត្យព័ត៌មានលើវិក្កយបត្រឱ្យបានច្បាស់មុនពេលបង់ប្រាក់</h5>
                            </div>
                            <div class="overflow-view">
                                <div class="invoice-body">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td class="text-bold">ល.រ / No</td>
                                                <td class="text-bold">បរិយាយ / Description</td>
                                                <td class="text-bold">ប្រចំាខែ / Month</td>
                                                <td class="text-bold">ទឹកប្រាក់ / Amount</td>
                                            </tr>
                                        </thead>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>សេវាប្រមូល និងដឹកជញ្ជូនសំរាម<p>Solid Waste Collection Service
                                                        </p>
                                                    </td>
                                                    <td>ខែមិនា ឆ្នំា2024</td>
                                                    <td>March - 2024</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="invoice-body-info-item border-bottom">
                                            <div class="invoice-body-info-item  text-bold">
                                                បំណុលគិតត្រឹមកាលបរិច្ឆេទចេញវិក្កយបត្រ / Balance brought forward as of
                                                invoice date</div>
                                            <div class=" text-bold text-end-c ">USD 0.00</div>
                                        </div>
                                        <div class="invoice-body-info-item border-bottom">
                                            <div class="invoice-body-info-item  text-bold">ទឹកប្រាក់ត្រូវទូទាត់ / Total
                                                Amount Due (អត្រាប្តូរប្រាក់ / Exchange Rate 1$ = 4000៛)</div>
                                            <div class=" text-bold text-end-c">USD 92.00</div>
                                        </div>
                                        <div class="invoice-head-bottom">
                                            <div class="invoice-head-bottom-left">
                                                <ul>
                                                    <li>អ្នកទទួលប្រាក់/Received By:.................................
                                                    </li>
                                                    <li>កាលបរិច្ឆេទ/Date:.........................................</li>
                                                </ul>
                                            </div>
                                            <div class="invoice-head-bottom-right">
                                                <ul class="text-end-c">
                                                    <li>ទឹកប្រាក់បានបង់/Paid Amount:.................................
                                                    </li>
                                                    <li>កាលបរិច្ឆេទ/Date:......................................</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="invoice-foot">
                                            <div class="invoice-body-info-item ">អាសយដ្ឋាន/Address: វិថីមិត្តភាព (៨០០)
                                                សង្កាត់៤ ក្រុងព្រះសីហនុ ទំនាកទំនង/Contact: 070 686 834 / 099 686 834
                                            </div>
                                            <div class="invoice-btns">
                                                <button type="button" class="invoice-btn" onclick="printInvoice()">
                                                    <span>
                                                        <i class="fa-solid fa-print"></i>
                                                    </span>
                                                    <span>Print</span>
                                                </button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <script>
                    function printInvoice(){
        window.print();
    }
                        </script>
                        @endsection
