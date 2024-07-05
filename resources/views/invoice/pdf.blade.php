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
            padding: 10px;
            border: 1px solid #000; /* Add border to container */
            border-radius: 2px; /* Add border radius */
            margin-top: 0px; /* Add margin to separate from header */
        }
        .header {
            display: flex;
            align-items: flex-start; /* Align items at the start */
            padding: 10px 20px; /* Reduce padding to reduce space */
            position: relative;
        }
        .header::before {
            content: "";
            width: 100%;
            height: 5px;
            background-color: #004a99;
            position: absolute;
            top: 0;
            left: 0;
        }
        .header-logo {
            flex: 0 0 200px; /* Fixed width for the logo */
            max-width: 200px; /* Increase logo size */
        }
        .header-logo img {
            width: 100%;
            height: auto;
        }
        .header-details {
            flex: 1; /* Take remaining space */
            text-align: right; /* Align text to the right */
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #004a99;
        }
        .header p {
            margin: 5px 0;
            color: #555;
        }
        .title {
            text-align: center;
            margin-top: 0px; /* Add margin to separate from header */
            font-size: 16px;
            font-weight: bold;
        }
        .content {
            margin-top: 0px; /* Margin above content */
            padding: 10px; /* Add padding inside content */
        }
        .invoice-details {
            width: 100%;
            margin-bottom: 10px;
            border-collapse: collapse;
        }
        .invoice-details td {
            padding: 5px; /* Adjust padding */
        }
        .invoice-details tr:not(:last-child) td {
            border-bottom: none; /* Remove border between rows */
        }
        .customer-details {
            width: 70%;
            float: left;
            padding: 10px;
            border-right: none; /* Remove right border */
        }
        .company-details {
            width: 30%;
            float: right;
            padding: 10px;
            border-left: none; /* Remove left border */
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
        .total {
            text-align: right;
            margin-right: 0;
        }
        .terms {
            margin-top: 20px;
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
    </style>
</head>
<body>
    <div class="header">
        <div class="header-logo">
            <img src="{{ asset('assets/images/logo.jpeg') }}" alt="Company Logo">
        </div>
        <div class="header-details">
            <h1>DBM</h1>
            <p>Deo Building Materials and Supply</p>
            <p>P.O.Box, Dodoma, Nkuhungu, Street Ndachi Muungano</p>
            <p>Phone: +255 713 066 193</p>
        </div>
    </div>

    <div class="title">Proforma Invoice</div> <!-- Title without border -->

    <div class="container">
        <div class="content">
            <table class="invoice-details">
                <tr>
                    <td class="customer-details">
                        <strong>Credited On:</strong> {{$invoice->customer_name}}<br>
                        <strong>Address:</strong> {{$invoice->customer_address}} <br>
                        <strong>Contact Person:</strong> {{$invoice->contact_person}}<br>
                        <strong>Mobile:</strong> {{$invoice->customer_phone}}<br>
                        <strong>TIN:</strong> {{$invoice->customer_tinnumber}} <br>
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

            <h3>Description</h3> <!-- Added description title -->

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
                    <tr>
                        <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
                        <td>{{ $invoice->total_amount }}</td>
                    </tr>
                </tbody>
            </table>

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
            <p>CRDB BANK<br>Deograsias V Temba<br>Account Number: 0152231362400</p>
        </div>
    </div>

    <div class="footer">
        <p>Deo Building Materials and Supply, P.O.Box, Dodoma, Nkuhungu, Street Ndachi Muungano, Phone: +255 713 066 193</p>
    </div>
</body>
</html>
