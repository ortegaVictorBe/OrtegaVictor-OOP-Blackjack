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
            <?php echo $winner ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="jumbotron p-2" id="machine" class="img-fluid">
                        <div>
                            <img class="img-responsive" src="img/croupier_p.png"
                                alt=""><span><strong>CROUPIER</strong></span>
                            <p class="float-right" style="font-size=200px;"><strong>Score:
                                    <?echo $blackjack->getDealer()->getScore(); ?>
                                </strong>
                            </p>
                        </div>
                        <p style="font-size:175px;" class="text-center">
                            <? foreach($blackjack->getDealer()->getCards() AS $card) {
                           echo $card->getUnicodeCharacter(true);    
                         }?>
                        </p>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="jumbotron p-2" id="player">
                        <div>
                            <img class="img-responsive" src="img/player_p.png"
                                alt=""><span><strong>PLAYER</strong></span>
                            <p class="float-right" style="font-size=200px;"><strong>Score:
                                    <?echo $blackjack->getPlayer()->getScore(); ?>
                                </strong>
                            </p>
                        </div>
                        <p style="font-size:175px;" class="text-center">
                            <? foreach($blackjack->getPlayer()->getCards() AS $card) {
                               echo $card->getUnicodeCharacter(true);}?>
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>