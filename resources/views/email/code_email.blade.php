<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">

        <!-- CSS/Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <!-- JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

        <style>
            body{
                font-family: 'Roboto Slab' !important;
                color:#595868 !important;
            }

            img{
                width: 100%;
                height: auto;
            }

            h3{
                color: #1c3254 !important;
            }

            .container{
                width: 500px !important;
            }

            .event-period{
                color:#ffffff !important;
                background-color: red;
                text-align: center;
                font-size: 15px;
                padding: 5px;
            }

            .greeting{
                text-align: center;
                padding: 20px;
                font-size: 14px;
                background-color: #ffffff89;
                margin-top: 15px;
                margin-left: 15px;
                margin-right: 15px;
                margin-bottom: 0px;
                border-radius: 10px 10px 0px 0px;
            }

            .email-body{
                background: linear-gradient(to bottom, #b3e7ff 0%, #e6f7ff 100%);
                padding-bottom: 5px;
                border-radius: 0px 0px 10px 10px;
            }

            .greetings-header{
                color: #1c3254;
                font-size: 20px;
                text-align: center;
                padding: 10px;
            }


            .code{
                text-align: center;
                color:#ffffff;
                background-color: #2f4db1;
                padding: 10px;
            }

            .mechanics{
                font-size: 12px;
                background-color: #ffffff89;
                padding: 20px;
                margin-top: 0px;
                margin-left: 15px;
                margin-right: 15px;
                margin-bottom: 15px;
                border-radius: 0px 0px 10px 10px;
            }

            img{
                border-radius: 10px 10px 0px 0px;
            }

            .email-container{
                border-radius: 15px;
                box-shadow: 0px 2px 5px #aaa;
                border: 2px solid #fff;
                margin-top: 20px;
            }

        </style>

    </head>

<body>
    <div class="container">
        <div class="email-container">
            <div class="upper-email">
                <img src="{{ asset('img/banner.jpg') }}" alt="banner">
            </div>
            <div class="event-period">
                {{ date('M d, Y h:i a', strtotime($event['starting_event'])) }} - {{  date('M d, Y h:i a', strtotime($event['ending_event'])) }}
            </div>
            <div class="email-body">
                <div class="greetings-header">
                    Welcome {{ $details['full_name'] }}!;
                </div>

                <div class="greeting">
                    Thank you for registering!
                    <br>
                    You can now participate at the <b>Elektro Quiz Bee</b> on {{ date('M d, Y', strtotime($event['starting_event'])) }}!
                    <br><br>
                    Please check below for your pre-registration event code.
                </div>

                <div class="code">
                    <h4>{{ $details['code'] }}</h4>
                </div>

                <div class="mechanics">
                    <img src="{{ asset('img/eventDetails.png') }}" alt="EventDetails">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
