<!-- получаем URL и вычисляем раздел/товар -->
<?
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$url = parse_url($url);
$url['sections'] = explode('/', $url['path']);

$category = $url['sections'][2];
$product = $url['sections'][3];
?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php"); ?>
<? $APPLICATION->SetTitle("Бодрый шоп | Каталог"); ?>
</head>






<body>
  <div id="panel">
    <? $APPLICATION->ShowPanel(); ?>
  </div>
  <div class="wrapper">

    <!-- подлючаем меню -->
    <? require($_SERVER["DOCUMENT_ROOT"] . "/menu.php"); ?>

    <!-- для каталога -->
    <? if (!$category) : ?>
      <? require($_SERVER["DOCUMENT_ROOT"] . "/catalog/catalog.php"); ?>
    <? endif; ?>

    <!-- для категории -->
    <? if ($category && !$product) : ?>
      <? require($_SERVER["DOCUMENT_ROOT"] . "/catalog/category.php"); ?>
    <? endif; ?>

    <!-- для страницы товара -->
    <? if ($category && $product) : ?>
      <? require($_SERVER["DOCUMENT_ROOT"] . "/catalog/product.php"); ?>
    <? endif; ?>

  </div>
  <? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>