<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniUni 404</title>
    <link rel="stylesheet" type="text/css" href="css/contact.css" />
    <style>
        body {
            margin: 0;
    
        }
        
        .error-page {
            float: left;
            height: 100vh;
            position: relative;
            width: 100%;
        }
        
        .bg-image {
            float: left;
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
            z-index: -1;
            background-position: center stretch;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .error-meta {
            left: 50%;
            position: absolute;
            top: 55%;
            transform: translate(-50%, -50%);
            text-align: center;
        }
        
        h1 {
            text-shadow: 1px 1px white;
            font-size: 50px;
            margin-bottom: 0;
            text-transform: capitalize;
            font-weight: bold;
            color: #00BFFF;
        }
        
        span {
            display: inline-block;
            font-size: 17px;
            text-align: center;
            width: 100%;
            text-transform: capitalize;
            margin-top: 10px;
            color: gray;
        }
        
        button {
            border-radius: 3px;
            border: 1px solid white;
            background-color: #00BFFF;
            color: white;
            display: inline-block;
            margin-top: 30px;
            text-align: center;
            text-decoration: none;
            padding: 6px 30px;
        }
        
        button:hover {
            background-color: #00bfff57;
        }
        
            
        
    </style>
</head>

<body>

    <div class="error-page">
        <div class="bg-image" style="background-image: url(https://proxy.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.transparenttextures.com%2Fpatterns%2Fpaper-fibers.png&f=1)";></div>
        
        <div class="error-meta">
            <h1 style="font-size:380%;">ERROR 404!</h1>
            <h1>Whoops!</h1>
            <span>we couldn't find that page </span><br>
            <button onclick="window.history.back()">Go Back</button>
        </div>
    </div>

</body>

</html>