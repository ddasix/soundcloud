<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <script src="https://connect.soundcloud.com/sdk/sdk-3.1.2.js"></script>
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
        <script>
            SC.initialize({
                client_id: 'e12da13ef16b1aaae780ac9b584b0a27',
                redirect_uri: '/auth/sound-cloud/callback'
            });
            SC.connect().then(function(){
                return SC.put('/me/followings/183');
            }).then(function(user){
                alert('You are now following ' + user.username);
            }).catch(function(error){
                alert('Error: ' + error.message);
            });;
        </script>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
        </div>
    </body>
</html>
