<?php

use Illuminate\Database\Seeder;

class ShopDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->call(ShopCatalogItem2sTableSeeder::class);
        $this->call(ShopCatalogItem3sTableSeeder::class);
        $this->call(ShopCatalogItemsTableSeeder::class);
        $this->call(ShopCatalogSection2sTableSeeder::class);
        $this->call(ShopCatalogSection3sTableSeeder::class);
        $this->call(ShopCatalogSectionsTableSeeder::class);
        $this->call(ShopContenidoAboutsTableSeeder::class);
        $this->call(ShopContenidoSection1sTableSeeder::class);
        $this->call(ShopContenidoSection2sTableSeeder::class);
        $this->call(ShopContenidoSection3sTableSeeder::class);
        $this->call(ShopContenidoSection4sTableSeeder::class);
        $this->call(ShopContenidoSection5sTableSeeder::class);
        $this->call(ShopContenidoSectionFootersTableSeeder::class);
        $this->call(ShopFontStylesTableSeeder::class);
        $this->call(ShopFontsTableSeeder::class);
        $this->call(ShopFooterLinksTableSeeder::class);
        $this->call(ShopFrasesTableSeeder::class);
        $this->call(ShopGalleryImagesTableSeeder::class);
        $this->call(ShopGalleryImagesGalleryItemTableSeeder::class);
        $this->call(ShopGalleryItemsTableSeeder::class);
        $this->call(ShopGallerySectionsTableSeeder::class);
        $this->call(ShopInfoSliderImage2sTableSeeder::class);
        $this->call(ShopInfoSliderImage3sTableSeeder::class);
        $this->call(ShopInfoSliderImagesTableSeeder::class);
        $this->call(ShopInfoSliderText2sTableSeeder::class);
        $this->call(ShopInfoSliderText3sTableSeeder::class);
        $this->call(ShopInfoSliderTextsTableSeeder::class);
        $this->call(ShopInvoicesTableSeeder::class);
        $this->call(ShopLinkSectionsTableSeeder::class);
        $this->call(ShopLinksTableSeeder::class);
        $this->call(ShopMenuItemsTableSeeder::class);
        $this->call(ShopModalsTableSeeder::class);
        $this->call(ShopOrdersTableSeeder::class);
        $this->call(ShopPortfolioCategoriesTableSeeder::class);
        $this->call(ShopPortfolioCategoryPortfolioItemTableSeeder::class);
        $this->call(ShopPortfolioItemsTableSeeder::class);
        $this->call(ShopPortfolioSectionsTableSeeder::class);
        $this->call(ShopPostTagTableSeeder::class);
        $this->call(ShopPostsTableSeeder::class);
        $this->call(ShopPricingItemsTableSeeder::class);
        $this->call(ShopPricingPricingItemTableSeeder::class);
        $this->call(ShopPricingSectionsTableSeeder::class);
        $this->call(ShopPricingsTableSeeder::class);
        $this->call(ShopReceiptInfosTableSeeder::class);
        $this->call(ShopReceiptShopItemTableSeeder::class);
        $this->call(ShopReceiptsTableSeeder::class);
        $this->call(ShopService2sTableSeeder::class);
        $this->call(ShopServiceSection2sTableSeeder::class);
        $this->call(ShopServiciosTableSeeder::class);
        $this->call(ShopShopItemsTableSeeder::class);
        $this->call(ShopShopSectionsTableSeeder::class);
        $this->call(ShopStylesTableSeeder::class);
        $this->call(ShopTagsTableSeeder::class);
        $this->call(ShopText2sTableSeeder::class);
        $this->call(ShopText3sTableSeeder::class);
        $this->call(ShopText4sTableSeeder::class);
        $this->call(ShopTextsTableSeeder::class);
        $this->call(ShopUsersTableSeeder::class);
    }
}
