@extends('layouts.admin')

@section('content')
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .header, .footer {
            text-align: center;
        }
        .right-align {
            text-align: right;
        }
    </style>
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admins/dashboard')}}">@lang('lang.dashboard')</a></li>
        <li class="breadcrumb-item"><a href="{{url('admins/customer/chang/request')}}">@lang('lang.request_change_customer')</a></li>
    </ol>
    <div class="row">
        <div class="col-xl-12">
            <a href="{{url('admins/customer/chang/request')}}" class="btn btn-outline-secondary btn-pills waves-effect mb-2 waves-themed right-align">@lang('lang.cancel')</a>

            <div id="panel-1" class="panel">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="customer_infor" role="tabpanel">
                        <div class="table-responsive">
                            <body>
                                <div class="header">
                                    <h1>Change Request</h1>
                                </div>
                                <table>
                                    <tr>
                                        <td colspan="4">Customer Name : {{$data->customer_name}}</td>
                                        <td colspan="3" class="right-align">Customer No# : {{$data->customer_no}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Business Name : {{$data->business_name}}</td>
                                        <td colspan="3" class="right-align">Branch : {{$data->name_en}}</td>
                                    </tr>
                                    @php
                                        $villages = Helper::getLang() == 'en' ? 'Villages ' : 'ភូមិ';
                                        $fullCommuneName = Helper::getLang() == 'en' ? 'Commune ' : 'ឃុំ';
                                        $fullDistricName = Helper::getLang() == 'en' ? 'District ' : 'ស្រុក';
                                        $street = Helper::getLang() == 'en' ? 'Street ' : 'ផ្លូវ';
                                        $villageName = Helper::getLang() == 'en' ? $data->village_name_english : $data->village_name_khmer;
                                        $communeName = Helper::getLang() == 'en' ? $data->district_name_english : $data->commune_name_khmer;
                                        $districtName = Helper::getLang() == 'en' ? $data->district_name_english : $data->district_name_khmer;
                                        $provincetName = Helper::getLang() == 'en' ? $data->province_name_english : $data->province_name_khmer;
                                        $fullAddressEN = $villages.' '.$villageName.', '.$fullCommuneName.' '.$communeName.', '.$fullDistricName.' '.$districtName.', '.$provincetName
                                    @endphp
                                    <tr>
                                        <td colspan="4">Address: {{$fullAddressEN}}</td>
                                        <td colspan="3" class="right-align">PR No#: 2407-0004</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">Phone: 061 807 808 / 087 660 055</td>
                                        <td colspan="3" class="right-align">Approve By: Requester</td>
                                    </tr>
                                </table>
                                <table>
                                    <tr>
                                        <th>№</th>
                                        <th>Business Type</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Multiply</th>
                                        <th>Monthly Fee</th>
                                        <th>Land Filed Fee</th>
                                        <th>Total Fee</th>
                                        <th>Total Amount</th>
                                    </tr>
                                    @if (count($dataBusinessType)>0)
                                        @foreach ($dataBusinessType as $key=>$item)
                                            <tr>
                                                <td>{{$key++}}</td>
                                                <td>{{$item->business_type}}</td>
                                                <td>{{$item->categorie}}</td>
                                                <td>{{$item->sub_categorie}}</td>
                                                <td>{{$item->multiply}}</td>
                                                <td>{{$item->monthly_fee}}</td>
                                                <td>{{$item->land_filed_fee}}</td>
                                                <td>{{$item->monthly_fee + $item->land_filed_fee}}</td>
                                                <td>{{$item->grand_total}}</td>
                                            </tr>
                                            @php
                                                $subTotal = 0;
                                                $subTotal += $item->grand_total;
                                            @endphp
                                        @endforeach
                                    @endif

                                    <tr>
                                        <td colspan="8" class="right-align">Sub-Total</td>
                                        <td colspan="2">{{$subTotal}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" class="right-align">VAT {{$data->vat}}%</td>
                                        <td colspan="2">$ 5.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="8" class="right-align">Grand Total</td>
                                        <td colspan="2">$ 108.00</td>
                                    </tr>
                                </table>
                                <br>
                                <div class="footer">
                                    <table>
                                        <tr>
                                            <td>Requested by</td>
                                            <td>Request Date</td>
                                            <td>Checked by</td>
                                        </tr>
                                    </table>
                                </div>
                            </body>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
