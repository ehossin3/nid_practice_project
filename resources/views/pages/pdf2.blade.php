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
            border: 2px solid black;
        }

        .id-card {
            margin: 10px auto;

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
            border: 3px solid #000;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .qr-code {
            text-align: center;
        }

        @media print {
            body {
                background: none;
            }

            .a4-container {
                margin: 0;
                box-shadow: none;
            }
        }

        @page{
            size: A4;
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="a4-container">
        <div class="id-card">
            <div class="id-left">
                <h3>Government of the People's Republic of Bangladesh</h3>
                <h4>National ID Card</h4>
                {{-- <img src="{{ $photo }}" width="120" height="120"> --}}
                <p><strong>Name:</strong> Emran</p>
                <p><strong>Date of Birth:</strong> 25 Dec 1998</p>
                <p><strong>ID No:</strong> 123456789</p>
                <p><strong>Blood Group:</strong> B+</p>
            </div>
            <div class="id-right">
                <p>Address: Example Address, City, Bangladesh</p>
                <p>Signature:</p>
                <div class="qr-code">
                    {{-- <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(80)->generate($id_no)) }}" alt="QR Code"> --}}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
