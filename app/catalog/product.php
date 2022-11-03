<?
CModule::IncludeModule('iblock');

$dbCat = CIBlockSection::GetList(
  array(),
  array('CODE' => $category),
  false
);
while ($obCat = $dbCat->GetNext()) {
  $catNAME = $obCat['NAME'];
  $catDESC = $obCat['DESCRIPTION'];
}
?>
<main class="main product">
  <div class="inner product__inner">
    <div class="container">

      <?
      $dbEl = CIBlockElement::GetList(
        array(),
        array(
          'ACTIVE' => 'Y',
          'IBLOCK_ID' => 29,
          'CODE' => $product,
          'SECTION_CODE' => $category
        ),
        false,
        false,
        array('IBLOCK_ID', 'ID', 'NAME', 'DETAIL_PAGE_URL', 'PROPERTY_PRICE', 'PROPERTY_DESCRIPTION')
      );
      while ($obEl = $dbEl->GetNextElement()) {
        $obItem = $obEl->fields;
        $obItemID = $obItem['ID'];
        $obItemNAME =  $obItem['NAME'];
        $obItemURL =  $obItem['DETAIL_PAGE_URL'];
        $obItemPRICE =  $obItem['PROPERTY_PRICE_VALUE'];
        $obItemDESC =  $obItem['PROPERTY_DESCRIPTION_VALUE'];
        $props = $obEl->GetProperty('PICTURES');
        $props = $props['VALUE'];
      ?>
      <div class="breadcrumbs">
        <a class="breadcrumbs-link" href="<? SITE_DIR ?>/catalog">каталог</a> / <a class="breadcrumbs-link"
          href="<? SITE_DIR ?>/catalog/<?= $category; ?>"><?= $catNAME ?></a> / <?= $obItemNAME ?>
      </div>
      <div class="product__item">
        <div class="product__item-block-left">
          <div class="product__slider-for">
            <?
              foreach ($props as $key => $picID) {
                $picUrl = CFile::GetPath($picID);
              ?>
            <div class="product__img-cover">
              <img class="product__item-img" src="<?= $picUrl ?>" alt="<?= $obItemNAME ?>">
            </div>

            <?
              }
              ?>

          </div><!-- .product__slider-for -->
        </div>
        <div class="product__item-block-right">
          <div class="product__item-block-top">
            <div class="product__item-desc">
              <div class="product__item-name"><?= $obItemNAME ?></div>
              <div class="product__item-text"><?= $obItemDESC ?></div>
            </div>
            <div class="product__item-block-btn">
              <div class="product__item-price">
                <?= $obItemPRICE ?><span>&#8381</span>
              </div>
              <div class="product__item-buttons item-buttons">
                <div class="item-buttons__numblock">
                  <span class="item-buttons__numblock-span-<?= $obItemID ?>">добавили :)</span>
                  <button class="item-buttons__btn item-buttons__btn--minus" id="item-minus-<?= $obItemID ?>">
                    <i class="fas fa-minus"></i>
                  </button>
                  <input class="item-buttons__number" name="item-buttons__number" readonly type="number"
                    id="item-num-<?= $obItemID ?>" value="0" min="0" max="999" oninput="validity.valid||(value='');">
                  <button class="item-buttons__btn item-buttons__btn--plus" id="item-plus-<?= $obItemID ?>">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
                <button class="item-buttons__btn-buy btn" id="item-buy-<?= $obItemID ?>">в корзину</button>
              </div>
            </div><!-- .product__item-block-btn -->
          </div><!-- .product__item-block-top -->
          <div class="product__item-block-bottom">
            <div class="product__slider-nav">
              <?
                foreach ($props as $key => $picID) {
                  $picUrl = CFile::GetPath($picID);
                ?>

              <img class="product__item-img--nav" src="<?= $picUrl ?>" alt="<?= $obItemNAME ?>">
              <?
                }
                ?>
            </div><!-- .product__slider-nav -->
          </div><!-- .product__item-block-bottom -->
        </div><!-- .product__item-block-right -->
      </div><!-- .product__item -->

      <?
      }
      ?>

    </div><!-- .container -->
  </div><!-- .inner -->
</main><!-- .main .product -->