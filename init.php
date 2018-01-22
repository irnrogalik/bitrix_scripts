<?php

session_start();
if (!$_SESSION['started']) {
    $_SESSION['started'] = time();
}
define('TIME_FOR_POPUP', 1800);
define("IBLOCK_CATALOG", 4);
define("IBLOCK_MAP", 17);
define('STORE_IBLOCK_ID', 19);
define('COLLECTION_SEVER', "Sever");
define('STORE_OFFERS_IBLOCK_ID', 20);
define('NABOR_IBLOCK_ID', 18);
define('FURNITURE_IBLOCK_ID', 5);

define('INSTALL_TRANSOMS_ON_REQUEST_YES', "dcb31d4fb1a35663a678452b4c105ee5");

define('COLORS_STEELLAK', "3f56dfc6600549cfeb17553c6b2f1584");
define('COLORS_STEELTEX', "2c584b7090f487885102cf8e1ad55564");
define('COLORS_OAKPANEL', "bc6bed571069330ff2a1b80991b1d62e");
define('COLORS_EKOSHPON', "08454a6d56669dd28c9b1b72d39abec2");
define('COLORS_PVC', "7c2c9ec94433a1e41fd37b6908c01ed9");
define('COLORS_RENOLIT', "9427499a089afb02c08cd3b546162f4a");
define('COLORS_HDF', "2854ab3662a066c3ba13b1a05d5f1f7b");
define('COLORS_POLYMER', "93fcbaf8b8d2e388498f747be994a0d4");
define('COLORS_PATINIROVANIE', "f64376e783896235028c7790de9ab63f");

define('PORTAL_LOGO', "f3148379c7c4cd7cd76c3c474eaf9c9d");
define('PORTAL_NICE', "6fc402f3dff99e5de0cbd1452cca876a");
define('PORTAL_VISANTIYA', "7b59f46e91dd57e2100119cb6ad47925");
define('PORTAL_ARKA', "3973bcebfc45eb1f1fc78900b18da1f0");
define('PORTAL_KATRIN', "595d346fcb396af2334bd6768987cf03");
define('PORTAL_POLO', "eac18ca2ba15b393185e44f5c144bdef");

define('LOCK_STANDART', "d6502932e16aa3c3bade6d2d1c084b9c");
define('LOCK_OPTIMA', "813e85cbd815c979fca80e608b7fa4ad");
define('LOCK_PROFI', "5832f10d932fe292e2b74887047e2573");
define('LOCK_PREMIUM', "04e4a0c1610ff8c2f2f7c1ddb728af0f");
define('LOCK_RUCHKI', "6b1e42305638298553c7b8c5288e04ec");

if (strpos($_SERVER["REQUEST_URI"], "vkhodnye-dveri-v-nalichii") !== false) {
    define("V_KATEGORII_VNALICHII", true);
} else {
    define("V_KATEGORII_VNALICHII", false);
}
define("KATEGORIYA_VNALICHII", 42);
define("SALOONS", "623,619,616");
define("VEL_CODE", "+375 (44)");
define("VEL_CODE_2", "+375 44");
define("VEL_PHONE", "770-48-04");
define("MTS_CODE", "+375 (33)");
define("MTS_CODE_2", "+375 33");
define("MTS_PHONE", "337-17-11");
define("MTS_PHONE_CARD", "+375 33 337-17-11");
define("VELCOM_PHONE_CARD", "+375 44 770-48-04");

define("RECLAMATION_PHONE_V", "+375 29 618-08-26");
define("RECLAMATION_PHONE_M", "+375 29 583-17-13");

define("OOO", "ООО «Дверной сезон»");
define("UNP", "790823530");
define("DATE_REGISTER", "В Торговом реестре с 26.03.2015 УНП 790823530");
define("STATE_REGISTRATION", "Свидетельство о&nbsp;гос. регистрации выдано <br>Могилёвским облисполком от&nbsp;12.04.13");
define("CITY", "");
define("ADRESS", "213105, Республика&nbsp;Беларусь, Могилёвская&nbsp;обл., Могилёвский&nbsp;р-н, Вейнянский&nbsp;с/с, 18, офис&nbsp;46");
define("WORK_WEEKDAYS", "пн — сб: 10:00–20:00");
define("WORK_WEEKEND", "вс: 10:00–18:00");
define("FROM", "10:00");
define("TO", "19:00");

