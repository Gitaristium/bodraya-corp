<!-- меню для главной -->
<? if ($APPLICATION->GetCurPage(false) === '/') : ?>
<header class="header index">
  <div class="header__inner">
    <a href="<?= SITE_DIR ?>">
      <picture>
        <source
          srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/logo@2x.webp 2x, <?= SITE_TEMPLATE_PATH ?>/assets/img/logo.webp 1x"
          type="image/webp">
        <img class="logo index" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/logo.png"
          srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/logo@2x.png 2x">
      </picture>
    </a>
  </div><!-- .header__inner -->
</header>
<? endif; ?>


<!-- меню для остальных страниц -->
<? if ($APPLICATION->GetCurPage(false) !== '/') : ?>

<div class="modal" id="basket-modal">
  <div class="modal__bg"></div>
  <div class="basket" id="basket">
    <div class="basket__inner">

      <div class="basket__head">
        <div class="basket__arrows">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="basket__title">корзина</div>
        <div class="basket__close">
          <span></span>
          <span></span>
        </div>
      </div>

      <div class="basket__content">
        <div class="basket-slider--empty">добавь<br>что-нибудь<br>из каталога</div>
        <div class="basket-slider">
        </div><!-- .basket-slider -->
      </div><!-- .basket__content -->

      <div class="basket__footer">
        <div class="basket__footer-qty">
          <div>Товары (<span class="basket__footer-qty--sum">0</span>)</div>
        </div>
        <div class="basket__footer-sum">
          <div>Итого</div>
          <div><span class="basket__footer-sum--sum">0</span><span>&#8381</span></div>
        </div>
        <button class="basket__footer-btn-buy btn" id="basket__footer-btn-buy">оформить покупку</button>
      </div><!-- .basket__footer -->

      <div class="contacts__item" id="basket-form">
        <div class="contacts__item-inner">
          <div class="form__close">
            <i class="fas fa-angle-left"></i> к корзине
          </div>
          <div class="contacts__item-title">Оформление</div>
          <form class="contacts__form" action="" method="POST" id="ajax_modal">
            <div class="contacts__input-box">
              <input type="text" name="user_name" value="" size="40" class="contacts__input contacts__input-name"
                id="modal__input-name" placeholder=" " autocomplete="off">
              <label for="modal__input-name" class="contacts__input-label">ФИО</label>
            </div>
            <div class="contacts__input-box">
              <input type="text" name="user_city" value="" size="40" class="contacts__input contacts__input-city"
                id="modal__input-city" placeholder=" " autocomplete="off">
              <label for="modal__input-city" class="contacts__input-label">Город</label>
            </div>
            <div class="contacts__input-box">
              <input type="tel" name="user_phone" value="" id="modal__input-phone"
                class="contacts__input contacts__input-phone" size="40" placeholder=" " data-mask="_ (___) ___-__-__"
                autocomplete="off">
              <label for="modal__input-phone" class="contacts__input-label">Телефон</label>
            </div>
            <div class="contacts__input-box">
              <input type="email" name="user_email" value="" size="40" class="contacts__input contacts__input-email"
                id="modal__input-email" placeholder=" " autocomplete="off">
              <label for="modal__input-email" class="contacts__input-label">E-mail</label>
            </div>
            <div class="contacts__input-box">
              <textarea name="user_text" cols="40" rows="10" class="contacts__input contacts__input-textarea"
                id="modal__input-textarea" placeholder=" " autocomplete="off"></textarea>
              <label for="modal__input-textarea" class="contacts__input-label">Сообщение</label>
            </div>
            <textarea name="user_products" class="contacts__input contacts__input-products" id="modal__input-products"
              placeholder=" " autocomplete="off"></textarea>
            <button class="basket__footer-btn-buy btn" id="btn-ajax-modal">оставить заявку</button>
          </form>
        </div>

      </div><!-- .basket__inner -->
    </div><!-- .contacts__item -->

  </div><!-- .basket -->

</div><!-- .modal #basket-modal -->

