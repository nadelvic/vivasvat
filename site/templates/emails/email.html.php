<!DOCTYPE html>
<html>
<head>
    <style>
        .container{
            display:block;
            width:90%;
            max-width:1000px;
            margin-top:20px;
        }
        h2 {
            font-size:1.8em;
            font-weight:600;
        }
        .content {
            width:100%;
            margin: 20px 0;
            border: 1px solid #e1;
            border-radius:4px;
            -webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
            -moz-box-sizing: border-box;    /* Firefox, other Gecko */
            box-sizing: border-box; 
            padding:0 10px;
        }
        .sender {
            padding:10px 0;

        }
        hr {
            border: none;
            height: 1px;
            color: #e1;
            background-color: $e1;
        }
        .message {
            padding:10px 0;
        }

    </style>

<head>
</head>

<div class="container">
    <h2>Message de <?= $sender ?></h2>
    <div class="content">
    <div class="sender">
        <em>Email : </em> <?= $email ?>
    </div>
    <hr>
    <div class="message">
        <?= $text ?>
    </div>

    </div>
   
</div>




