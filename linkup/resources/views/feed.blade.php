<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>LinkUp Feed</title>

    <style>
        body{
            margin:0;
            background:#f3f2ef;
            font-family:Arial, Helvetica, sans-serif;
        }

        .container{
            width:700px;
            margin:30px auto;
        }

        h1{
            text-align:center;
            color:#0a66c2;
            margin-bottom:30px;
        }

        .post{
            background:white;
            border-radius:10px;
            padding:20px;
            margin-bottom:20px;
            box-shadow:0 2px 8px rgba(0,0,0,.1);
        }

        .header{
            display:flex;
            align-items:center;
            margin-bottom:15px;
        }

        .avatar{
            width:55px;
            height:55px;
            border-radius:50%;
            background:#0a66c2;
            color:white;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:22px;
            font-weight:bold;
            margin-right:15px;
        }

        .name{
            font-size:18px;
            font-weight:bold;
        }

        .headline{
            color:gray;
            font-size:14px;
        }

        .content{
            font-size:16px;
            line-height:1.6;
            margin-top:15px;
        }

        .date{
            color:#777;
            font-size:13px;
            margin-top:15px;
        }
    </style>

</head>
<body>

<div class="container">

    <h1>LinkUp Feed</h1>

    @foreach($posts as $post)

        <div class="post">

            <div class="header">

                <div class="avatar">
                    {{ strtoupper(substr($post->user->name,0,1)) }}
                </div>

                <div>
                    <div class="name">
                        {{ $post->user->name }}
                    </div>

                    <div class="headline">
                        {{ $post->user->headline }}
                    </div>
                </div>

            </div>

            <div class="content">
                {{ $post->content }}
            </div>

            <div class="date">
                {{ $post->created_at->format('d/m/Y H:i') }}
            </div>

        </div>

    @endforeach

</div>

</body>
</html>