<div class="modal" id="burger-modal">
  <div class="modal__bg"></div>
  <div class="burger__menu">
    <ul class="burger__menu-list">
      <li class="burger__menu-item"><a class="burger__menu-link" href="<?= SITE_DIR ?>">Главная</a></li>
      <li class="burger__menu-item"><a
          class="burger__menu-link <? if (strpos($APPLICATION->GetCurDir(), '/catalog/') !== false) : ?>active<? endif; ?>"
          href="<? SITE_DIR ?>/catalog">Каталог</a></li>
      <li class="burger__menu-item"><a
          class="burger__menu-link <? if ($APPLICATION->GetCurPage(false) === '/delivery/') : ?>active<? endif; ?>"
          href="<? SITE_DIR ?>/delivery">Оплата и доставка</a></li>
      <li class="burger__menu-item"><a
          class="burger__menu-link <? if ($APPLICATION->GetCurPage(false) === '/about/') : ?>active<? endif; ?>"
          href="#">О компании</a></li>
      <li class="burger__menu-item"><a
          class="burger__menu-link <? if ($APPLICATION->GetCurPage(false) === '/contacts/') : ?>active<? endif; ?>"
          href="<? SITE_DIR ?>/contacts">Контакты</a></li>
      </li>
    </ul>
  </div>
</div><!-- .modal #burger-modal -->

<div class="bg 
<? if (strpos($APPLICATION->GetCurDir(), '/catalog/') !== false) : ?>bg-catalog<? endif; ?>
<? if ($APPLICATION->GetCurPage(false) === '/delivery/') : ?>bg-delivery<? endif; ?>
<? if ($APPLICATION->GetCurPage(false) === '/about/') : ?>bg-about<? endif; ?>
<? if ($APPLICATION->GetCurPage(false) === '/contacts/') : ?>bg-contacts<? endif; ?>
">
  <span>Секунду, сейчас загрузим :)</span>
</div>
<header class="header <? if (strpos($APPLICATION->GetCurDir(), '/catalog/') !== false) : ?>header-catalog<? endif; ?>">
  <div class="header__inner">
    <a href="<?= SITE_DIR ?>">
      <picture>
        <source
          srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/logo@2x.webp 2x, <?= SITE_TEMPLATE_PATH ?>/assets/img/logo.webp 1x"
          type="image/webp">
        <img class="logo" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/logo.png"
          srcset="<?= SITE_TEMPLATE_PATH ?>/assets/img/logo@2x.png 2x">
      </picture>
    </a>
    <div class="header__menu">
      <ul class="header__menu-list">
        <li class="header__menu-item"><a class="header__menu-link" href="<?= SITE_DIR ?>">Главная</a></li>
        <li class="header__menu-item"><a
            class="header__menu-link <? if (strpos($APPLICATION->GetCurDir(), '/catalog/') !== false) : ?>active<? endif; ?>"
            href="<? SITE_DIR ?>/catalog">Каталог</a></li>
        <li class="header__menu-item"><a
            class="header__menu-link <? if ($APPLICATION->GetCurPage(false) === '/delivery/') : ?>active<? endif; ?>"
            href="<? SITE_DIR ?>/delivery">Оплата и доставка</a></li>
        <li class="header__menu-item"><a
            class="header__menu-link <? if ($APPLICATION->GetCurPage(false) === '/about/') : ?>active<? endif; ?>"
            href="#">О компании</a></li>
        <li class="header__menu-item"><a
            class="header__menu-link <? if ($APPLICATION->GetCurPage(false) === '/contacts/') : ?>active<? endif; ?>"
            href="<? SITE_DIR ?>/contacts">Контакты</a></li>
        </li>
      </ul>
      <a class="header__menu-link--cafe" href="#"><span>Хочу кофейню</span></a>
    </div><!-- .header__menu -->

    <button class="header__cart" id="basket-btn">
      <i class="fas fa-shopping-cart"></i>
      <span id="basket-qty">0</span>
    </button>

    <button class="burger">
      <div class="burger__btn"></div>
    </button>
  </div><!-- .header__inner -->
</header>

<? endif; ?>