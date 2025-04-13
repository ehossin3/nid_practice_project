<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A4 Layout</title>
    <style>
        * {
            box-sizing: border-box;

        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .a4-paper {
            width: 210mm;
            height: 297mm;
            background: white;
            position: relative;
            border: 4px solid black;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .container {
            display: flex;
            flex-direction: row;
            width: 100%;
            justify-content: space-between;
            gap: 25px;
        }

        .box {
            width: 1000px;
            height: 640px;
            border: 4px solid black;
            display: flex;
            flex-direction: column;
        }

        .box div {
            border-bottom: 4px solid black;
        }

        .box-1 .top {
            height: 200px;
        }

        .box-1 .bottom {
            height: 440px;
            border-bottom: 0;
        }

        .box-2 .row-1 {
            height: 110px;
        }

        .box-2 .row-2 {
            height: 217px;
        }

        .box-2 .row-3 {
            height: 313px;
            border-bottom: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="box box-1">
            <div class="top"></div>
            <div class="bottom"></div>
        </div>
        <div class="box box-2">
            <div class="row-1"></div>
            <div class="row-2"></div>
            <div class="row-3"></div>
        </div>
    </div>
</body>

</html>
