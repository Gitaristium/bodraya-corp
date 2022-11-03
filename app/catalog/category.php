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

 <main class="main category">
   <div class="inner category__inner">
     <div class="container">
       <div class="breadcrumbs">
         <a class="breadcrumbs-link" href="<? SITE_DIR ?>/catalog">каталог</a> / <?= $catNAME ?>
       </div>
       <div class="category__desc">
         <h1 class="category__title"><?= $catNAME ?></h1>
         <div class="category__text"><?= $catDESC ?></div>
       </div>
       <div class="category__items">
         <?
          $dbEl = CIBlockElement::GetList(
            array(),
            array(
              'ACTIVE' => 'Y',
              'IBLOCK_ID' => 29,
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
            $picID = $props['VALUE'][0];
            $picUrl = CFile::GetPath($picID); ?>

         <div class="category__item">
           <a class="category__item-cover" href="<?= $obItemURL ?>">
             <img class="category__item-img" src="<?= $picUrl ?>" alt="<?= $obItemNAME ?>">
           </a>
           <div class="category__item-desc">
             <a class="category__item-name" href="<?= $obItemURL ?>"><?= $obItemNAME ?></a>
             <div class="category__item-text"><?= $obItemDESC ?></div>
           </div>
           <div class="category__item-price">
             <?= $obItemPRICE ?><span>&#8381</span>
           </div>
           <div class="category__item-buttons item-buttons">
             <div class="item-buttons__numblock">
               <span class="item-buttons__numblock-span-<?= $obItemID ?>">добавили :)</span>
               <button class="item-buttons__btn item-buttons__btn--minus" id="item-minus-<?= $obItemID ?>"><i
                   class="fas fa-minus"></i></button>
               <input class="item-buttons__number" name="item-buttons__number" readonly type="number"
                 id="item-num-<?= $obItemID ?>" value="0" min="0" max="999" oninput="validity.valid||(value='');">
               <button class="item-buttons__btn item-buttons__btn--plus" id="item-plus-<?= $obItemID ?>"><i
                   class="fas fa-plus"></i></button>
             </div>
             <button class="item-buttons__btn-buy btn" id="item-buy-<?= $obItemID ?>">в корзину</button>
           </div>
         </div>

         <?
          }
          ?>
       </div><!-- .category__items -->
     </div><!-- .container -->
   </div><!-- .inner -->
 </main><!-- .main .category -->