define("WORK_TIME", "Пн-Пт с 10 до 20, Сб-Вс с 10 до 18");
define("WORK_TIME_FOOT", "Пн-Пт с 10 до 20<br>Сб-Вс с 10 до 18");

define("EMAIL", "manager@ds-steelline.by");

function forBlur($fid) {
    $file = CFile::ResizeImageGet($fid, array('width' => 24, 'height' => 49), BX_RESIZE_IMAGE_PROPORTIONAL);
    return $file['src'];
}

function forCatalog($fid) {
    $file = CFile::ResizeImageGet($fid, array('width' => 159, 'height' => 337), BX_RESIZE_IMAGE_PROPORTIONAL);
    return $file['src'];
}

function forCatalogDouble($fid) {
    $file = CFile::ResizeImageGet($fid, array('width' => 240, 'height' => 380), BX_RESIZE_IMAGE_PROPORTIONAL);
    return $file['src'];
}

function forBlurReview($fid) {
    $file = CFile::ResizeImageGet($fid, array('width' => 20, 'height' => 34), BX_RESIZE_IMAGE_PROPORTIONAL);
    return $file['src'];
}

function forReview($fid) {
    $file = CFile::ResizeImageGet($fid, array('width' => 200, 'height' => 340), BX_RESIZE_IMAGE_PROPORTIONAL);
    return $file['src'];
}

function is_main() {
    global $APPLICATION;
    return $APPLICATION->GetCurPage(false) === '/';
}

function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}

function makeProps($props, $MAIN_CHARS = []) {
    $new_props = [];
    foreach ($props as $code => $val) {
        if (!$val["VALUE"]) {
            continue;
        }
        if (strpos($code, "CHARAKTER_") !== 0) {
            continue;
        }
        preg_match("#CHARAKTER_([^_]*)(_|$)#s", $code, $matches);
        $prop_code = $matches[1];
        if (endsWith($code, "_MAIN")) {
            if (in_array($code, $MAIN_CHARS)) {

                $new_props["MAIN"][] = $val;
            }
        }

        if (endsWith($code, "_IN") || endsWith($code, "_OUT")) {
            preg_match("#CHARAKTER_(.*?)(_IN|_OUT)$#s", $code, $sections);
        } else {
            preg_match("#CHARAKTER_(.*+)$#s", $code, $sections);
        }
        $section = $sections[1];

        if (!$section) {
            continue;
        }

        if (!$new_props[$prop_code][$section]) {
            if ($sections[2]) {
                $key = "THEAD_{$prop_code}{$sections[2]}";
            } else {
                $key = "THEAD_{$prop_code}_VALUE";
            }
            $val["NAME"] = preg_replace("# снаружи| внутри#", "", $val["NAME"]);
            if ($val["HINT"]) {
                $val["NAME"] .= " ({$val["HINT"]})";
            }
            $new_props[$prop_code][$section] = ["THEAD_{$prop_code}_NAME" => $val["NAME"], $key => $val["VALUE"], "HINT" => $val["HINT"]];
        } else {
            if ($sections[2]) {
                $key = "THEAD_{$prop_code}{$sections[2]}";
            } else {
                $key = "THEAD_{$prop_code}_VALUE";
            }
            $new_props[$prop_code][$section][$key] = $val["VALUE"];
        }
    }
    return $new_props;
}

