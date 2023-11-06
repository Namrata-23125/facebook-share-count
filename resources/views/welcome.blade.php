<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <style>
        body {
            font-family: Arial;
        }

        * {
            box-sizing: border-box;
        }

        .openBtn {
            background: #f1f1f1;
            border: none;
            padding: 10px 15px;
            font-size: 20px;
            cursor: pointer;
        }

        .openBtn:hover {
            background: #bbb;
        }

        .overlay {
            height: 100%;
            width: 100%;
            display: none;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.9);
        }

        .overlay-content {
            position: relative;
            top: 46%;
            width: 80%;
            text-align: center;
            margin-top: 30px;
            margin: auto;
        }

        .overlay .closebtn {
            position: absolute;
            top: 20px;
            right: 45px;
            font-size: 60px;
            cursor: pointer;
            color: white;
        }

        .overlay .closebtn:hover {
            color: #ccc;
        }

        .overlay input[type=text] {
            padding: 15px;
            font-size: 17px;
            border: none;
            float: left;
            width: 80%;
            background: white;
        }

        .overlay input[type=text]:hover {
            background: #f1f1f1;
        }

        .overlay button {
            float: left;
            width: 20%;
            padding: 15px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }

        .overlay button:hover {
            background: #bbb;
        }
    </style>
</head>
<body>

<div id="myOverlay" class="overlay">
    <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
    <div class="overlay-content">
        <form action="/">
            <input type="text" class="url" placeholder="Enter URL.." name="search">
            <button type="button" onclick="getShareCount();"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>

<h2>Check Share Count</h2>
<button class="openBtn" onclick="openSearch()">Open Search Box</button>

<script>
    function openSearch() {
        document.getElementById("myOverlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("myOverlay").style.display = "none";
    }

    function getShareCount() {
        // url = $('.url').val();
        // api_url = "https://graph.facebook.com/v3.0/?id=' . urlencode( $url ) . '&fields=engagement&access_token=' . $access_token"
        // $.ajax({
        //     url: api_url,
        //     type: 'get',
        //     sucess: function (res) {
        //         alert(res.og_object.engagement.count);
        //     }
        // });
        var token = '3571672523066674|3b3afcb4c2790a4010ee6b4488665712', // learn how to obtain it above
            url = $('.url').val();

        $.ajax({
            url: 'https://graph.facebook.com/v17.0/',
            dataType: 'jsonp',
            type: 'GET',
            data: {fields: 'engagement', access_token: token, id: url},
            success: function(data){
                console.log(data);
                // $('body').append(data.engagement.share_count);
            },
            error: function(data){
                console.log(data); // send the error notifications to console
            }
        });
    }
</script>

</body>
</html>
