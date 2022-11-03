<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>
<link rel="preload" as="image" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/delivery/box.webp">
<? $APPLICATION->SetTitle("Бодрый шоп | Доставка"); ?>
</head>

<body>
  <div class="wrapper">

    <!-- подлючаем меню -->
    <? require($_SERVER["DOCUMENT_ROOT"] . "/menu.php"); ?>

    <main class="main delivery">
      <div class="delivery__box">
        <picture>
          <source
            srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/delivery/box@2x.webp 2x, <?= SITE_TEMPLATE_PATH ?>/assets/img/delivery/box.webp 1x"
            type="image/webp">
          <img class="delivery__img" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/delivery/box.png"
            srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/delivery/box@2x.jpg 2x" alt="коробки">
        </picture>
      </div>
      <div class="inner">
        <div class="container">
          <div class="delivery__items">

            <div class="delivery__item">
              <h2 class="delivery__item-title">Оплата</h2>
              <p class="delivery__item-text">1. Перечисление суммы оплаты на наш расчетный счет.</p>
              <p class="delivery__item-text">2. Наличными курьеру при доставке в Новосибирске.</p>
              <p class="delivery__item-text">3. Банковский перевод — для юридических лиц.</p>
              <p class="delivery__item-text">После оформления заказа на Ваш электронный адрес будет выслан счет на
                оплату. Все необходимые для
                бухгалтерии документы
                Вы получите вместе с заказом.</p>
              <p class="delivery__item-text">При получении необходимо иметь при себе доверенность на получение
                товара или печать организации.</p>
            </div>

            <div class="delivery__item">
              <h2 class="delivery__item-title">Доставка</h2>
              <p class="delivery__item-text">По Новосибирску:</p>
              <p class="delivery__item-text delivery__item-text--ml">1. Курьером с оплатой наличными курьеру (при весе
                до 5кг). Мы работаем с
                сервисом dostavista.ru Стоимость доставки пешим курьером от нашего склада (он находится на ул.Фрунзе 19)
                составит от 150р. (Центральный район) до 600р.
                (Бердск). Более точно вы сможете ознакомиться со стоимостью доставки на сайте самого сервиса.</p>
              <p class="delivery__item-text delivery__item-text--ml">2. Самовывоз — вы можете забрать ваш товар в 19
                кофейнях «Бодрый день» на
                следующий день после заказа и
                оплаты.</p>
              <p class="delivery__item-text">В любом городе РФ куда осуществляют доставку транспортные компании (далее
                ТК). Мы работаем со следующими ТК: ПЭК,
                Деловые линии, Энергия. Доставку до транспортной компании в Новосибирске мы возьмем на себя, если
                стоимость заказа будет
                более 3000р. Стоимость доставки ТК состоит из 3-х этапов: доставка от склада до терминала ТК;
                межтерминальная доставка
                Новосибирск-Ваш город; доставка от термила ТК до вашего адреса.
              </p>
              <p class="delivery__item-text">Почта России. Отправим товар по предоплате или наложенным платежом при
                сумме заказа от 3000р. (комиссия Почты России за
                услугу наложенного платежа оплачивается покупателем). После отправки вышлем Вам реквизиты отправки и Вы
                сможете
                отслеживать этапы доставки до Вашего почтового отделения.</p>

            </div>

          </div><!-- .delivery__items -->
        </div><!-- .container -->
      </div><!-- .delivery__inner -->

    </main><!-- .main .delivery -->

    <? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>