function minP($a, $b) {
    if ($a["MIN_PRICE"]["DISCOUNT_VALUE"] < $a["MIN_PRICE"]["VALUE"]) {
        $as = true;
    }
    if ($b["MIN_PRICE"]["DISCOUNT_VALUE"] < $b["MIN_PRICE"]["VALUE"]) {
        $bs = true;
    }
    if ($as !== $bs) {
        return $as === true ? -1 : 1;
    }
    if ($a["MIN_PRICE"]["DISCOUNT_VALUE"] == $b["MIN_PRICE"]["DISCOUNT_VALUE"]) {
        if ($a["SORT"] != $b["SORT"]) {
            if ($a["SORT"] < $b["SORT"]) {
                return -1;
            } elseif ($a["SORT"] > $b["SORT"]) {
                return 1;
            }
        } else {
            return ($a["ID"] < $b["ID"]) ? -1 : 1;
        }
    }
    return ($a["MIN_PRICE"]["DISCOUNT_VALUE"] < $b["MIN_PRICE"]["DISCOUNT_VALUE"]) ? -1 : 1;
}

function minSort($a, $b) {
    return ($a["SORT"] < $b["SORT"]) ? -1 : 1;
}

function getPriceWithDiscount($ID) {

    if (CModule::IncludeModule('sale')) {
        global $USER;
        $dbPrice = CPrice::GetList(
                        [], ["PRODUCT_ID" => $ID, "CATALOG_GROUP_ID" => 1], false, false, ["ID", "CATALOG_GROUP_ID", "PRODUCT_ID", "PRICE", "CURRENCY", "QUANTITY_FROM", "QUANTITY_TO"]
        );

        if ($arPrice = $dbPrice->fetch()) {

            $arDiscounts = CCatalogDiscount::GetDiscountByPrice(
                            $arPrice["ID"], $USER->GetUserGroupArray(), "N", SITE_ID
            );
            $discountPrice = CCatalogProduct::CountPriceWithDiscount(
                            $arPrice["PRICE"], $arPrice["CURRENCY"], $arDiscounts
            );
            $arPrice["DISCOUNT_PRICE"] = $discountPrice;
            return $arPrice;
        }
    }
}

function getOffersWithMinPrice($PRODUCT_ID, $all = false, $sort = false) {
    CModule::IncludeModule('iblock');
    $arSelect = ["ID", "IBLOCK_ID", "NAME", "SORT", "DETAIL_PICTURE"];
    $arFilter = ["PROPERTY_CML2_LINK" => $PRODUCT_ID, "ACTIVE" => "Y", "!IBLOCK_ID" => 26];
    if ($sort) {
        $arSort = ["SORT" => "asc"];
    } else {
        $arSort = [];
    }
    $res = CIBlockElement::GetList($arSort, $arFilter, false, false, $arSelect);
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $arProps = $ob->GetProperties();
        $offer["ID"] = $arFields["ID"];
        $offer["NAME"] = $arFields["NAME"];
        if ($arFields["DETAIL_PICTURE"]) {
            $offer["DETAIL_PICTURE_ID"] = $arFields["DETAIL_PICTURE"];
            $offer["DETAIL_PICTURE"] = CFile::GetPath($arFields["DETAIL_PICTURE"]);
        } else {
            $offer["DETAIL_PICTURE"] = EMPTY_PHOTO_SRC;
        }
        if ($arProps["DECOR_PHOTO_IN"]["VALUE"]) {
            $offer["DETAIL_PICTURE2_ID"] = $arProps["DECOR_PHOTO_IN"]["VALUE"];
            $offer["DETAIL_PICTURE_2"] = CFile::GetPath($arProps["DECOR_PHOTO_IN"]["VALUE"]);
        } else {
            $offer["DETAIL_PICTURE_2"] = EMPTY_PHOTO_SRC;
        }
        $MIN_PRICE = getPriceWithDiscount($offer["ID"]);
        $offer["MIN_PRICE"]["VALUE"] = round($MIN_PRICE["PRICE"]);
        $offer["MIN_PRICE"]["DISCOUNT_VALUE"] = round($MIN_PRICE["DISCOUNT_PRICE"]);
        $offers[] = $offer;
    }
    if (!$sort) {
        usort($offers, "minP");
    }
    if (!$all) {
        return $offers[0];
    } else {
        return $offers;
    }
}

