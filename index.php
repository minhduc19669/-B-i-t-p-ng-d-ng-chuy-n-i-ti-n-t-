<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            margin: 10px;
            box-sizing: border-box;
        }
        .container{
            margin: auto;
        }
    </style>
</head>
<body>

<div class="container">
    <form action="index.php" method="post">
        <fieldset style="width: 500px;height:200px;">
            <legend><h3>Chuyển đổi tiền tệ</h3></legend>
            <label style="margin-left: 20px;">Số tiền:</label>
            <input type="text" name="money">
            <select name="operation" id="">
                <option value="$">$</option>
                <option value="¥">¥</option>
            </select><br>
            <input type="submit" value="Chuyển đổi" style="margin-left: 20px">
            <div class="result">
            <label>Việt Nam đồng:</label>
                <span><?php
                    if ($_SERVER['REQUEST_METHOD']=="POST"){
                        define("USD","$");
                        define("Yên","¥");
                        $money=$_POST['money'];
                        $operation=$_POST['operation'];
                        $changemoney=new ChangeMoney();
                        switch ($operation){
                            case USD:
                                echo $changemoney->usd($money).".VND";
                                break;
                            case Yên:
                                echo $changemoney->jpy($money).".VND";
                                break;
                        }
                    }


                    class ChangeMoney{
                        public function usd($money){

                            return $money*23000;

                        }
                        public function jpy($money){
                            return $money*200;
                        }
                    }

                    ?></span>
            </div>
        </fieldset>
    </form>
</div>
</body>
</html>