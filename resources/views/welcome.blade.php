<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            main {
                width: 80ch;
                margin-left:auto;
                margin-right: auto;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .success {
                color: #2C905F;
            }

            .fail {
                color:#A70F29;
            }
        </style>
    </head>
    <body>
        <main>
            <section>
                <form action="/" method="get">
                    <div>
                        <label for="efficiency">Efficiency/Luck</label>
                        <input name="efficiency" type="number" placeholder="70" value="{{request()->input('efficiency')}}">
                    </div>
                    <div>
                        <label for="shurikens">Start Shurikens</label>
                        <input type="number" placeholder="60" name="shurikens" value="{{request()->input('shurikens')}}">
                    </div>
                    <div>
                        <label for="success">Success Points</label>
                        <input type="number" placeholder="1" name="success" value="{{request()->input('success')}}">
                    </div>
                    <div>
                        <label for="fail">Fail Points</label>
                        <input type="number" name="fail" placeholder="10" value="{{request()->input('fail')}}">
                    </div>
                    <div>
                        <button>Toreningu !</button>
                    </div>
                </form>
            </section>

            @if(isset($nindo))

            <h1>{{$nindo->result()}}</h1>
            <section class="{{$nindo->hasWon() ? "success" : "fail"}}">
                <pre>{{$nindo->getDetails()}}</pre>
            </section>

            <details>
                @foreach($nindo->getLog() as $line)
                    <div class="{{$line->success ? "success" : "fail"}}">{{$line->msg}}</div>
                @endforeach
            </details> 
            @endif
        </main>
    </body>
</html>