if (strstr($_SERVER['HTTP_USER_AGENT'], 'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'], 'iPod') || strstr($_SERVER['HTTP_USER_AGENT'], 'Android') || strstr($_SERVER['HTTP_USER_AGENT'], 'Windows Phone')) {
    define("SHOW_TRIGGER_MOBILE", true);
} else {
    define("SHOW_TRIGGER_MOBILE", false);
}


if ($_SERVER["HTTP_HOST"] == "m.ds-steelline.by")
    define("MOBILE", true);
else
    define("MOBILE", false);

function GET_SALE_FILTER($all = false) {
    CModule::IncludeModule("catalog");
    CModule::IncludeModule("iblock");
    global $DB;
    $arDiscountElementID = array();
    $dbProductDiscounts = CCatalogDiscount::GetList(
                    array("SORT" => "ASC"), array(
                "ACTIVE" => "Y",
                "!>ACTIVE_FROM" => $DB->FormatDate(date("Y-m-d H:i:s"), "YYYY-MM-DD HH:MI:SS", CSite::GetDateFormat("FULL")),
                "!<ACTIVE_TO" => $DB->FormatDate(date("Y-m-d H:i:s"), "YYYY-MM-DD HH:MI:SS", CSite::GetDateFormat("FULL")),
                    ), false, false, array(
                "*"
                    )
    );
    while ($arProductDiscounts = $dbProductDiscounts->Fetch()) {

        if (!$arProductDiscounts["PRODUCT_ID"]) {
            $det = unserialize($arProductDiscounts["CONDITIONS"]);
            foreach ($det["CHILDREN"] as $clild) {
                $cond = explode(":", $clild["CLASS_ID"]);
                $IB_ID = $cond[1];
                $IB_P = $cond[2];
                $filter = ["IBLOCK_ID" => $IB_ID, "PROPERTY_" . $IB_P => $clild["DATA"]["value"]];
                $res = CIBlockElement::GetList(Array(), $filter, false, false, ["ID"]);
                while ($ob = $res->GetNextElement()) {
                    $arFields = $ob->GetFields();
                    $IDS[] = $arFields["ID"];
                }
            }
            continue;
        }

        if (isset($arProductDiscounts["SECTION_ID"])) {
            $FILTER["SECTION_ID"][] = $arProductDiscounts["SECTION_ID"];
        } elseif ($arProductDiscounts["PRODUCT_ID"]) {
            if ($res = CCatalogDiscount::GetDiscountProductsList(array(), array("=DISCOUNT_ID" => $arProductDiscounts['ID']), false, false, array())) {
                while ($ob = $res->GetNext()) {

                    if (!in_array($ob["PRODUCT_ID"], $arDiscountElementID)) {
                        $IDS[] = $ob["PRODUCT_ID"];
                        $Discounts[] = $ob;
                    }
                }
            }
        }
    }

    if ($IDS) {
        $arSelect = Array("ID", "IBLOCK_ID", "PROPERTY_CML2_LINK");
        $FILTER = ["ID" => $IDS];
        $FILTER["ACTIVE_DATE"] = "Y";

        $FILTER["ACTIVE"] = "Y";
        $FILTER["GLOBAL_ACTIVE"] = "Y";
        $res = CIBlockElement::GetList(Array(), $FILTER, false, false, $arSelect);
        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();
            if ($arFields["IBLOCK_ID"] == 22) {
                $id = $arFields["ID"];
            } elseif ($arFields["IBLOCK_ID"] == 21) {
                $id = $arFields["PROPERTY_CML2_LINK_VALUE"];
            }
            $arDiscountElementID[] = $id;
        }
    }
    if ($FILTER["SECTION_ID"]) {
        $arSelect = Array("ID", "IBLOCK_ID", "PROPERTY_CML2_LINK");
        $arFilter = $FILTER;
        $FILTER["ACTIVE_DATE"] = "Y";
        $FILTER["ACTIVE"] = "Y";
        $res = CIBlockElement::GetList(Array(), $FILTER, false, false, $arSelect);
        while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();

            if ($arFields["PROPERTY_CML2_LINK_VALUE"]) {
                $id = $arFields["PROPERTY_CML2_LINK_VALUE"];
            } else {
                $id = $arFields["ID"];
            }
            $arDiscountElementID[] = $id;
        }
    }
    if ($all)
        return $Discounts;

    return $arDiscountElementID;
}

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

