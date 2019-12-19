<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Berita Holang 'v'</title>
    <style>
        body {
            padding: 0;
            margin: 0;
        }
        .container {
            margin: auto;
            width: 90%;
        }
        .title {
            text-align: center;
        }
        .desc {
            text-align: right;
        }
        .box {
            margin: 1em;
            border: solid 1px black;
            border-radius: 30px;
            padding: 1em;
        }
        .box > * {
            margin: .25em .5em;
        }
        h3 {
            margin: 0;
        }
        .pagination {
            display: flex;
            list-style: none;
            justify-content: center;
        }
        li {
            margin: 0 1em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title"><h1>BERITA HOLANG</h1></div>
        @foreach($news as $n)
        <div class="box">
            <div class="desc">
                <span>{{$n->writer}}</span>
                <span>|</span>
                <span>{{$n->date}}</span>
            </div>
            <h3>{{$n->title}}</h3>
            <div>{{$n->content}}</div>
            <img src="{{$n->image}}" alt="">
        </div>
        @endforeach
        {{$news->links()}}
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function () {
            setInterval(function() {
                $.ajax({
                    type: "GET",
                    url: "/get-curl",
                    success: function(response) {
                        if (response) {
                            console.log("run get-curl!");
                        }
                    }
                });
            }, 10800000);
        });
    </script>
</body>
</html>