<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Activation</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .email-notification {
            max-width: 400px;
            margin: 50px auto;
            background-color: #d4edda;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border: 1px solid #c3e6cb;
        }
        .email-notification .title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #155724;
            margin-bottom: 15px;
            text-align: center;
        }
        .email-notification .message {
            font-size: 1rem;
            color: #155724;
            margin-bottom: 20px;
            text-align: center;
        }
        .email-notification .btn {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="email-notification">
    <div class="title">Success!</div>
    <div class="message">
        {{ $messageContent }}
    </div>
    <a href="{{ $actionUrl }}" class="btn btn-success">{{ $actionText }}</a>

    <p>Thank you for using our system.</p>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