function GetHBlock($hlblock_id, $arFilter = array(), $arSort = ["UF_SORT" => "ASC"], $arSelect = ["*"]) {
    CModule::IncludeModule("highloadblock");

    $hlblock = HL\HighloadBlockTable::getById($hlblock_id)->fetch();
    $entity = HL\HighloadBlockTable::compileEntity($hlblock);

    $entity_data_class = $entity->getDataClass();
    $entity_table_name = $hlblock['TABLE_NAME'];

    $sTableID = 'tbl_' . $entity_table_name;
    $rsData = $entity_data_class::getList(array(
                "select" => $arSelect,
                "filter" => $arFilter,
                "order" => $arSort
    ));
    $rsData = new CDBResult($rsData, $sTableID);
    while ($arRes = $rsData->Fetch()) {
        $Result[] = $arRes;
    }
    return $Result;
}

function addHBlock($hlblock_id, $data) {
    if (empty($data))
        return;
    CModule::IncludeModule("highloadblock");

    $hlblock = HL\HighloadBlockTable::getById($hlblock_id)->fetch();
    $entity = HL\HighloadBlockTable::compileEntity($hlblock);

    $entity_data_class = $entity->getDataClass();
    $entity_data_class::add($data);
}

function editHBlock($hlblock_id, $id, $data) {
    if (empty($data))
        return;
    CModule::IncludeModule("highloadblock");

    $hlblock = HL\HighloadBlockTable::getById($hlblock_id)->fetch();
    $entity = HL\HighloadBlockTable::compileEntity($hlblock);

    $entity_data_class = $entity->getDataClass();
    $entity_data_class::update($id, $data);
}

function formatter($val, $br = true) {
    $val = number_format($val, 0, " ", " ");
    if ($br)
        $val .= " Br";
    return $val;
}

function toPrice($price) {
    $newprice = number_format($price, 0, " ", " ");
    return $newprice;
}

AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", "DoIBlockBeforeSave");
AddEventHandler("iblock", "OnBeforeIBlockElementAdd", "DoIBlockBeforeSave");
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", "DoIBlockAfterSave");
AddEventHandler("iblock", "OnAfterIBlockElementAdd", "DoIBlockAfterSave");
AddEventHandler("catalog", "OnPriceAdd", "DoIBlockAfterSave");
AddEventHandler("catalog", "OnPriceUpdate", "DoIBlockAfterSave");
AddEventHandler("search", "BeforeIndex", "BeforeIndexHandler");
AddEventHandler("sale", "OnBeforeBasketAdd", "BeforeBasketAddHandler");

function BeforeBasketAddHandler($arFields) {
    if ($arFields["PRODUCT_ID"]) {
        if (CModule::IncludeModule("sale")) {
            CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID());
        }
    }
}

