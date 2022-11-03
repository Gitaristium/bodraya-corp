<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>
<link rel="preload" as="image" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/contacts/mail.webp">
<? $APPLICATION->SetTitle("Бодрый шоп | Контанты"); ?>
</head>

<body>
  <div class="wrapper">

    <!-- подлючаем меню -->
    <? require($_SERVER["DOCUMENT_ROOT"] . "/menu.php"); ?>

    <main class="main contacts">
      <div class="contacts__box">
        <picture>
          <source
            srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/contacts/mail@2x.webp 2x, <?= SITE_TEMPLATE_PATH ?>/assets/img/contacts/mail.webp 1x"
            type="image/webp">
          <img class="contacts__img" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/contacts/mail.png"
            srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/contacts/mail@2x.png 2x" alt="письмо">
        </picture>
      </div>
      <div class="inner">
        <div class="container">
          <div class="contacts__items">
            <div class="contacts__item">
              <h2 class="contacts__item-title">Контакты</h2>
              <div class="contacts__item-line">
                <picture>
                  <source
                    srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/contacts/mail-small@2x.webp 2x, <?= SITE_TEMPLATE_PATH ?>/assets/img/contacts/mail-small.webp 1x"
                    type="image/webp">
                  <img class="contacts__item-img" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/contacts/mail-small.png"
                    srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/contacts/mail-small@2x.png 2x" alt="mail">
                </picture>
                <a class="contacts__item-text" href="mailto:feedback@bodryi-den.ru">feedback@bodryi-den.ru</a>
              </div>
              <div class="contacts__item-line">
                <picture>
                  <source
                    srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/contacts/phone@2x.webp 2x, <?= SITE_TEMPLATE_PATH ?>/assets/img/contacts/phone.webp 1x"
                    type="image/webp">
                  <img class="contacts__item-img" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/contacts/phone.png"
                    srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/contacts/phone@2x.png 2x" alt="phone">
                </picture>
                <a class="contacts__item-text" href="tel:+7-383-375-00-24">+7-383-375-00-24</a>
              </div>
              <div class="contacts__item-line">
                <picture>
                  <source
                    srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/contacts/map@2x.webp 2x, <?= SITE_TEMPLATE_PATH ?>/assets/img/contacts/map.webp 1x"
                    type="image/webp">
                  <img class="contacts__item-img" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/contacts/map.png"
                    srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/contacts/map@2x.png 2x" alt="map">
                </picture>
                <a class="contacts__item-text" href="https://go.2gis.com/jj61vf" target="_blank">г. Новосибирск<br>ул.
                  Красный проспект,
                  200,
                  офис 820</a>
              </div>
            </div><!-- .contacts__item -->

            <div class="contacts__item">
              <h2 class="contacts__item-title">Напиши нам</h2>
              <form class="contacts__form">
                <div class="contacts__input-box">
                  <input type="text" name="user_name" value="" size="40" class="contacts__input contacts__input-name"
                    id="contacts__input-name" placeholder=" " autocomplete="off">
                  <label for="contacts__input-name" class="contacts__input-label">ФИО</label>
                </div>
                <div class="contacts__input-box">
                  <input type="tel" name="user_phone" value="" id="contacts__input-phone"
                    class="contacts__input contacts__input-phone" size="40" placeholder=" "
                    data-mask="_ (___) ___-__-__" autocomplete="off">
                  <label for="contacts__input-phone" class="contacts__input-label">Телефон</label>
                </div>
                <div class="contacts__input-box">
                  <input type="email" name="user_email" value="" size="40" class="contacts__input contacts__input-email"
                    id="contacts__input-email" placeholder=" " autocomplete="off">
                  <label for="contacts__input-email" class="contacts__input-label">E-mail</label>
                </div>
                <div class="contacts__input-box">
                  <textarea name="user_text" cols="40" rows="10" class="contacts__input contacts__input-textarea"
                    id="contacts__input-textarea" placeholder=" " autocomplete="off"></textarea>
                  <label for="contacts__input-textarea" class="contacts__input-label">Сообщение</label>
                </div>
                <button class="contacts__input-btn btn">отправить</button>
              </form>
            </div>

          </div><!-- .contacts__items -->
        </div><!-- .container -->
      </div><!-- .contacts -->

    </main><!-- .main .contacts -->



    <? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>