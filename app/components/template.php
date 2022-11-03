<?php
/*
 * Файл local/components/demo/iblock.element/templates/.default/template.php
 */
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$this->setFrameMode(true);
?>

<h1><?php $APPLICATION->ShowTitle(false); /* Выводим «Заголовок страницы» */ ?></h1>

<article id="iblock-element">

  <?php if (!empty($arResult['DETAIL_PICTURE'])) : /* детальная картинка элемента инфоблока */ ?>
  <img src="<?= $arResult['DETAIL_PICTURE']['SRC']; ?>" alt="<?= $arResult['DETAIL_PICTURE']['ALT']; ?>"
    title="<?= $arResult['DETAIL_PICTURE']['TITLE']; ?>" />
  <?php endif; ?>

  <?php if (!empty($arResult['DETAIL_TEXT'])) : /* детальная информация об элементе инфоблока */ ?>
  <div id="iblock-element-detail">
    <?= $arResult['DETAIL_TEXT']; ?>
  </div>
  <?php endif; ?>

  <?php if (!empty($arResult['DISPLAY_PROPERTIES']['GALLERY']['FILE_VALUE'])) : /* галерея для элемента инфоблока */ ?>
  <div id="iblock-element-gallery">
    <?php foreach ($arResult['DISPLAY_PROPERTIES']['GALLERY']['FILE_VALUE'] as $item) : ?>
    <a href="<?= $item['SRC']; ?>"><img src="<?= $item['SRC']; ?>" alt="" /></a>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

  <?php if (!empty($arResult['PROPERTIES']['NOTE']['VALUE']['TEXT'])) : /* примечание к элементу инфоблока */ ?>
  <div id="iblock-element-note">
    <h3>Примечание</h3>
    <div>
      <?php if ($arResult['PROPERTIES']['NOTE']['VALUE']['TYPE'] == 'HTML') : ?>
      <?= $arResult['PROPERTIES']['NOTE']['VALUE']['TEXT']; ?>
      <?php else : ?>
      <?= nl2br($arResult['PROPERTIES']['NOTE']['VALUE']['TEXT']); ?>
      <?php endif; ?>
    </div>
  </div>
  <?php endif; ?>

  <p>Автор публикации: <?= $arResult['PROPERTIES']['AUTHOR']['VALUE']; /* автор публикации */ ?></p>
  <p>Оценка читателей: <?= $arResult['PROPERTIES']['RATING']['VALUE']; /* рейтинг публикации */ ?></p>
  <p>Количество просмотров: <?= $arResult['SHOW_COUNTER'] ? $arResult['SHOW_COUNTER'] : 0; ?></p>
  <p><a href="<?= $arResult['SECTION']['SECTION_PAGE_URL']; ?>">Назад в раздел</a></p>

</article>