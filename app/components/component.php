<?php
/*
 * Файл local/components/demo/iblock.element/component.php
 */
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if (!CModule::IncludeModule('iblock')) {
  ShowError('Модуль «Информационные блоки» не установлен');
  return;
}

/*...*/

if ($this->StartResultCache(false, ($arParams['CACHE_GROUPS'] === 'N' ? false : $USER->GetGroups()))) {

  // какие поля элемента инфоблока выбираем
  $arSelect = array(
    'ID',         // идентификатор элемента
    'CODE',         // код элемента
    'NAME',       // название этого элемента
    /*...*/
    'PROPERTY_*', // пользовательские свойства
  );
  // условия выборки элемента инфоблока
  $arFilter = array(
    /*...*/);

  // выполняем запрос к базе данных
  $rsElement = CIBlockElement::GetList(
    array(),   // сортировка
    $arFilter, // фильтр
    false,     // группировка
    false,     // постраничная навигация
    $arSelect  // поля
  );

  // устанавливаем шаблоны путей для раздела и элемента
  $rsElement->SetUrlTemplates($arParams['ELEMENT_URL'], $arParams['SECTION_URL']);

  if ($obElement = $rsElement->GetNextElement()) {

    $arResult = $obElement->GetFields();

    // пользовательские свойства
    $arResult['PROPERTIES'] = $obElement->GetProperties();

    // получаем значения пользовательских свойств в удобном для отображения виде
    foreach ($arResult['PROPERTIES'] as $code => $data) {
      $arResult['DISPLAY_PROPERTIES'][$code] = CIBlockFormatProperties::GetDisplayValue($arResult, $data, '');
    }

    /*
    * Добавляем в массив arResult дополнительные элементы, которые могут потребоваться в шаблоне
    */

    /*...*/
  }

  if (isset($arResult['ID'])) {
    $this->SetResultCacheKeys(
      /*...*/);
    $this->IncludeComponentTemplate();
  } else {
    $this->AbortResultCache();
    \Bitrix\Iblock\Component\Tools::process404(
      /*...*/);
  }
}