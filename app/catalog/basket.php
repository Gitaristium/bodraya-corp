<?
if (isset($_GET["id"]) && isset($_GET["value"])) {
  $productID =  preg_replace("/[^,.0-9]/", '', $_GET["id"]);
  $value = $_GET["value"];
}
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
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

$dbEl = CIBlockElement::GetList(
  array(),
  array(
    'ACTIVE' => 'Y',
    'IBLOCK_ID' => 29,
    'ID' => $productID
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
  $picUrl = CFile::GetPath($picID);
  $newElement = array('NAME' => $obItemNAME, 'PRICE' => $obItemPRICE, 'DESC' => $obItemDESC, 'PICURL' => $picUrl);
  echo json_encode($newElement);
}