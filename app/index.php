<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>
<? $APPLICATION->SetTitle("Бодрый шоп"); ?>
</head>

<body>
  <div id="panel">
    <? $APPLICATION->ShowPanel(); ?>
  </div>
  <div class="wrapper">
    <div class="bg bg-main">
      <span>Секунду, сейчас загрузим :)</span>
    </div>

    <!-- подлючаем меню -->
    <? require($_SERVER["DOCUMENT_ROOT"] . "/menu.php"); ?>

    <main class="main index">
      <div class="index__items">
        <div class="index__item hand">
          <picture>
            <source
              srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/index/hand@2x.webp 2x, <?= SITE_TEMPLATE_PATH ?>/assets/img/index/hand.webp 1x"
              type="image/webp">
            <img class="index__item-img" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/index/hand.jpg"
              srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/index/hand@2x.jpg 2x">
          </picture>
          <div class="index__item-content">
            <h2 class="index__item-title">у меня есть бизнес<br>хочу добавить сервис</h2>
            <p class="index__item-text">Есть действующий бизнес? Улучши его!<br>
              Поможем организовать точку с горячими напитками для твоих клиентов.</p>
            <a class="index__item-btn btn" href="https://easy.bodryi-den.ru/">повысить прибыль</a>
          </div>
        </div>

        <div class="index__item cup">
          <picture>
            <source
              srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/index/cup@2x.webp 2x, <?= SITE_TEMPLATE_PATH ?>/assets/img/index/cup.webp 1x"
              type="image/webp">
            <img class="index__item-img" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/index/cup.jpg"
              srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/index/cup@2x.jpg 2x">
          </picture>
          <div class="index__item-content">
            <h2 class="index__item-title">у меня есть место</h2>
            <a class="index__item-btn btn" href="https://franchise.bodryi-den.ru/">хочу кофейню</a>
          </div>
        </div>

        <div class="index__item grain">
          <picture>
            <source
              srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/index/grain@2x.webp 2x, <?= SITE_TEMPLATE_PATH ?>/assets/img/index/grain.webp 1x"
              type="image/webp">
            <img class="index__item-img" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/index/grain.jpg"
              srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/index/grain@2x.jpg 2x">
          </picture>
          <div class="index__item-content">
            <h2 class="index__item-title">хочу пить кофе<br>и чай дома</h2>
            <a class="index__item-btn btn" href="catalog">каталог</a>
          </div>
        </div>
      </div>

    </main>

    <? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>