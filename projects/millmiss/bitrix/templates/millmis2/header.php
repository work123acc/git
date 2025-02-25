<?
	if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="ru"> <!--<![endif]-->
    <html>
		<head>
			
			<meta charset="utf-8">
			<title><? $APPLICATION->ShowTitle(); ?></title>
			<script src="<?= SITE_TEMPLATE_PATH ?>/libs/jquery/jquery-1.11.2.min.js"></script>
			<? $APPLICATION->ShowHead(); ?>
			<link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH ?>/img/favicon/favicon.ico" type="image/x-icon">
			<link rel="apple-touch-icon" href="<?= SITE_TEMPLATE_PATH ?>/img/favicon/apple-touch-icon.png">
			<link rel="apple-touch-icon" sizes="72x72" href="<?= SITE_TEMPLATE_PATH ?>/img/favicon/apple-touch-icon-72x72.png">
			<link rel="apple-touch-icon" sizes="114x114" href="<?= SITE_TEMPLATE_PATH ?>/img/favicon/apple-touch-icon-114x114.png">
			
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
			
			
			
			
			<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/libs/animate/animate.css">
			<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/reset.css">
			
			<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/fonts.css">
			<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/main.css">
			<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/media.css">
			<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/owl.carousel.min.css">
			<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/ccccc.css">
			<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/slick.css">
			<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/slick-theme.css">
			<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/ccccc.css">
			<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/nouislider.css">
            <link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/popups.css">
			<link rel="stylesheet" href="<?= SITE_TEMPLATE_PATH ?>/css/magnific-popup.css">
			<script src="<?= SITE_TEMPLATE_PATH ?>/libs/modernizr/modernizr.js"></script>
			
		</head>
		<body>
			<div id="panel">
				<? $APPLICATION->ShowPanel(); ?>
			</div>
			<header>
				<div class="top_panel">
					<div class="container">
						
						<section class="top-nav">
							
							
							
							<nav class="main-nav-mobile">
								<button class="menu__back animated menu__back--hidden fadeOut" aria-label="Go back">
									<span class="icon icon__arrow-left">›</span><i class="icon__arrow-left_text">Назад</i>
								</button>
								<div class="main-nav-mobile__content">
									
									<ul class="top-menu-mobile">
										
										<li class="login">
											<a href="/auth/" class="">Вход</a> / <a href="/auth/?reg=yes">Регистрация</a>
										</li>
										
										
									</ul>
									
									<ul class="links">
										<li class="links__item">
											<a href="/action/">Акции</a>
										</li>
										
										<li class="links__item">
											<a href="/gifts/" >Подарочные сертификаты</a>
										</li>
									</ul>
									
									<div class="categories-title fadeIn" ></div>
									<?
										$APPLICATION->IncludeComponent(
										"bitrix:menu", "menu_mobile", array(
										"ROOT_MENU_TYPE" => "left",
										"MENU_CACHE_TYPE" => "N",
										"MENU_CACHE_TIME" => "36000000",
										"MENU_CACHE_USE_GROUPS" => "N",
										"MENU_THEME" => "site",
										"CACHE_SELECTED_ITEMS" => "N",
										"MENU_CACHE_GET_VARS" => array(
										),
										"MAX_LEVEL" => "3",
										"CHILD_MENU_TYPE" => "left",
										"USE_EXT" => "Y",
										"DELAY" => "N",
										"ALLOW_MULTI_SELECT" => "N",
										"COMPONENT_TEMPLATE" => "menu_mobile"
										), false
										);
									?>
									
									<ul>
										<li class="menu__item" style="animation-delay: 420ms;margin-top: 20px">
											<a class="menu__link" href="">О компании</a>
										</li>
										<li class="menu__item" style="animation-delay: 480ms;"><a href="" class="menu__link">Новости</a></li>
										<li class="menu__item" style="animation-delay: 480ms;"><a href="" class="menu__link">Оплата и доставка</a></li>
									</ul>
								</div>
								
							</nav>
						</section>
						<ul class="top_panel_menu">
							<li><a href="/about/">О компании</a></li>
							<li><a href="/news/">Новости</a></li>
							<li><a href="/delivery/">Оплата и доставка</a></li>
                            <li><a href="/contacts/">Контакты</a></li>
						</ul>
						<div class="top_panel_action">
							<a href="/action/">Акции</a>
						</div>
						
						<div class="top_panel_phone">
							<a href="/super_sale/"><img src="<?= SITE_TEMPLATE_PATH ?>/img/SuperSale.png"></a>
							
						</div>
                        <div class="top_panel_phone2">
							<div class="header-phone">
								<?
									$APPLICATION->IncludeComponent(
									"bitrix:main.include", "", Array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"EDIT_TEMPLATE" => "",
									"PATH" => SITE_DIR . "include/phone_header.php"
									), false
									);
								?>
								
							</div>
						</div>
						<div class="top_panel_login">
							<?
								$APPLICATION->IncludeComponent(
								"api:auth.ajax", "", Array(
								"LOGIN_BTN_CLASS" => "avater-icon",
								"LOGIN_MESS_HEADER" => "Вход на сайт",
								"LOGIN_MESS_LINK" => "Вход",
								"REGISTER_BTN_CLASS" => "api_button avater-icon",
								"REGISTER_MESS_HEADER" => "Регистрация",
								"REGISTER_MESS_LINK" => "Регистрация",
								"RESTORE_MESS_HEADER" => "Вспомнить пароль"
								)
								);
							?>
							
						</div>
					</div>
				</div>
				<div class="headerMain">
					<div class="headerMain_top">
						<div class="container">
							<div class="header__mobile-menu-btn">
								<div class="cd-nav-trigger"><span></span></div>
							</div>
							<div class="header_logo">
								<a href="/">
									<img src="<?= SITE_TEMPLATE_PATH ?>/img/logo.svg" alt=""> 
								</a>
								
							</div>
							
							<div class="header_search">
								<?$APPLICATION->IncludeComponent(
									"bitrix:search.title", 
									"catalog", 
									array(
									"CATEGORY_0" => array(
									0 => "iblock_1c_catalog",
									),
									"CATEGORY_0_TITLE" => "Каталог",
									"CATEGORY_0_iblock_catalog" => array(
									0 => "9",
									),
									"CHECK_DATES" => "N",
									"CONTAINER_ID" => "title-search",
									"INPUT_ID" => "title-search-input",
									"NUM_CATEGORIES" => "1",
									"ORDER" => "date",
									"PAGE" => "/catalog/index.php",
									"SHOW_INPUT" => "Y",
									"SHOW_OTHERS" => "N",
									"TOP_COUNT" => "5",
									"USE_LANGUAGE_GUESS" => "Y",
									"COMPONENT_TEMPLATE" => "catalog",
									"CATEGORY_0_iblock_1c_catalog" => array(
									0 => "all",
									),
									"PRICE_CODE" => array(
									),
									"PRICE_VAT_INCLUDE" => "Y",
									"PREVIEW_TRUNCATE_LEN" => "",
									"SHOW_PREVIEW" => "Y",
									"CONVERT_CURRENCY" => "N",
									"PREVIEW_WIDTH" => "75",
									"PREVIEW_HEIGHT" => "75"
									),
									false
								);?>
							</div>
							<div class="header_gift">
								
								<div class="gift_certificate">
									<?
										$APPLICATION->IncludeComponent(
										"bitrix:main.include", "", Array(
										"AREA_FILE_SHOW" => "file",
										"AREA_FILE_SUFFIX" => "inc",
										"EDIT_TEMPLATE" => "",
										"PATH" => SITE_DIR . "include/gift_header.php"
										), false
										);
									?>
									
								</div>
							</div>
							<div class="header_basket">
								<div class="header_search_mobile">
									<img src="<?= SITE_TEMPLATE_PATH ?>/img/search.svg" alt="">
								</div>
								<div class="header_basket_img " id="basket_div" rel="popup4">
									
									<?
										$APPLICATION->IncludeComponent(
										"bitrix:sale.basket.basket.line", 
										".default", 
										array(
										"PATH_TO_BASKET" => "/personal/cart/",
										"PATH_TO_ORDER" => "/personal/order/make/",
										"SHOW_PERSONAL_LINK" => "N",
										"SHOW_NUM_PRODUCTS" => "Y",
										"SHOW_TOTAL_PRICE" => "Y",
										"SHOW_PRODUCTS" => "Y",
										"POSITION_FIXED" => "N",
										"SHOW_DELAY" => "Y",
										"SHOW_NOTAVAIL" => "Y",
										"SHOW_SUBSCRIBE" => "Y",
										"COMPONENT_TEMPLATE" => ".default",
										"SHOW_EMPTY_VALUES" => "Y",
										"PATH_TO_PERSONAL" => SITE_DIR."personal/",
										"SHOW_AUTHOR" => "N",
										"PATH_TO_REGISTER" => SITE_DIR."login/",
										"PATH_TO_PROFILE" => SITE_DIR."personal/",
										"HIDE_ON_BASKET_PAGES" => "N",
										"PATH_TO_AUTHORIZE" => "",
										"SHOW_IMAGE" => "Y",
										"SHOW_PRICE" => "Y",
										"SHOW_SUMMARY" => "Y"
										),
										false
										);
									?>
									
								</div>
							</div>
						</div>
					</div>
					
                    <div class="headerMain_bottom">
						<div class="container">
							<nav class="navMenu">
								
								<?
									$APPLICATION->IncludeComponent(
									"bitrix:menu", "top_menu_new", array(
									"ROOT_MENU_TYPE" => "left",
									"MENU_CACHE_TYPE" => "N",
									"MENU_CACHE_TIME" => "36000000",
									"MENU_CACHE_USE_GROUPS" => "N",
									"MENU_THEME" => "site",
									"CACHE_SELECTED_ITEMS" => "N",
									"MENU_CACHE_GET_VARS" => array(
									),
									"MAX_LEVEL" => "3",
									"CHILD_MENU_TYPE" => "left",
									"USE_EXT" => "Y",
									"DELAY" => "N",
									"ALLOW_MULTI_SELECT" => "N",
									"COMPONENT_TEMPLATE" => "new_top"
									), false
									);
								?>
							</nav>
						</div>
					</div>    
					
				</div>
			</header>
			
			<div id="main_content">
						