<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .a4-container {
            width: 210mm;
            /* A4 Width */
            height: 297mm;
            /* A4 Height */
            position: relative;
            /* page-break-after: always; */
        }

        .id-card {
            margin: 10px auto;
            border: 2px solid black;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .id-left,
        .id-right {
            width: 1012px;
            height: 640px;
            border: 4px solid #000;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .qr-code {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="a4-container">
        <div class="id-card">
            <img src="{{ asset('images/nid_frame.png') }}" alt="">
        </div>
    </div>
</body>

</html>