function DoIBlockBeforeSave($arg1) {

    if ($arg1['IBLOCK_ID'] == 21) {
        foreach ($arg1["PROPERTY_VALUES"][328] as $imgarr) {
            if ($imgarr["VALUE"]["tmp_name"]) {
                $img = $imgarr["VALUE"]["tmp_name"];
                list($width, $height, $type, $attr) = getimagesize($img);
                $rif = CFile::ResizeImageFile(
                                $sourceFile = $img, $destinationFile = $_SERVER['DOCUMENT_ROOT'] . "/upload/1.png", $arSize = array('width' => $width, 'height' => $height), $resizeType = BX_RESIZE_IMAGE_PROPORTIONAL, $arWaterMark = array(), $jpgQuality = false, $arFilters = Array(
                            array("name" => "watermark", "position" => "bottomright", "size" => "real", "file" => $_SERVER['DOCUMENT_ROOT'] . "/upload/watermarker.png")
                                )
                );
                unlink($img);
                rename($_SERVER['DOCUMENT_ROOT'] . "/upload/1.png", $img);
            }
        }

        if ($arg1["DETAIL_PICTURE"]["tmp_name"]) {
            $img = $arg1["DETAIL_PICTURE"]["tmp_name"];
            list($width, $height, $type, $attr) = getimagesize($img);
            $rif = CFile::ResizeImageFile(
                            $sourceFile = $img, $destinationFile = $_SERVER['DOCUMENT_ROOT'] . "/upload/1.png", $arSize = array('width' => $width, 'height' => $height), $resizeType = BX_RESIZE_IMAGE_PROPORTIONAL, $arWaterMark = array(), $jpgQuality = false, $arFilters = Array(
                        array("name" => "watermark", "position" => "bottomright", "size" => "real", "file" => $_SERVER['DOCUMENT_ROOT'] . "/upload/watermarker.png")
                            )
            );
            unlink($img);
            rename($_SERVER['DOCUMENT_ROOT'] . "/upload/1.png", $img);
        }
    }
}

