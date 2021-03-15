<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index')->name('index');
Route::get('/about', 'IndexController@about');



Route::get('/blog', 'IndexController@blog');


Auth::routes(['verify' => true, 'register' => false]);


Route::get('home', 'HomeController@index')->name('home');
Route::get('homeInactive', 'HomeController@indexInactive')->name('home.inactive');









//Order Sections
Route::post('/order', 'OrderController@order');
// Contact Form
Route::post('/cForm', 'IndexController@mail')->name('send.contact');



//ONLOAD MODAL
Route::get('modal', 'ModalController@edit')->name('modal.edit');
Route::post('modal/{id}', 'ModalController@update')->name('modal.update');
Route::post('modalImg/{id}', 'ModalController@deleteImg')->name('modal.deleteImg');
//Portfolio
Route::post('/portfolio-section', 'Portfolio\PortfolioItemController@section')->name('PortfolioSection.update');
Route::post('/portfolio-filter', 'Portfolio\PortfolioItemController@filter')->name('PortfolioFilter.update');
Route::resource('portfolioCategories', 'Portfolio\PortfolioCategoryController');
Route::resource('portfolioItems', 'Portfolio\PortfolioItemController', ['except' => ['update']]);
Route::post('/portfolioItem/{id}', 'Portfolio\PortfolioItemController@update')->name('portfolioItems.update');
Route::get('trashed-portfolioItems', 'Portfolio\PortfolioItemController@trashed')->name('trashed-portfolioItems.index');
Route::put('restore-portfolioItems/{portfolioItem}', 'Portfolio\PortfolioItemController@restore')->name('restore-portfolio-items');
Route::get('/redirectPortfolioItem', 'Portfolio\PortfolioCategoryController@redirect');


//Portfolio Gallery
Route::get('/portfolioGallerySection/{id}', 'PortfolioGalleryController@editSection')->name('portfolioGallerySection.index');
Route::post('/portfolioGallerySectionUpdate/{id}', 'PortfolioGalleryController@updateSection')->name('portfolioGallerySection.update');
Route::resource('portfolioGallery', 'PortfolioGalleryController', ['except' => ['update']]);
Route::post('/portfolioGallery/{id}', 'PortfolioGalleryController@update')->name('portfolioGallery.update');
Route::get('trashed-gallery', 'PortfolioGalleryController@trashed')->name('trashed-gallery.index');
Route::put('restore-gallery/{link}', 'PortfolioGalleryController@restore')->name('restore-gallery');

  //Portfolio Images
Route::post('/portfolioGalleryImageCreate/{id}', 'PortfolioGalleryController@imageCreate')->name('portfolioGalleryImage.create')->middleware('optimizeImages');
Route::post('/portfolioGalleryImageDestroy/{id}', 'PortfolioGalleryController@imageDestroy')->name('portfolioGalleryImage.destroy');
Route::post('/portfolioGalleryImage/{id}', 'PortfolioGalleryController@imageUpdate')->name('portfolioGalleryImage.update');

//Pricing
// Route::get('/editPricing', 'HomeController@pricingEdit')->name('pricing.edit');
// Route::post('/updatePricing/{id}', 'HomeController@pricingUpdate')->name('pricing.update');
Route::resource('pricing', 'PricingController', ['except' => ['update']]);
Route::post('/pricingUpdate/{id}', 'PricingController@pricingUpdate')->name('pricing.update');


Route::post('pricingItemCreate/{id}', 'PricingController@pricingItemsCreate')->name('pricingItem.create');
Route::post('pricingItemDestroy/{id}', 'PricingController@pricingItemDestroy')->name('pricingItem.destroy');
Route::post('pricingSection/{id}', 'PricingController@sectionUpdate')->name('pricingSection.update');

//Catalog
Route::post('/catalogSection/{id}', 'CatalogController@sectionUpdate')->name('catalog.section.update');
Route::resource('catalog', 'CatalogController', ['except' => ['update']]);
Route::post('/catalogUpdate/{id}', 'CatalogController@update')->name('catalog.update');
Route::get('trashed-catalog', 'CatalogController@trashed')->name('trashed-catalog.index');
Route::put('restore-catalog/{catalog}', 'CatalogController@restore')->name('restore-catalog');
Route::post('/delSecImg/{id}', 'CatalogController@destroySecImg')->name('sec.img.destroy');

