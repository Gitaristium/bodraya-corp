<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Спасибо!");
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
if (CModule::IncludeModule("main")) {
  $arEventFields = array(
    "NAME" => $_POST["user_name"],
    "CITY" => $_POST["user_city"],
    "PHONE" => $_POST["user_phone"],
    "EMAIL" => $_POST["user_email"],
    "TEXT" => $_POST["user_text"],
    "PRODUCTS" => $_POST["user_products"]
  );

  CEvent::Send("CORP__shop", SITE_ID, $arEventFields, "N", 8163);

  unset($_POST["NAME"]);
  unset($_POST["CITY"]);
  unset($_POST["PHONE"]);
  unset($_POST["EMAIL"]);
  unset($_POST["TEXT"]);
  unset($_POST["PRODUCTS"]);
}
