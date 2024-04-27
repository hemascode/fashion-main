<!DOCTYPE html>
<html>
<head>
    @section('title')
    {{$settings->site_name}} | Order Product
    @endsection
    <title>Success</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    @include('frontend.layout.css')
    <style>
        .success-card {
            text-align: center;
            padding: 70px 0;
            /* background: #EBF0F5; */
        }
        .success-title {
            color: #0bae0b;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-weight: 900;
            font-size: 40px;
            margin-bottom: 10px;
        }
        .success-message {
            color: #404F5E;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-size: 20px;
            margin: 0;
        }
        .checkmark {
            color: #0bae0b;
            font-size: 100px;
            line-height: 200px;
            margin-left: -15px;
        }
        .success-card-container {
            background: white;
            padding: 60px;
            border-radius: 4px;
            box-shadow: 0 2px 3px #C8D0D8;
            display: inline-block;
            margin: 0 auto;
        }
        .success-icon {
            border-radius: 200px;
            height: 200px;
            width: 200px;
            background: #F8FAF5;
            margin: 0 auto;
        }
    </style>
   
</head>
<body>

    <div>
        <div class="success-card">
            <div class="success-card-container">
                <div class="success-icon">
                    <i class="checkmark">✓</i>
                </div>
                <h1 class="success-title">Success</h1>
                <p class="success-message">We received your purchase request;<br/> we'll be in touch shortly!</p>
            </div>
        </div>
    </div>

</body>
</html>