//Catalog 2

Route::post('/catalogSection2/{id}', 'CatalogController2@sectionUpdate')->name('catalog2.section.update');
Route::resource('catalog2', 'CatalogController2', ['except' => ['update']]);
Route::post('/catalog2Update/{id}', 'CatalogController2@update')->name('catalog2.update');
Route::get('trashed-catalog2', 'CatalogController2@trashed')->name('trashed-catalog2.index');
Route::put('restore-catalog2/{catalog}', 'CatalogController2@restore')->name('restore-catalog2');
Route::post('/delSecImg2/{id}', 'CatalogController2@destroySecImg')->name('sec.img.destroy2');

//Catalog 3
Route::post('/catalogSection3/{id}', 'CatalogController3@sectionUpdate')->name('catalog3.section.update');
Route::resource('catalog3', 'CatalogController3', ['except' => ['update']]);
Route::post('/catalog3Update/{id}', 'CatalogController3@update')->name('catalog3.update');
Route::get('trashed-catalog3', 'CatalogController3@trashed')->name('trashed-catalog3.index');
Route::put('restore-catalog3/{catalog}', 'CatalogController3@restore')->name('restore-catalog3');
Route::post('/delSecImg3/{id}', 'CatalogController3@destroySecImg')->name('sec.img.destroy3');

//SHOP
Route::post('/shopSection/{id}', 'ShopController@sectionUpdate')->name('shop.section.update');
Route::resource('shop', 'ShopController', ['except' => ['update']]);
Route::post('/shopUpdate/{id}', 'ShopController@update')->name('shop.update');
Route::get('trashed-shop', 'ShopController@trashed')->name('trashed-shop.index');
Route::put('restore-shop/{shop}', 'ShopController@restore')->name('restore-shop');
Route::post('/delSecImgShop/{id}', 'ShopController@destroySecImg')->name('sec.img.shop');


//Checkout Stripe ================================== Checkout Stripe ===================================
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/checkout/pay', 'CheckoutController@pay')->name('checkout.pay');

//Checkout Conditions ================================== Checkout Conditions ===================================
Route::get('/checkout/success/{id}', 'CheckoutController@success')->name('checkout.success');
Route::get('/checkout/canceled', 'CheckoutController@canceled')->name('checkout.canceled');
Route::get('/checkout/error', 'CheckoutController@error')->name('checkout.error');


//Checkout Paypal ================================== Checkout Paypal ===================================
Route::get('paypal/express-checkout', 'PayPalController@expressCheckout')->name('paypal.express-checkout');
Route::get('paypal/express-checkout-success', 'PayPalController@expressCheckoutSuccess');
Route::post('paypal/notify', 'PayPalController@notify');


//Receipt Info ================================== Receipt Info ===================================
Route::post('/shop/receipt-info', 'ReceiptController@receiptInfoUpdate')->name('receipt.info.update');


//PShop Settings ================================== PShop Settings ===================================
Route::get('/PShop/settings', 'PShopController@index')->name('pshop.index');
Route::get('/receipt/{id}', 'PShopController@viewReceipt')->name('receipt.view');
Route::get('/PDFreceipt/{id}','PShopController@PDFreceipt')->name('receipt.pdf');

//SHOPPING Cart ================================== SHOPPING Cart ===================================
Route::post('/cart/add', 'ShoppingController@add_to_cart')->name('cart.add');
Route::get('/cart/quick/add/{id}', 'ShoppingController@quickAdd')->name('cart.quick.add');
Route::get('/cart/quick/addDetail/{id}', 'ShoppingController@quickAddDetail')->name('cart.quick.add.detail');

Route::get('/cart', 'ShoppingController@showCart')->name('cart');
Route::get('/cart/delete/{id}', 'ShoppingController@cartDelete')->name('cart.delete');
Route::post('/cart/qCart/{id}', 'ShoppingController@quantityCart')->name('quantity.cart');
Route::get('/cart/{id}/incr/{qty}', 'ShoppingController@incr')->name('cart.incr');
Route::get('/cart/{id}/decr/{qty}', 'ShoppingController@decr')->name('cart.decr');

Route::post('/cart/qty/update/{id}', 'ShoppingController@qtyUpdate')->name('qty.update');