function DoIBlockAfterSave($arg1, $arg2 = false) {

    $ELEMENT_ID = false;
    $IBLOCK_ID = false;
    $OFFERS_IBLOCK_ID = false;
    $OFFERS_PROPERTY_ID = false;
    if (CModule::IncludeModule('currency'))
        $strDefaultCurrency = CCurrency::GetBaseCurrency();

    //Check for catalog event
    if (is_array($arg2) && $arg2["PRODUCT_ID"] > 0) {
        //Get iblock element
        $rsPriceElement = CIBlockElement::GetList(
                        array(), array(
                    "ID" => $arg2["PRODUCT_ID"],
                        ), false, false, array("ID", "IBLOCK_ID")
        );
        if ($arPriceElement = $rsPriceElement->Fetch()) {
            $arCatalog = CCatalog::GetByID($arPriceElement["IBLOCK_ID"]);
            if (is_array($arCatalog)) {
                //Check if it is offers iblock
                if ($arCatalog["OFFERS"] == "Y") {
                    //Find product element
                    $rsElement = CIBlockElement::GetProperty(
                                    $arPriceElement["IBLOCK_ID"], $arPriceElement["ID"], "sort", "asc", array("ID" => $arCatalog["SKU_PROPERTY_ID"])
                    );
                    $arElement = $rsElement->Fetch();
                    if ($arElement && $arElement["VALUE"] > 0) {
                        $ELEMENT_ID = $arElement["VALUE"];
                        $IBLOCK_ID = $arCatalog["PRODUCT_IBLOCK_ID"];
                        $OFFERS_IBLOCK_ID = $arCatalog["IBLOCK_ID"];
                        $OFFERS_PROPERTY_ID = $arCatalog["SKU_PROPERTY_ID"];
                    }
                }
                //or iblock which has offers
                elseif ($arCatalog["OFFERS_IBLOCK_ID"] > 0) {
                    $ELEMENT_ID = $arPriceElement["ID"];
                    $IBLOCK_ID = $arPriceElement["IBLOCK_ID"];
                    $OFFERS_IBLOCK_ID = $arCatalog["OFFERS_IBLOCK_ID"];
                    $OFFERS_PROPERTY_ID = $arCatalog["OFFERS_PROPERTY_ID"];
                } else {
                    $ELEMENT_ID = $arPriceElement["ID"];
                    $IBLOCK_ID = $arPriceElement["IBLOCK_ID"];
                    $OFFERS_IBLOCK_ID = false;
                    $OFFERS_PROPERTY_ID = false;
                }
            }
        }
    }
    //Check for iblock event
    elseif (is_array($arg1) && $arg1["ID"] > 0 && $arg1["IBLOCK_ID"] > 0) {
        //Check if iblock has offers
        $arOffers = CIBlockPriceTools::GetOffersIBlock($arg1["IBLOCK_ID"]);
        if (is_array($arOffers)) {
            $ELEMENT_ID = $arg1["ID"];
            $IBLOCK_ID = $arg1["IBLOCK_ID"];
            $OFFERS_IBLOCK_ID = $arOffers["OFFERS_IBLOCK_ID"];
            $OFFERS_PROPERTY_ID = $arOffers["OFFERS_PROPERTY_ID"];
        }
    }

    if ($ELEMENT_ID) {
        static $arPropCache = array();
        if (!array_key_exists($IBLOCK_ID, $arPropCache)) {
            //Check for MINIMAL_PRICE property
            $rsProperty = CIBlockProperty::GetByID("MINIMUM_PRICE", $IBLOCK_ID);
            $arProperty = $rsProperty->Fetch();
            if ($arProperty)
                $arPropCache[$IBLOCK_ID] = $arProperty["ID"];
            else
                $arPropCache[$IBLOCK_ID] = false;
        }

        if ($arPropCache[$IBLOCK_ID]) {
            //Compose elements filter
            if ($OFFERS_IBLOCK_ID) {
                $rsOffers = CIBlockElement::GetList(
                                array(), array(
                            "IBLOCK_ID" => $OFFERS_IBLOCK_ID,
                            "PROPERTY_" . $OFFERS_PROPERTY_ID => $ELEMENT_ID,
                            "ACTIVE" => "Y"
                                ), false, false, array("ID")
                );
                while ($arOffer = $rsOffers->Fetch())
                    $arProductID[] = $arOffer["ID"];

                if (!is_array($arProductID))
                    $arProductID = array($ELEMENT_ID);
            } else
                $arProductID = array($ELEMENT_ID);

            $minPrice = false;
            //Get prices
            $rsPrices = CPrice::GetList(
                            array(), array(
                        "PRODUCT_ID" => $arProductID,
                            )
            );
            while ($arPrice = $rsPrices->Fetch()) {
                if (CModule::IncludeModule('currency') && $strDefaultCurrency != $arPrice['CURRENCY'])
                    $arPrice["PRICE"] = CCurrencyRates::ConvertCurrency($arPrice["PRICE"], $arPrice["CURRENCY"], $strDefaultCurrency);

                $PRICE = $arPrice["PRICE"];

                if ($minPrice === false || $minPrice > $PRICE)
                    $minPrice = $PRICE;
            }
            if ($minPrice !== false) {
                CIBlockElement::SetPropertyValuesEx(
                        $ELEMENT_ID, $IBLOCK_ID, array(
                    "MINIMUM_PRICE" => $minPrice
                        )
                );
            }
        }
    }
    if (file_exists($_SERVER["DOCUMENT_ROOT"] . "/mchce/offers")) {
        unlink($_SERVER["DOCUMENT_ROOT"] . "/mchce/offers");
    }
}

function BeforeIndexHandler($arFields) {
    $arrIblock = array(IBLOCK_CATALOG);
    $arDelFields = array("DETAIL_TEXT", "PREVIEW_TEXT");
    if (CModule::IncludeModule('iblock') && $arFields["MODULE_ID"] == 'iblock' && in_array($arFields["PARAM2"], $arrIblock) && intval($arFields["ITEM_ID"]) > 0) {
        $dbElement = CIblockElement::GetByID($arFields["ITEM_ID"]);
        if ($arElement = $dbElement->Fetch()) {
            foreach ($arDelFields as $value) {
                if (isset($arElement[$value]) && strlen($arElement[$value]) > 0) {
                    $arFields["BODY"] = str_replace(CSearch::KillTags($arElement[$value]), "", CSearch::KillTags($arFields["BODY"]));
                }
            }
        }

        return $arFields;
    }
}

function LogIt() {
    $fp = fopen(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT') . '/logger.txt', 'a+');
    fwrite($fp, date('d.m.Y') . '	' . $_SERVER['REQUEST_URI'] . "\n");
    fclose($fp);
}

if ($_GET['utm_source'] === 'targetmailru') {
    LogIt();
}