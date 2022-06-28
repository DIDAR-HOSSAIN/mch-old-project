

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/admin_style.css')}}">
    <style>
        .content-wrapper{
            background: #FFF;
        }
        .invoice-header {
            background: #f7f7f7;
            padding: 10px 20px 10px 20px;
            border-bottom: 1px solid gray;
        }
        .invoice-right-top h3 {
            padding-right: 20px;
            margin-top: 20px;
            color: #ec5d01;
            font-size: 55px!important;
            font-family: serif;
        }
        .invoice-left-top {
            border-left: 4px solid #ec5d00;
            padding-left: 20px;
            padding-top: 20px;
        }
        thead {
            background: #ec5d01;
            color: #FFF;
        }

        .authority h5 {
            margin-top: -10px;
            color: #ec5d01;
            /*text-align: center;*/
        }
        .thanks h4 {
            color: #ec5d01;
            font-size: 25px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }
        .site-address p {
            line-height: 6px;
            font-weight: 300;
        }
    </style>
    <title>Money Receipt</title>

</head>
<body>

    <a class="navbar-brand" href="{{route('dashboard.index')}}"><img src="{{asset('backend-lib/dashboard/images/mch_header.png')}}" alt="Logo" width="700" height="150px"></a>
    <center>
        <h1 class="text center">Money Receipt</h1>
    </center>

    <div class="content-wrapper">

        <div class="invoice-description">
            <div class="invoice-left-top float-left">
                <h3>Barcode</h3>
                <h3>{{ $invoices->name }}</h3>
                <div class="address">
                    <p>
                        <strong>Address: </strong>
                        {{ $invoices->address }}
                    </p>
                    <h10>Sex: @if($invoices->sex == '1')
                            {{'Male'}}
                        @else
                            {{'Female'}}
                        @endif</h10>
                    <br>
                    <h10>Date Of Birth: {{\Carbon\Carbon::parse($invoices->dob)->format('j F Y')}}</h10>
                    <p>Contact No: {{ $invoices->contact_no }}</p>
                    {{--           <p>Email: <a href="mailto:{{ $order->email }}">{{ $order->email }}</a></p>--}}
                </div>
            </div>

            <div class="invoice-right-top float-right">
                <h3>Invoice #{{ $invoices->id }}</h3>
                <p>
{{--                    {{ Carbon\Carbon::createFromTimestamp($invoices->reg_date)->format('d-m-Y') }}--}}
                    {{\Carbon\Carbon::parse($invoices->reg_date)->format('j F Y')}}

                </p>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

            <div class="">
                <table class="table table-bordered table-stripe">
                    <thead>
                    <tr>
                        <th>S/L.</th>
                        <th>Test Code</th>
                        <th>Test Name</th>
                        <th>Price</th>
                    </tr>
                    </thead>

                    <tbody>
                            @php $i=1;
                            @endphp
                @foreach($alldatas as $alldata)
                    <tr>
                        <td> {{$i++}} </td>
                        <td> 001</td>
                        <td> Dope Test </td>
                        <td> {{$alldata->reg_fee}}.00 </td>

                    </tr>
                @endforeach




                    <tr>
                        <td colspan="2"></td>
                        <td>
                            Total Tk:
                        </td>
                        <td colspan="1">
                            <strong>  {{ $invoices->reg_fee }} .00</strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td>
                            Discount Tk:
                        </td>
                        <td colspan="1">
                            <strong>  {{ $invoices->discount }} .00</strong>
{{--                        </td>--}}
                    </tr>

                    <tr>
                        <td colspan="2"></td>
                        <td>
                            Net Payable Tk:
                        </td>
                        <td colspan="1">
{{--                            <strong>  {{ $invoices->netpayable }} .00</strong>--}}
                            <strong>  {{$invoices->reg_fee - $invoices->discount }} .00</strong>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2"></td>
                        <td>
                            Paid Tk:
                        </td>
                        <td colspan="1">
                            <strong>  {{ $invoices->paid }} .00</strong>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2"></td>
                        <td>
                            Due Tk:
                        </td>
                        <td colspan="1">
                            <strong>  {{$invoices->total - $invoices->paid}} .00</strong>
                        </td>
                    </tr>
                    </tbody>
                </table>

            <div class="thanks mt-3">
                <h4>Thank you !!</h4>
            </div>

            <div class="authority float-right mt-5">
                <p>-----------------------------------</p>
                <h5>Authority Signature:</h5>
            </div>
            <div class="clearfix"></div>

        </div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
