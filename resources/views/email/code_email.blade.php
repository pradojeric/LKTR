<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elektro Event Code</title>
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
