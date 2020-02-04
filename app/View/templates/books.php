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
    <form class="form" action="/pdf">
        <input type="hidden" name="date" value="02.02.2020">
        <button type="submit" class="button">
            Создать PDF
        </button>
    </form>
</div>
