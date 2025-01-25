<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICCMS Sign-in</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        input[type='submit'] {
            background-color: #f2f2f2;
            padding: 10px;
            border: 1px solid #ccc;
        }

        input[type='submit']:hover {
            cursor: pointer;
            background-color: #e600ff;
            padding: 10px;
            color: #ffffff;
            border: 1px solid #ccc;
        }

    </style>
</head>

<body>
    <!-- LOG IN AS ADMIN NI DERI -->

    <form action="{{ route('sign_in.verify') }}" method="POST">
        @csrf
        @method('POST')
        <input type="submit" value="Sign In">
    </form>
</body>

</html>
