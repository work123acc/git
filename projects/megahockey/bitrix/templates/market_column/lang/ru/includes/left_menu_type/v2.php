<?$APPLICATION->IncludeComponent(
	"alexkova.market:menu",
	isset($arLeftMenu["LEFT_MENU_TEMPLATE"]) ? $arLeftMenu["LEFT_MENU_TEMPLATE"] : "left",
	array(
		"COMPONENT_TEMPLATE" => "left_hover",
		"ROOT_MENU_TYPE" => "adv_left",
		"FULL_WIDTH" => "Y",
		"FIXED_MENU" => "Y",
		"STYLE_MENU" => isset($arLeftMenu["STYLE_MENU"]) ? $arLeftMenu["STYLE_MENU"] : "colored_light",
		"STYLE_MENU_HOVER" => isset($arLeftMenu["STYLE_MENU_HOVER"]) ? $arLeftMenu["STYLE_MENU_HOVER"] : "colored_light",
		"PICTURE_SECTION" => isset($arLeftMenu["PICTURE_SECTION"]) ? $arLeftMenu["PICTURE_SECTION"] : "colored_light",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "3",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"SHOW_TREE" => "Y",
		"TITLE_MENU" => "",
		"SUBMENU" => isset($arLeftMenu["SUBMENU"]) ? $arLeftMenu["SUBMENU"] : "ACTIVE_SHOW",
                "PICTURE_SECTION_HOVER" => isset($arLeftMenu["PICTURE_SECTION_HOVER"]) ? $arLeftMenu["PICTURE_SECTION_HOVER"] : "N",
                "PICTURE_CATEGARIES" => isset($arLeftMenu["PICTURE_CATEGARIES"]) ? $arLeftMenu["PICTURE_CATEGARIES"] : "N",
                "HOVER_MENU_COL_LG" => isset($arLeftMenu["HOVER_MENU_COL_LG"]) ? $arLeftMenu["HOVER_MENU_COL_LG"] : "2",
                "HOVER_MENU_COL_MD" => isset($arLeftMenu["HOVER_MENU_COL_MD"]) ? $arLeftMenu["HOVER_MENU_COL_MD"] : "2",
                "HOVER_TEMPLATE" => isset($arLeftMenu["HOVER_TEMPLATE"]) ? $arLeftMenu["HOVER_TEMPLATE"] : "classic",
	),
	false
);?>
<?$APPLICATION->IncludeComponent(
	"alexkova.market:menu",
	isset($arLeftMenu["LEFT_MENU_TEMPLATE"]) ? $arLeftMenu["LEFT_MENU_TEMPLATE"] : "left",
	array(
		"COMPONENT_TEMPLATE" => "left_hover",
		"ROOT_MENU_TYPE" => "left",
		"FULL_WIDTH" => "Y",
		"FIXED_MENU" => "Y",
		"STYLE_MENU" => isset($arLeftMenu["STYLE_MENU"]) ? $arLeftMenu["STYLE_MENU"] : "colored_light",
		"STYLE_MENU_HOVER" => isset($arLeftMenu["STYLE_MENU_HOVER"]) ? $arLeftMenu["STYLE_MENU_HOVER"] : "colored_light",
		"PICTURE_SECTION" => isset($arLeftMenu["PICTURE_SECTION"]) ? $arLeftMenu["PICTURE_SECTION"] : "colored_light",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "3",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"SHOW_TREE" => "Y",
		"TITLE_MENU" => "Каталог",
		"SUBMENU" => isset($arLeftMenu["SUBMENU"]) ? $arLeftMenu["SUBMENU"] : "ACTIVE_SHOW",
                "PICTURE_SECTION_HOVER" => isset($arLeftMenu["PICTURE_SECTION_HOVER"]) ? $arLeftMenu["PICTURE_SECTION_HOVER"] : "N",
                "PICTURE_CATEGARIES" => isset($arLeftMenu["PICTURE_CATEGARIES"]) ? $arLeftMenu["PICTURE_CATEGARIES"] : "N",
                "HOVER_MENU_COL_LG" => isset($arLeftMenu["HOVER_MENU_COL_LG"]) ? $arLeftMenu["HOVER_MENU_COL_LG"] : "2",
                "HOVER_MENU_COL_MD" => isset($arLeftMenu["HOVER_MENU_COL_MD"]) ? $arLeftMenu["HOVER_MENU_COL_MD"] : "2",
                "HOVER_TEMPLATE" => isset($arLeftMenu["HOVER_TEMPLATE"]) ? $arLeftMenu["HOVER_TEMPLATE"] : "classic",
	),
	false
);?>