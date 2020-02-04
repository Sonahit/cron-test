<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Books</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="dns-prefetch" href="//maps.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,700,800&display=swap">
    <link rel="stylesheet" href="css/main-76b66b5da2.css">
</head>
<body>
    <div class="wrap">
    <h1 class="v-hidden">
        Книги
    </h1>
    <div class="items">
        <?php include 'book.php' ?>
    </div>

        <dl class="meta">
            <div class="meta__item">
                <dt>
                    Всего книг:
                </dt>
                <dd>
                    <?php print(sizeof($originalBooks)) ?>
                </dd>
            </div>
            <div class="meta__item">
                <dt>
                    Средняя стоимость:
                </dt>
                <dd>
                    <?php
                        $price = array_reduce($originalBooks, function ($price, $bookInfo) {
                            $price += (int)$bookInfo['book']['price'];
                            return $price;
                        }, 0);
                        printf("%d ₽", (int)($price / count($originalBooks)));?>
                </dd>
            </div>
            <div class="meta__item">
                <dt>
                    Публикации:
                </dt>
                <dd>
                    <?php
                        $data = array_reduce($originalBooks, function ($date, $bookInfo) {
                            $date['from'] = min($date['from'], (int)$bookInfo['book']['year']);
                            $date['to'] = max($date['to'], (int)$bookInfo['book']['year']);
                            return $date;
                        },
                        [
                            'from' => $originalBooks[0]['book']['year'],
                            'to' => $originalBooks[0]['book']['year']
                        ]);

                        print("{$data['from']} - {$data['to']}");?>
                </dd>
            </div>
        </dl>
    </div>
</body>
</html>


