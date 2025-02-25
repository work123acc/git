<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
	
	use \Bitrix\Main\Localization\Loc;
	
	/**
		* @global CMain $APPLICATION
		* @var array $arParams
		* @var array $arResult
		* @var CatalogSectionComponent $component
		* @var CBitrixComponentTemplate $this
		* @var string $templateName
		* @var string $componentPath
	*/
	
	$this->setFrameMode(true);
	$this->addExternalCss('/bitrix/css/main/bootstrap.css');
	
	if (!empty($arResult['NAV_RESULT']))
	{
		$navParams =  array(
		'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
		'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
		'NavNum' => $arResult['NAV_RESULT']->NavNum
		);
	}
	else
	{
		$navParams = array(
		'NavPageCount' => 1,
		'NavPageNomer' => 1,
		'NavNum' => $this->randString()
		);
	}
	
	$showTopPager = false;
	$showBottomPager = false;
	$showLazyLoad = false;
	
	if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1)
	{
		$showTopPager = $arParams['DISPLAY_TOP_PAGER'];
		$showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
		$showLazyLoad = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
	}
	
	$templateLibrary = array('popup', 'ajax', 'fx');
	$currencyList = '';
	
	if (!empty($arResult['CURRENCIES']))
	{
		$templateLibrary[] = 'currency';
		$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
	}
	
	$templateData = array(
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList
	);
	unset($currencyList, $templateLibrary);
	
	$elementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
	$elementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
	$elementDeleteParams = array('CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));
	
	$positionClassMap = array(
	'left' => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right' => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top' => 'product-item-label-top'
	);
	
	$discountPositionClass = '';
	if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
	{
		foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
		{
			$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
		}
	}
	
	$labelPositionClass = '';
	if (!empty($arParams['LABEL_PROP_POSITION']))
	{
		foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
		{
			$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
		}
	}
	
	$arParams['~MESS_BTN_BUY'] = $arParams['~MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_BUY');
	$arParams['~MESS_BTN_DETAIL'] = $arParams['~MESS_BTN_DETAIL'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_DETAIL');
	$arParams['~MESS_BTN_COMPARE'] = $arParams['~MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_COMPARE');
	$arParams['~MESS_BTN_SUBSCRIBE'] = $arParams['~MESS_BTN_SUBSCRIBE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_SUBSCRIBE');
	$arParams['~MESS_BTN_ADD_TO_BASKET'] = $arParams['~MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET');
	$arParams['~MESS_NOT_AVAILABLE'] = $arParams['~MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE');
	$arParams['~MESS_SHOW_MAX_QUANTITY'] = $arParams['~MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCS_CATALOG_SHOW_MAX_QUANTITY');
	$arParams['~MESS_RELATIVE_QUANTITY_MANY'] = $arParams['~MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
	$arParams['~MESS_RELATIVE_QUANTITY_FEW'] = $arParams['~MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');
	
	$generalParams = array(
	'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
	'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
	'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
	'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
	'MESS_SHOW_MAX_QUANTITY' => $arParams['~MESS_SHOW_MAX_QUANTITY'],
	'MESS_RELATIVE_QUANTITY_MANY' => $arParams['~MESS_RELATIVE_QUANTITY_MANY'],
	'MESS_RELATIVE_QUANTITY_FEW' => $arParams['~MESS_RELATIVE_QUANTITY_FEW'],
	'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
	'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
	'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
	'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
	'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
	'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
	'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'],
	'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
	'COMPARE_PATH' => $arParams['COMPARE_PATH'],
	'COMPARE_NAME' => $arParams['COMPARE_NAME'],
	'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
	'PRODUCT_BLOCKS_ORDER' => $arParams['PRODUCT_BLOCKS_ORDER'],
	'LABEL_POSITION_CLASS' => $labelPositionClass,
	'DISCOUNT_POSITION_CLASS' => $discountPositionClass,
	'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
	'SLIDER_PROGRESS' => $arParams['SLIDER_PROGRESS'],
	'~BASKET_URL' => $arParams['~BASKET_URL'],
	'~ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
	'~BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
	'~COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
	'~COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
	'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
	'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY'],
	'MESS_BTN_BUY' => $arParams['~MESS_BTN_BUY'],
	'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
	'MESS_BTN_COMPARE' => $arParams['~MESS_BTN_COMPARE'],
	'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
	'MESS_BTN_ADD_TO_BASKET' => $arParams['~MESS_BTN_ADD_TO_BASKET'],
	'MESS_NOT_AVAILABLE' => $arParams['~MESS_NOT_AVAILABLE']
	);
	
	$obName = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
	$containerName = 'container-'.$navParams['NavNum'];
	
	
?>

<?
	if (!empty($arResult['ITEMS']) && !empty($arResult['ITEM_ROWS']))
	{
		$areaIds = array();
		
		foreach ($arResult['ITEMS'] as $item)
		{
			$uniqueId = $item['ID'].'_'.md5($this->randString().$component->getAction());
			$areaIds[$item['ID']] = $this->GetEditAreaId($uniqueId);
			$this->AddEditAction($uniqueId, $item['EDIT_LINK'], $elementEdit);
			$this->AddDeleteAction($uniqueId, $item['DELETE_LINK'], $elementDelete, $elementDeleteParams);
		}
	?>
	<!-- items-container -->
	<?
        
		
		$count = 0;
		foreach ($arResult['ITEMS'] as $ITEMS)
		{ 
			//                      echo "<pre>";
			//                print_r($ITEMS["PROPERTIES"]["CML2_ARTICLE"]);
			//                echo "</pre>";
			$count++;
			$rowItems = array_splice($arResult['ITEMS'], 0, $rowData['COUNT']);
			
		?>
		<article class="goods__item">
            <div class="goods__image">
				<a href="<?=$ITEMS["DETAIL_PAGE_URL"]?>"></a>
				<img src="<?= $ITEMS["PRODUCT_PREVIEW"]["SRC"] ?>" alt="">
			</div>
            <div class="goods__item-title">
				<a href="<?=$ITEMS["DETAIL_PAGE_URL"]?>"><?=$ITEMS["NAME"]?></a>
			</div>
            <div class="goods__description">
				<div class="goods__count-box">
					<div class="goods__count-package">
						<?//=$ITEMS["OFFERS"][0]["PROPERTIES"]["CML2_BASE_UNIT"]["VALUE"]?>
						<?= $ITEMS["PROPERTIES"]["UNIT_PACKAGING_1C"]["VALUE"] ?> шт.
					</div>
					<div class="goods__count-stock">
						<?if($ITEMS["OFFERS"][0]["CATALOG_QUANTITY"]>25){?>
							> 25 шт. на складе
							<?}else{
								if($ITEMS["OFFERS"][0]["CATALOG_QUANTITY"]==0 or $ITEMS["OFFERS"][0]["CATALOG_QUANTITY"]<0){?>
								нет в наличии
								<?}else{?>
								<?=$ITEMS["OFFERS"][0]["CATALOG_QUANTITY"]?> шт. на складе
							<?}?>
							
						<?}?>
						
					</div>
				</div>
				<div class="goods__code-box">
					<div class="goods__code-title">
						Код:
					</div>
					<div class="goods__code">
						<?=$ITEMS["PROPERTIES"]["CODE_1C"]["VALUE"]?>
					</div>
				</div>
			</div>
            <div class="goods__price-box">
				<div class="goods__count-select">
					<input type="text" value="<?=$ITEMS["PROPERTIES"]["UNIT_PACKAGING_1C"]["VALUE"]?>" class="quantity_input">
				</div>
				<div class="goods__count-but-box">
					<input type="hidden" class="product_kol" value="<?=$ITEMS["OFFERS"][0]["CATALOG_QUANTITY"]?>" />
                                        <input type="hidden" class="shag" value="<?=$ITEMS["PROPERTIES"]["UNIT_PACKAGING_1C"]["VALUE"]?>" />
					<a href="" class="goods__count-button  goods__count-button--up quantity_plus"></a>
					<a href="" class="goods__count-button  goods__count-button--down quantity_minus"></a>
				</div>
				<div class="goods__price"><span><?=$ITEMS["OFFERS"][0]["MIN_PRICE"]["VALUE_NOVAT"]?></span> Р</div>
				<input type="hidden" class="product_id" value="<?=$ITEMS["OFFERS"][0]["ID"]?>"/>
				
				<?if($ITEMS["OFFERS"][0]["CAN_BUY"]){?>
					<a href="" class="goods__add-cart add_cart"></a>
					<?}else{?>
					<a href="javascript:void(0)" class="goods__add-cart  goods__add-cart--denied">нет в наличии</a>
				<?}?>
				
			</div>
            <div class="goods__advanced-box">
				<div class="goods__advanced-button  goods__advanced-button--compare">
					<?if(isset($_SESSION["CATALOG_COMPARE_LIST"][16]["ITEMS"][$ITEMS["OFFERS"][0]["ID"]])){?>
					<? /*------------------------------- comment -----------------------------------------* ?>
					<a href="javascript:void(0)" id="compare_<?=$ITEMS["OFFERS"][0]["ID"]?>"  />Уже в сравнении</a>
					<? /*------------------------------- comment -----------------------------------------*/ ?>
					<a href="/catalog/compare/" id="compare_<?=$ITEMS["OFFERS"][0]["ID"]?>"  />В сравнении</a>
					
					<?}else{?>
				<a href="javascript:void(0)" id="compare_<?=$ITEMS["OFFERS"][0]["ID"]?>" onclick="docompare(<?=$ITEMS["OFFERS"][0]["ID"]?>)" />Сравнить</a>
				
			<?}?>
			
		</div>
		<div class="goods__advanced-button  goods__advanced-button--favorite"><a href="" data-wishiblock="<?=$ITEMS["IBLOCK_ID"]?>" data-wishid="<?=$ITEMS["ID"]?>" class="js-wishlist">в избранное</a></div>
	</div>
</article>

<?
}
unset($generalParams, $rowItems);
?>
<!-- items-container -->
<?
}
else
{
	// load css for bigData/deferred load
	echo 'В Данной категории нет товаров!';
}
?>
<?
	
	
	if ($showBottomPager)
	{
	?>
	<div data-pagination-num="<?=$navParams['NavNum']?>">
		<!-- pagination-container -->
		<?=$arResult['NAV_STRING']?>
		<!-- pagination-container -->
	</div>
	<?
	}
	
	$signer = new \Bitrix\Main\Security\Sign\Signer;
	$signedTemplate = $signer->sign($templateName, 'catalog.section');
	$signedParams = $signer->sign(base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])), 'catalog.section');
?>
<script>
	function docompare(ID) {
		$.post("/ajax/compare.php",{id: ID, action: "ADD_TO_COMPARE_LIST"}, function(data){
			$("#compare_"+ID).text("В сравнении");
			$("#compare_"+ID)[0].href = '/catalog/compare/';
			$("#compare_"+ID).removeAttr("onclick");
			$.post("/ajax/compare_count.php",{}, function(data){
				$("#compare_count").text(data);
			});
		});
		
		
	}
	</script>	
