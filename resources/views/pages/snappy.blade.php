<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ID Cards</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }
        body {
            margin: 0;
            padding: 10mm;
            font-family: sans-serif;
        }

        .row {
            display: flex;
            justify-content: space-between;
            gap: 10mm;
        }

        .card {
            width: 140mm;
            height: 90mm;
            border: 1px solid black;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            font-size: 8pt;
        }

        /* Left card parts */
        .card-left .top {
            height: 28mm;
            border-bottom: 1px solid black;
        }

        .card-left .bottom {
            flex: 1;
        }

        /* Right card parts */
        .card-right .top {
            height: 15mm;
            border-bottom: 1px solid black;
        }

        .card-right .middle {
            height: 30mm;
            border-bottom: 1px solid black;
        }

        .card-right .bottom {
            flex: 1;
        }
    </style>
</head>
<body>
    <div class="row">
        <!-- Left Card -->
        <div class="card card-left">
            <div class="top">Left Card Top (28mm)</div>
            <div class="bottom">Left Card Bottom (~62mm)</div>
        </div>

        <!-- Right Card -->
        <div class="card card-right">
            <div class="top">Right Card Top (15mm)</div>
            <div class="middle">Right Card Middle (30mm)</div>
            <div class="bottom">Right Card Bottom (~45mm)</div>
        </div>
    </div>
</body>
</html>
