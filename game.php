<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
        integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <!-- Bootsterap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <title> Blackjack</title>
</head>

<body>
    <div class="container mt-1">
        <div class="alert alert-dismissible alert-primary mb-1 ">
            <h2 class="text-center"><img class="img-responsive" src="./img/blackjack_p.png">
                <span>Blackjack</span>
            </h2>
        </div>
        <form method="post" action="">
            <div class=" form-row">
                <div class="form-group col-md-12">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3 text-center">
                    <button type="submit" class="btn btn-warning btn-lg btn-block btn " name="newGame" value="newGame">
                        <img class="img-responsive" src="./img/new-game_p.png">
                        <span>New Game!</span>
                    </button>
                </div>
                <div class="form-group col-md-3 text-center">
                    <button type="submit" class="btn btn-warning btn-lg btn-block btn " name="hit" value="hit">
                        <img class="img-responsive" src="./img/card-game-hand_p.png">
                        <span>Hit!</span>
                    </button>
                </div>
                <div class="form-group col-md-3 text-center">
                    <button type="submit" class="btn btn-warning btn-lg btn-block btn" name="stand" value="stand"><img
                            class="img-responsive" src="./img/like-up_p.png">
                        <span>Stand!</span></button>
                </div>
                <div class="form-group col-md-3 text-center">
                    <button type="submit" class="btn btn-warning btn-lg btn-block btn" name="surrender"
                        value="surrender"><img class="img-responsive" src="./img/like-down_p.png">
                        <span>Surrender!</span></button>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="jumbotron p-3" id="machine" class="img-fluid">
                        <!-- <img src="img/robot.jpg" alt=""> -->
                        <p style="font-size:200px;" class="text-center">
                            <? foreach($blackjack->getDealer()->getCards() AS $card) {
                           echo $card->getUnicodeCharacter(true);    
                         }?>
                        </p>
                        <p style="font-size=100px;">Score:
                            <?echo $blackjack->getDealer()->getScore(); ?>
                        </p>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="jumbotron p-3" id="player">
                        <!-- <img src="img/person.jpg" alt="" class="img-fluid"> -->
                        <p style="font-size:200px;" class="text-center">
                            <? foreach($blackjack->getPlayer()->getCards() AS $card) {
                           echo $card->getUnicodeCharacter(true);    
                         }?>
                        </p>
                        <p style="font-size=100px;">Score:
                            <?echo $blackjack->getPlayer()->getScore(); ?>
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>