Route::middleware(['auth'])->group(function () {
// ================================== Display ========================================
Route::post('/display-portfolio-programs', 'DisplayController@portfolioprogramsDisplay');
Route::post('/display-pricing', 'DisplayController@pricingDisplay');
Route::post('/display-frase', 'DisplayController@fraseDisplay');
Route::post('/display-servicios', 'DisplayController@serviciosDisplay');
Route::post('/display-links', 'DisplayController@linksDisplay');
Route::post('/display-infoslider1', 'DisplayController@infoslider1Display');
Route::post('/display-infoslider2', 'DisplayController@infoslider2Display');
Route::post('/display-infoslider3', 'DisplayController@infoslider3Display');
Route::post('/display-info', 'DisplayController@infoDisplay');
Route::post('/display-articulos', 'DisplayController@articulosDisplay');
Route::post('/display-contact', 'DisplayController@contactDisplay');
Route::post('/display-portfolio-gallery', 'DisplayController@portfoliogalleryDisplay')->name('portfolioGallery.display');
Route::post('/display-catalog', 'DisplayController@catalogDisplay');
Route::post('/display-catalog2', 'DisplayController@catalog2Display');
Route::post('/display-catalog3', 'DisplayController@catalog3Display');
Route::post('/display-shop', 'DisplayController@shopDisplay');
Route::post('/display-modal', 'DisplayController@modalDisplay');
Route::post('/display-text', 'DisplayController@textDisplay');
Route::post('/display-text2', 'DisplayController@text2Display');
Route::post('/display-text3', 'DisplayController@text3Display');
Route::post('/display-text4', 'DisplayController@text4Display');
Route::post('/display-service2', 'DisplayController@servicios2Display');
// Route::post('/display-footer/{id}', 'HomeController@sectionFooterDisplay')->name('sectionFooter.display');


// ================================== Service2 ========================================
Route::get('/service2-section/{id}', 'ServiceSectionController@service2Edit')->name('service2.section.edit');
Route::post('/service2-section-update/{id}', 'ServiceSectionController@service2Update')->name('service2.section.update');

// Servicios2 functionality
Route::resource('servicios2', 'ServiceController', ['except' => ['update']]);
Route::post('servicios2/{id}', 'ServiceController@update')->name('servicio2.update');
Route::get('trashed-servicios2', 'ServiceController@trashed')->name('trashed-servicios2.index');
Route::put('restore-servicios2/{servicio}', 'ServiceController@restore')->name('restore-servicios2');
Route::get('/redirectServicio2', 'ServiceController@redirect')->name('servicio2.redirect');


// ================================== Text ========================================
Route::get('/text', 'TextController@index')->name('text');
Route::post('/text-update', 'TextController@update')->name('text.update');

// ================================== Text2 ========================================
Route::get('/text2', 'text2Controller@index')->name('text2');
Route::post('/text2-update', 'Text2Controller@update')->name('text2.update');

// ================================== Text3 ========================================
Route::get('/text3', 'text3Controller@index')->name('text3');
Route::post('/text3-update', 'Text3Controller@update')->name('text3.update');

// ================================== Text4 ========================================
Route::get('/text4', 'text4Controller@index')->name('text4');
Route::post('/text4-update', 'Text4Controller@update')->name('text4.update');

// ================================== FILES ========================================
Route::get('/files', 'FileController@index')->name('files');
Route::post('/files-store', 'FileController@store')->name('files.store');
Route::post('/file-delete/{id}', 'FileController@delete')->name('files.delete');

// ================================== Styles ========================================
Route::post('/style-update/{id}', 'HomeController@styleUpdate')->name('style.update');

Route::post('/font-store', 'FontController@store')->name('font.store');
Route::post('/font-delete/{id}', 'FontController@delete')->name('font.delete');
Route::post('/font-style-update', 'FontController@fontStyleUpdate')->name('fontStyle.update');


// ================================== EditSections ========================================

//LINE BETWEEN
Route::post('/line-update/{id}', 'IndexController@lineUpdate')->name('line.update');

//Section Footer
Route::get('/editsectionFooter/{id}', 'FooterController@sectionFooterEdit')->name('sectionFooter.edit');
Route::post('/updatesectionFooter/{id}', 'FooterController@sectionFooterUpdate')->name('sectionFooter.update');
Route::resource('footer', 'FooterController', ['except' => ['update']]);
Route::post('/footer/{id}', 'FooterController@update')->name('footer.update');
Route::get('trashed-footer', 'FooterController@trashed')->name('trashed-footer.index');
Route::put('restore-footer/{footer}', 'FooterController@restore')->name('restore-footer');


// MENU
Route::get('/menu', 'MenuController@index')->name('menu.index');
Route::post('/menu-update/{id}', 'MenuController@update')->name('menu.update');
Route::post('/menu-display/{id}', 'MenuController@display');
Route::post('/menuSide-update/{id}', 'MenuController@menuSideUpdate')->name('menuSide.update');
Route::post('/menuLogo-update/{id}', 'MenuController@logo')->name('menuLogo.update');




//Frase section
Route::get('/frase/{id}', 'HomeController@fraseEdit')->name('frase.edit');
Route::post('/frase/{id}', 'HomeController@fraseUpdate')->name('frase.update');


//Properties Features
Route::resource('features', 'FeaturesController');
Route::get('trashed-features', 'FeaturesController@trashed')->name('trashed-features.index');
Route::put('restore-features/{feature}', 'FeaturesController@restore')->name('restore-features');
//Properties Cities
Route::resource('cities', 'CitiesController');
Route::get('trashed-cities', 'CitiesController@trashed')->name('trashed-cities.index');
Route::put('restore-cities/{city}', 'CitiesController@restore')->name('restore-cities');

//Properties Section
Route::get('/editProp/{id}', 'PropertyController@propertiesSectionEdit')->name('propSection.edit');
Route::post('/updateprop/{id}', 'PropertyController@propertiesSectionUpdate')->name('propSection.update');
Route::post('/displayprop/{id}', 'PropertyController@propertiesSectionDisplay')->name('propSection.display');


//Properties
Route::resource('properties', 'PropertyController');
// Property update
// Route::post('/property/{id}', 'PropertyController@update')->name('property.update');
Route::get('trashed-properties', 'PropertyController@trashed')->name('trashed-properties.index');
Route::put('restore-properties/{property}', 'PropertyController@restore')->name('restore-properties');


//Section1
Route::get('/editsection1/{id}', 'HomeController@section1Edit')->name('section1.edit');
Route::post('/updatesection1/{id}', 'HomeController@section1Update')->name('section1.update');
Route::post('/displaysection1/{id}', 'HomeController@section1Display')->name('section1.display');
Route::post('/carouselsection1/{id}', 'HomeController@section1Carousel')->name('section1.carousel');
Route::post('/style-pick/{id}', 'HomeController@sliderStyleUpdate')->name('sliderStyle.update');
//Section2
Route::get('/editsection2/{id}', 'HomeController@section2Edit')->name('section2.edit');
Route::post('/updatesection2/{id}', 'HomeController@section2Update')->name('section2.update');

//Links
Route::get('/editlink/{id}', 'HomeController@linkEdit')->name('link.edit');
Route::post('/updatelink/{id}', 'HomeController@linkUpdate')->name('link.update');

Route::resource('links', 'LinkController');
Route::get('trashed-links', 'LinkController@trashed')->name('trashed-links.index');
Route::put('restore-links/{link}', 'LinkController@restore')->name('restore-links');

//Slider information
Route::get('/editInfoSlider/{id}', 'HomeController@infoSliderEdit')->name('info-slider-text.edit');
Route::post('/updateInfoSlider/{id}', 'HomeController@infoSliderUpdate')->name('infoSlider.update');
Route::delete('/delete-slider-video/{id}', 'HomeController@deleteSliderVideo')->name('delete.sliderVideo');
Route::post('/store-slider-image', 'HomeController@storeSliderImage')->name('store.sliderImage');
Route::post('/update-slider-image/{id}', 'HomeController@updateSliderImage')->name('update.sliderImage');
Route::delete('/delete-slider-image/{id}', 'HomeController@deleteSliderImage')->name('delete.sliderImage');
//Slider information2
Route::get('/editInfoSlider2/{id}', 'HomeController@infoSlider2Edit')->name('info-slider-text2.edit');
Route::post('/updateInfoSlider2/{id}', 'HomeController@infoSlider2Update')->name('infoSlider2.update');
Route::delete('/delete-slider-video2/{id}', 'HomeController@deleteSliderVideo2')->name('delete.sliderVideo2');
Route::post('/store-slider-image2', 'HomeController@storeSliderImage2')->name('store.sliderImage2');
Route::post('/update-slider-image2/{id}', 'HomeController@updateSliderImage2')->name('update.sliderImage2');
Route::delete('/delete-slider-image2/{id}', 'HomeController@deleteSliderImage2')->name('delete.sliderImage2');
//Slider information3
Route::get('/editInfoSlider3/{id}', 'HomeController@infoSlider3Edit')->name('info-slider-text3.edit');
Route::post('/updateInfoSlider3/{id}', 'HomeController@infoSlider3Update')->name('infoSlider3.update');
Route::delete('/delete-slider-video3/{id}', 'HomeController@deleteSliderVideo3')->name('delete.sliderVideo3');
Route::post('/store-slider-image3', 'HomeController@storeSliderImage3')->name('store.sliderImage3');
Route::post('/update-slider-image3/{id}', 'HomeController@updateSliderImage3')->name('update.sliderImage3');
Route::delete('/delete-slider-image3/{id}', 'HomeController@deleteSliderImage3')->name('delete.sliderImage3');

//Section3
Route::get('/editsection3/{id}', 'HomeController@section3Edit')->name('section3.edit');
Route::post('/updatesection3/{id}', 'HomeController@section3Update')->name('section3.update');

//Section4
Route::get('/editsection4/{id}', 'HomeController@section4Edit')->name('section4.edit');
Route::post('/updatesection4/{id}', 'HomeController@section4Update')->name('section4.update');

//Section5
Route::get('/editsection5/{id}', 'HomeController@section5Edit')->name('section5.edit');
Route::post('/updatesection5/{id}', 'HomeController@section5Update')->name('section5.update');


//Contact Categories
Route::get('/contact-categories', 'ContactController@categoriesIndex')->name('contactCategories.index');
Route::get('/contact-categories-create', 'ContactController@categoriesCreate')->name('contactCategories.create');
Route::post('/contact-categories-store', 'ContactController@categoriesStore')->name('contactCategories.store');
Route::get('/contact-categories-edit/{id}', 'ContactController@categoriesEdit')->name('contactCategories.edit');
Route::post('/contact-categories-update/{id}', 'ContactController@categoriesUpdate')->name('contactCategories.update');
Route::post('/contact-categories-delete/{id}', 'ContactController@categoriesDelete')->name('contactCategories.delete');


//Abut Page
Route::get('/edit-about/{id}', 'HomeController@aboutEdit')->name('about.edit');
Route::post('/update-about/{id}', 'HomeController@aboutUpdate')->name('about.update');

// Posts functionality
Route::resource('categories', 'CategoriesController');
Route::resource('tags', 'TagsController');
Route::resource('posts', 'PostController', ['except' => ['update']]);
Route::get('trashed-posts', 'PostController@trashed')->name('trashed-posts.index');
Route::put('restore-posts/{post}', 'PostController@restore')->name('restore-posts');

  // Post update
Route::post('/posts/{id}', 'PostController@update')->name('posts.update');
//redirect1
Route::get('/redirect1', 'PostController@redirect1');
Route::get('/redirect2', 'LinkController@redirect2');
Route::get('/redirectProperty', 'PropertyController@redirectProperty');




Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
Route::put('users/profile', 'UsersController@update')->name('users.update-profile');
Route::post('logout-reset', 'UsersController@logoutReset')->name('logout.reset');
Route::get('password-redirect', 'UsersController@passwordRedirect')->name('password.redirect');

// Servicios functionality
Route::resource('servicios', 'ServicioController', ['except' => ['update']]);
Route::post('servicios/{id}', 'ServicioController@update')->name('servicio.update');
Route::get('trashed-servicios', 'ServicioController@trashed')->name('trashed-servicios.index');
Route::put('restore-servicios/{servicio}', 'ServicioController@restore')->name('restore-servicios');
Route::get('/redirectServicio', 'ServicioController@redirect')->name('servicio.redirect');


});

Route::middleware(['auth','admin'])->group(function() {
  Route::get('users', 'UsersController@index')->name('users.index');
  Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
});
