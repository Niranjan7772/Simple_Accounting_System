<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Invoice</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>
 <div class="vlass" style="display: none;">
    <table class="order-details" >
        <thead>
            <tr>
                    <th>
                    <h1>Invoice</h1>
                    </th>
                {{-- </th> --}}
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">Customer Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Invoice Id:</td>
                <td>{{ $invoice->id }}</td>

                <td>Full Name:</td>
                <td>{{ $customer->name }}</td>
            </tr>
            <tr>
                <td>Issue Date</td>
                <td>{{ $invoice->date }}</td>

                <td>Email Id:</td>
                <td>{{ $customer->email }}</td>
            </tr>
            <tr>
                <td>Due Date</td>
                <td>{{ $invoice->due_date }}</td>

                <td>Phone:</td>
                <td>{{ $customer->mobile }}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>  @if($invoice->status == 0)
                    Paid
                @else
                    Outstanding
                @endif</td>

                <td>Address:</td>
                <td>{{ $customer->address }}</td>
            </tr>
            <tr>

            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($invoice_item as $item )
           <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->unit_price }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->line_total }}</td>
           </tr>
           @endforeach
            <tr>
                <td colspan="4" class="total-heading">Total Amount  :</td>
                <td colspan="1" class="total-heading">{{ $invoice->amount }}</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Thank your for shopping
    </p>
</div>

</body>

<script>
     function openPrintDialog() {
        window.print();
    }

    document.addEventListener('DOMContentLoaded', function () {
        openPrintDialog();

    });
</script>
</html>
