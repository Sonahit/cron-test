<?php isset($books) ?: $books = []; ?>
<?php $foreignCurrency = $foreignCurrency === 'RUB' ? 'EUR' : $foreignCurrency;?>
<?php $priceList = json_decode(App\http_response("https://api.exchangeratesapi.io/latest?base=RUB"));?>

<?php foreach ($books as $bookInfo) {
    $bookName = $bookInfo['book']['name'];
    $price = (int)$bookInfo['book']['price'];
    $description = $bookInfo['book']['description'];
    $image = $bookInfo['book']['image'];
    $genreName = $bookInfo['genre']['name'];
    $year = $bookInfo['book']['year'];
    $authorName = $bookInfo['author']['name'];?>
    <article class="entry">
        <header class="entry__header">
            <h2 class="heading-2 entry__title">
                <?php print($bookName) ?>
            </h2>
            <div class="entry__meta">
                <span>
                    <?php print($authorName) ?>
                </span>
                <span>
                    <?php print($year) ?>
                </span>
                <span>
                    <?php print($genreName) ?>
                </span>
            </div>
        </header>
        <div class="entry__main">
            <div class="entry__image">
                <img src="img/books/<?php print($image) ?>" alt="<?php print($bookName) ?>">
            </div>
            <div>
                <div class="entry__desc">
                    <p>
                        <?php
                        if (mb_strlen($description) > 200) {
                            $short = mb_substr($description, 0, 200);
                            printf('%s ...', $short);
                        }
                        ?>
                    </p>
                    <p
                        <?php if (mb_strlen($description) > 200) {?>
                            style="display: none;"
                        <?php } ?>
                    >
                        <?php print($description);?>
                    </p>
                </div>
                <?php if (mb_strlen($description) >= 200) { ?>
                    <a href="#" class="link">
                        Полное описание
                    </a>
                <?php }?>
                <div class="entry__bar">
                    <div class="entry__price">
                        <span>
                            <?php printf("%d ₽", $price) ?>
                        </span>
                        <span>
                            <?php
                            $foreignPrice = $priceList->rates->$foreignCurrency;
                            $price = round($price * $foreignPrice, 2);
                            $symbol = isset($currencyData[$foreignCurrency])
                                ? $currencyData[$foreignCurrency]['symbol']
                                : $foreignCurrency;
                            //€
                            printf("%d %s", $price, $symbol);
                            ?>
                        </span>
                    </div>
                    <button type="button" class="button button_dark">
                        Купить
                    </button>
                </div>
            </div>
        </div>
    </article>
<?php }?>
