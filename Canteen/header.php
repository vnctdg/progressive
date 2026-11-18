
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Canteen System</title>
    <style>
            body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 20px;
            font-size: 13px;
        }

        .container {
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h1 {
            background: #791e2a;
            color: white;
            padding: 20px;
            margin: -25px -25px 20px;
            font-size: 25px;
        }

        h2 {
            font-size: 18px;
            color: #791e2a;
        }

        hr {
            border: 0;
            border-top: 2px solid #ddd;
        }

        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            box-sizing: border-box;
        }

        input, select {
            background: #f1f3f3;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background: #791e2a;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background: #5e1720;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #d5e0ef;
            color: #791e2a;
        }

        .success {
            color: green;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        /* RECEIPT DESIGN */

        .receipt-layout {
            display: flex;
            gap: 20px;
            margin-top: 20px;
            align-items: flex-start;
        }

        .details {
            flex: 1;
        }

        .details label {
            display: block;
            font-size: 11px;
            font-weight: bold;
            color: #777;
            margin-top: 12px;
        }

        .detail-value {
            background: #f1f3f3;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 12px;
            margin-top: 5px;
        }

        .receipt-box {
            flex: 1;
            border: 2px solid #e6a23c;
            border-radius: 8px;
            background: #fff9f2;
            padding: 15px;
        }

        .receipt-box h2 {
            margin-top: 0;
        }

        .receipt-item {
            display: flex;
            justify-content: space-between;
            margin: 15px 0;
            font-size: 12px;
        }

        .receipt-line {
            border-top: 1px solid #e6a23c;
            margin-top: 20px;
        }

        .final-label {
            color: #791e2a;
            font-weight: bold;
            font-size: 12px;
        }

        .final-amount {
            color: #791e2a;
            font-size: 23px;
            font-weight: bold;
            margin-top: 5px;
        }

        .budget-status {
            margin-top: 25px;
            font-size: 12px;
            font-weight: bold;
        }

        @media (max-width: 550px) {
            .receipt-layout {
                flex-direction: column;
            }

            .details, .receipt-box {
                width: 100%;
                box-sizing: border-box;
            }
}
    </style>
</head>
<body>
<div class="container">
    <h1>Campus Canteen</h1>
    <p>Student Ordering and Discount System</p>
    <hr>
