<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Boekenshop</title>
    <meta name="description" content="Op ReadSomeBooks kunnen de nieuwste boeken besteld worden."/>
    <link rel="stylesheet" href="../css/font-awesome.css"/>
    <link href="../css/normalize.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
    <script src="//localhost:35729/livereload.js"></script>
</head>
<body>
    <div id="container" class="webshop">
        <div id="kolom-1">
            <div id="header">
                <?php
                    include('partials/header.php');
                ?>
                <div class="clearfix"></div>
            </div>
            <div id="content" class="productenoverzicht">
                <div class="po-kolom">
                    <form>
                        <input type="search" placeholder="zoek..." value="" />
                        <input type="submit" value="Zoek">
                    </form>
                    <select>
                        <option value="option1">Option 1</option>
                        <option value="option2">Option 2</option>
                        <option value="option3">Option 3</option>
                        <option value="option4">Option 4</option>
                        <option value="option5">Option 5</option>
                    </select>
                    <span>
                        1367 producten | Toon
                        <select>
                            <option value="number1">1</option>
                            <option value="number2">2</option>
                            <option value="number3">3</option>
                            <option value="number4">4</option>
                            <option value="number5">5</option>
                        </select>
                        per pagina
                    </span>
                    <div class="product-row">
                        <div class="product-klein">
                            <a href="product-detail.php">
                                <img src="../img/covers_small/wall_street_thumbnail.jpg" alt="" />
                                <div class="product-info">
                                    <span class="po-naam">Wall Street</span>
                                    <span class="po-autheur"><em>Steve Fraser</em></span>
                                </div>
                            </a>
                            <span class="po-prijs">&euro; 15,00</span>
                            <button><i class="fa fa-shopping-cart fa-2x"></i></button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="product-klein">
                            <a href="product-detail.php">
                                <img src="../img/covers_small/the_white_mary_thumbnail.jpg" alt="" />
                                <div class="product-info">
                                    <span class="po-naam">The White Mary</span>
                                    <span class="po-autheur"><em>Kira Salak</em></span>
                                </div>
                            </a>
                            <span class="po-prijs">&euro; 15,00</span>
                            <button><i class="fa fa-shopping-cart fa-2x"></i></button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="product-klein">
                            <a href="product-detail.php">
                                <img src="../img/covers_small/the_end_thumbnail.jpg" alt="" />
                                <div class="product-info">
                                    <span class="po-naam">The End</span>
                                    <span class="po-autheur"><em>Marq de Villiers</em></span>
                                </div>
                            </a>
                            <span class="po-prijs">&euro; 15,00</span>
                            <button><i class="fa fa-shopping-cart fa-2x"></i></button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="product-klein">
                            <a href="product-detail.php">
                                <img src="../img/covers_small/the_glass_bead_game_thumbnail.jpg" alt="" />
                                <div class="product-info">
                                    <span class="po-naam">The Glass Bead Game</span>
                                    <span class="po-autheur"><em>Herman Hesse</em></span>
                                </div>
                            </a>
                            <span class="po-prijs">&euro; 15,00</span>
                            <button><i class="fa fa-shopping-cart fa-2x"></i></button>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="product-row">
                        <div class="product-klein">
                            <a href="product-detail.php">
                                <img src="../img/covers_small/steppenwolf_thumbnail.jpg" alt="" />
                                <div class="product-info">
                                    <span class="po-naam">Steppenwolf</span>
                                    <span class="po-autheur"><em>Herman Hesse</em></span>
                                </div>
                            </a>
                            <span class="po-prijs">&euro; 15,00</span>
                            <button><i class="fa fa-shopping-cart fa-2x"></i></button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="product-klein">
                            <a href="product-detail.php">
                                <img src="../img/covers_small/wake_up_sir_thumbnail.jpg" alt="" />
                                <div class="product-info">
                                    <span class="po-naam">Wake Up Sir!</span>
                                    <span class="po-autheur"><em>Jonathan Ames</em></span>
                                </div>
                            </a>
                            <span class="po-prijs">&euro; 15,00</span>
                            <button><i class="fa fa-shopping-cart fa-2x"></i></button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="product-klein">
                            <a href="product-detail.php">
                                <img src="../img/covers_small/a_sense_of_the_mysterious_thumbnail.jpg" alt="" />
                                <div class="product-info">
                                    <span class="po-naam">A Scence of the Mysterious</span>
                                    <span class="po-autheur"><em>Alan Lightman</em></span>
                                </div>
                            </a>
                            <span class="po-prijs">&euro; 15,00</span>
                            <button><i class="fa fa-shopping-cart fa-2x"></i></button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="product-klein">
                            <a href="product-detail.php">
                                <img src="../img/covers_small/mandela_thumbnail.jpg" alt="" />
                                <div class="product-info">
                                    <span class="po-naam">Mandela</span>
                                    <span class="po-autheur"><em>Martin Meredith</em></span>
                                </div>
                            </a>
                            <span class="po-prijs">&euro; 15,00</span>
                            <button><i class="fa fa-shopping-cart fa-2x"></i></button>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="product-row">
                        <div class="product-klein">
                            <a href="product-detail.php">
                                <img src="../img/covers_small/in_the_land_of_no_right_angles_thumbnail.jpg" alt="" />
                                <div class="product-info">
                                    <span class="po-naam">In the Land of No Right Angles</span>
                                    <span class="po-autheur"><em>Daphne Beal</em></span>
                                </div>
                            </a>
                            <span class="po-prijs">&euro; 15,00</span>
                            <button><i class="fa fa-shopping-cart fa-2x"></i></button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="product-klein">
                            <a href="product-detail.php">
                                <img src="../img/covers_small/group_theory_in_the_bedroom_thumbnail.jpg" alt="" />
                                <div class="product-info">
                                    <span class="po-naam">Group Theory in the Bedroom</span>
                                    <span class="po-autheur"><em>Brian Hayes</em></span>
                                </div>
                            </a>
                            <span class="po-prijs">&euro; 15,00</span>
                            <button><i class="fa fa-shopping-cart fa-2x"></i></button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="product-klein">
                            <a href="product-detail.php">
                                <img src="../img/covers_small/programming_the_universe_thumbnail.jpg" alt="" />
                                <div class="product-info">
                                    <span class="po-naam">Programming the Universe</span>
                                    <span class="po-autheur"><em>Seth Lloyd</em></span>
                                </div>
                            </a>
                            <span class="po-prijs">&euro; 15,00</span>
                            <button><i class="fa fa-shopping-cart fa-2x"></i></button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="product-klein">
                            <a href="product-detail.php">
                                <img src="../img/covers_small/send_me.thumbnail.jpg" alt="" />
                                <div class="product-info">
                                    <span class="po-naam">Send Me</span>
                                    <span class="po-autheur"><em>Patrick Ryan</em></span>
                                </div>
                            </a>
                            <span class="po-prijs">&euro; 15,00</span>
                            <button><i class="fa fa-shopping-cart fa-2x"></i></button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="product-row">
                            <div class="product-klein">
                                <a href="product-detail.php">
                                    <img src="../img/covers_small/zermatt_thumbnail.jpg" alt="" />
                                    <div class="product-info">
                                        <span class="po-naam">Zermat</span>
                                        <span class="po-autheur"><em>Frank Schaeffer</em></span>
                                    </div>
                                </a>
                                <span class="po-prijs">&euro; 15,00</span>
                                <button><i class="fa fa-shopping-cart fa-2x"></i></button>
                                <div class="clearfix"></div>
                            </div>
                            <div class="product-klein">
                                <a href="product-detail.php">
                                    <img src="../img/covers_small/the_good_life_thumbnail.jpg" alt="" />
                                    <div class="product-info">
                                        <span class="po-naam">The Good Life</span>
                                        <span class="po-autheur"><em>Jay McInerney</em></span>
                                    </div>
                                </a>
                                <span class="po-prijs">&euro; 15,00</span>
                                <button><i class="fa fa-shopping-cart fa-2x"></i></button>
                                <div class="clearfix"></div>
                            </div>
                            <div class="product-klein">
                                <a href="product-detail.php">
                                    <img src="../img/covers_small/show_of_hands_thumbnail.jpg" alt="" />
                                    <div class="product-info">
                                        <span class="po-naam">Show of Hands</span>
                                        <span class="po-autheur"><em>Anthony McCarten</em></span>
                                    </div>
                                </a>
                                <span class="po-prijs">&euro; 15,00</span>
                                <button><i class="fa fa-shopping-cart fa-2x"></i></button>
                                <div class="clearfix"></div>
                            </div>
                            <div class="product-klein">
                                <a href="product-detail.php">
                                    <img src="../img/covers_small/the_paradox_of_choice_thumbnail.jpg" alt="" />
                                    <div class="product-info">
                                        <span class="po-naam">The Paradox of Choice</span>
                                        <span class="po-autheur"><em>Barry Schwartz</em></span>
                                    </div>
                                </a>
                                <span class="po-prijs">&euro; 15,00</span>
                                <button><i class="fa fa-shopping-cart fa-2x"></i></button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <footer>
                <span>&copy; Read Some Books | 2014</span>
            </footer>
        </div>
        <div id="kolom-2">
            <a href="http://www.facebook.com">
                <img class="facebook" src="../img/banners/facebookBanner.jpg" alt="facebook"/>
            </a>
            <a href="http://www.twitter.com">
                <img class="twitter" src="../img/banners/twitterBanner.jpg" alt="twitter"/>
            </a>
        </div>
        <div class="clearfix"></div>
    </div>
</body>
</html>
