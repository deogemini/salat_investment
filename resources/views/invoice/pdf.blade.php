<!DOCTYPE html>
<html>
<head>
    <title>Proforma Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 12px;
        }
        .container {
            width: 100%;
            padding: 20px;
        }
        .header {
            width: 100%;
            text-align: center;
            position: fixed;
            top: 0;
            background-color: #004a99;
            color: #fff;
            padding: 10px 0;
        }
        .footer {
            width: 100%;
            text-align: center;
            position: fixed;
            bottom: 0;
            font-size: 10px;
            padding: 10px 0;
            border-top: 1px solid #000;
        }
        .content {
            margin-top: 120px;
            margin-bottom: 50px;
        }
        .invoice-details {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        .invoice-details td {
            padding: 5px;
        }
        .customer-details {
            width: 50%;
            float: left;
        }
        .company-details {
            width: 50%;
            float: right;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .invoice-table th {
            background-color: #004a99;
            color: #fff;
        }
        .terms {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><span>DBM</span></h1>
        <p>Deo Building Materials and Supply</p>
        <p>P.O.Box, Dodoma, Nkuhungu, Street Ndachi Muungano</p>
        <p>Phone: +255 713 066 193</p>
    </div>

    <div class="container">
        <div class="content">
            <h2 class="text-center">Proforma Invoice</h2>

            <table class="invoice-details">
                <tr>
                    <td class="customer-details">
                        <strong>Credited On:</strong> {{$invoice->customer_name}}<br>
                        <strong>Address:</strong>{{$invoice->customer_address}} <br>
                        <strong>Contact Person:</strong> {{$invoice->contact_person}}<br>
                        <strong>Mobile:</strong>{{$invoice->customer_phone}}<br>
                        <strong>TIN:</strong>{{$invoice->customer_tinnumber}} <br>
                    </td>
                    <td class="company-details">
                        <strong>Tin No:</strong> 131-073-356<br>
                        <strong>Issued By:</strong> Deograsias Temba<br>
                        <strong>Date:</strong> {{ date('d/m/Y') }}<br>
                        <strong>Request No:</strong> {{$invoice->invoice_number}}<br>
                        <strong>Currency:</strong> TZS<br>
                    </td>
                </tr>
            </table>

            <table class="invoice-table">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoice->items as $item)
                    <tr>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->quantity * $item->price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <p><strong>Total:</strong> {{$invoice->total_amount }}</p>
            {{-- <p><strong>VAT Amount:</strong> {{ $invoice->total_amount*0.18}}</p> --}}
            {{-- <p><strong>Total:</strong> {{ $invoice->total_amount + ($invoice->total_amount*0.18) }}</p> --}}

            <div class="terms">
                <p><strong>Sales Order Terms and Conditions:</strong></p>
                <ol>
                    <li>Delivery Seller will not assume any responsibility for any damage resulting from any delay beyond its control.</li>
                    <li>Return: No goods may be returned to Sellers without the prior written consent of Seller and are subject to a return charge.</li>
                    <li>The terms of payment is 100% advance through bank transaction only and as per our given Bank details.</li>
                    <li>The validity of the proforma and the offer here is for ... days and is subjected to receipt of payment along with purchase order within the stipulated period.</li>
                    <li>The management reserves the right to review the price without any notice.</li>
                </ol>
            </div>

            <p><strong>Bank Details:</strong></p>
            <p>CRDB BANK<br>Deograsias V Temba<br>Account Number: 01522313362400</p>
        </div>
    </div>

    <div class="footer">
        <p>Deo Building Materials and Supply, P.O.Box, Dodoma, Nkuhungu, Street Ndachi Muungano, Phone: +255 713 066 193</p>
    </div>
</body>
</html>
