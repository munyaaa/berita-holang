<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Berita Holang 'v'</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto:300,400,700,900&display=swap');
        * {
            font-family: 'Roboto', sans-serif;
        }
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
            color: gray;
        }
        .box {
            margin: 1em;
            border: solid 2px rgba(0,0,0,.05);
            border-radius: 30px;
            box-shadow: 0px 5px 5px rgba(0,0,0,0.15);
            padding: 1em;
        }
        .box > * {
            margin: .25em .5em;
        }
        .content {
            text-align: justify;
        }
        .desc span {
            font-size: 10pt;
        }
        h3 {
            margin: 0;
        }
        .pagination {
            display: flex;
            border: solid 2px rgba(0,0,0,.05);
            box-shadow: 0px 5px 5px rgba(0,0,0,0.15);
            list-style: none;
            justify-content: center;
            justify-content: center;
            padding: .5em;
            margin: 1em;
        }
        .page-item {
            margin: 0 1em;
            padding: .5em;
        }
        .page-item a {
            text-decoration: none;
            color: gray;
        }
        .page-item.active {
            background-color: gray;
            color: white;
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
                <span> | </span>
                <span>{{$n->date}}</span>
            </div>
            <h3>{{$n->title}}</h3>
            <img src="{{$n->image}}" alt="">
            <div class="content">{{$n->content}}</div>
        </div>
        @endforeach
        {{$news->links()}}
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            setInterval(function() {
                $.ajax({
                    type: "GET",
                    url: "/get-curl",
                    success: function(response) {
                        if (response) {
                            window.location.reload(true)
                            console.log("run get-curl!")
                        }
                    }
                });
            }, 10800000)
        })
    </script>
</body>
</html>