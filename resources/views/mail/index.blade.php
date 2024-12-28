<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Invoice</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fff;
            /* Set background to white */
        }

        .invoice-container {
            background: #fff;
            margin: 20px auto;
            /* Center the invoice */
            width: 90%;
            /* Reduced width */
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        .invoice-header h3 {
            color: #007bff;
        }

        .table th {
            background-color: #007bff;
            color: #fff;
        }

        .table td {
            vertical-align: middle;
        }

        .table {
            margin-top: 20px;
            width: 100%;
            /* Ensures the table fills the container */
        }

        .product-image {
            width: 100px;
            /* Increased image size */
            height: 100px;
            /* Increased image size */
            object-fit: cover;
            border-radius: 5px;
        }

        .invoice-footer {
            margin-top: 30px;
            border-top: 2px solid #007bff;
            padding-top: 10px;
            font-size: 14px;
            color: #555;
        }

        /* Styling for the table */
        .table th,
        .table td {
            text-align: center;
            /* Centers text inside the cells */
            border: 1px solid #ddd;
            /* Border around cells */
        }

        .table th {
            background-color: #007bff;
            color: white;
        }

        .table td {
            background-color: #f9f9f9;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
            /* Adds a different color to alternate rows */
        }
    </style>
</head>

<body>

    <div class="container invoice-container">
        <!-- Invoice Header -->
        <div class="invoice-header">
            <h3>Order Invoice</h3>
            <p><strong>Order ID:</strong> {{ $mailData['order']['id'] }}</p>
            <p><strong>Order Date:</strong> {{ $mailData['order']['created_at'] }}</p>
        </div>

        <!-- Customer Details -->
        <div class="row">
            <div class="col-md-6">
                <h6><strong>Billing Details:</strong></h6>
                <p><strong>Name:</strong> {{ $mailData['order']['firstname'] }} {{ $mailData['order']['lastname'] }}</p>
                <p><strong>Email:</strong> {{ $mailData['order']['email'] ?? 'no email' }}</p>
                <p><strong>Phone No:</strong> {{ $mailData['order']['phone_no'] }}</p>
                <p><strong>Address:</strong> {{ $mailData['order']['address'] }}, {{ $mailData['order']['city'] }},
                    {{ $mailData['order']['zip_code'] ?? 'No zip Code' }}</p>
                <p><strong>Order Note:</strong> {{ $mailData['order']['order_note'] ?? 'No Note' }}</p>
            </div>
        </div>

        <!-- Order Items Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Color</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mailData['items'] as $index => $item)
                    {{-- {{dd($item['product']['image'] )}} --}}
                    <tr>
                        <td class="align-middle text-center">{{ $index + 1 }}</td>
                        <td class="align-middle text-center">
                            <img src="{{ env('APP_URL') . '/' . $item['product']['image'] }}" class="product-image"
                                alt="Product Image">
                        </td>
                        <td class="align-middle text-center">{{ $item['product']['name'] }}</td>
                        <td class="align-middle text-center">£{{ number_format($item['product']['price']) }}</td>
                        <td class="align-middle text-center">{{ $item['product']['subcategory']['name'] }}</td>
                        <td class="align-middle text-center">{{ $item['product']['color']['name'] }}</td>
                        <td class="align-middle text-center">{{ $item['qty'] }}</td>
                        <td class="align-middle text-center">£{{ number_format($item['total']) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Order Summary -->
        <div class="invoice-footer">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Total Quantity:</strong> {{ $mailData['items']->sum('qty') }}</p>
                </div>
                <div class="col-md-6 text-right">
                    <p><strong>Grand Total:</strong> £{{ number_format($mailData['order']['grand_total']) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (optional for better styling on PDFs) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>

</html>
