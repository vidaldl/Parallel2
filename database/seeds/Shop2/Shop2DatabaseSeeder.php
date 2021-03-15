<?php

use Illuminate\Database\Seeder;

class Shop2DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->call(Shop2CatalogItem2sTableSeeder::class);
        $this->call(Shop2CatalogItem3sTableSeeder::class);
        $this->call(Shop2CatalogItemsTableSeeder::class);
        $this->call(Shop2CatalogSection2sTableSeeder::class);
        $this->call(Shop2CatalogSection3sTableSeeder::class);
        $this->call(Shop2CatalogSectionsTableSeeder::class);
        $this->call(Shop2ContenidoAboutsTableSeeder::class);
        $this->call(Shop2ContenidoSection1sTableSeeder::class);
        $this->call(Shop2ContenidoSection2sTableSeeder::class);
        $this->call(Shop2ContenidoSection3sTableSeeder::class);
        $this->call(Shop2ContenidoSection4sTableSeeder::class);
        $this->call(Shop2ContenidoSection5sTableSeeder::class);
        $this->call(Shop2ContenidoSectionFootersTableSeeder::class);
        $this->call(Shop2FontStylesTableSeeder::class);
        $this->call(Shop2FontsTableSeeder::class);
        $this->call(Shop2FooterLinksTableSeeder::class);
        $this->call(Shop2FrasesTableSeeder::class);
        $this->call(Shop2GalleryImagesTableSeeder::class);
        $this->call(Shop2GalleryImagesGalleryItemTableSeeder::class);
        $this->call(Shop2GalleryItemsTableSeeder::class);
        $this->call(Shop2GallerySectionsTableSeeder::class);
        $this->call(Shop2InfoSliderImage2sTableSeeder::class);
        $this->call(Shop2InfoSliderImage3sTableSeeder::class);
        $this->call(Shop2InfoSliderImagesTableSeeder::class);
        $this->call(Shop2InfoSliderText2sTableSeeder::class);
        $this->call(Shop2InfoSliderText3sTableSeeder::class);
        $this->call(Shop2InfoSliderTextsTableSeeder::class);
        $this->call(Shop2InvoicesTableSeeder::class);
        $this->call(Shop2LinkSectionsTableSeeder::class);
        $this->call(Shop2LinksTableSeeder::class);
        $this->call(Shop2MenuItemsTableSeeder::class);
        $this->call(Shop2ModalsTableSeeder::class);
        $this->call(Shop2OrdersTableSeeder::class);
        $this->call(Shop2PortfolioCategoriesTableSeeder::class);
        $this->call(Shop2PortfolioCategoryPortfolioItemTableSeeder::class);
        $this->call(Shop2PortfolioItemsTableSeeder::class);
        $this->call(Shop2PortfolioSectionsTableSeeder::class);
        $this->call(Shop2PostTagTableSeeder::class);
        $this->call(Shop2PostsTableSeeder::class);
        $this->call(Shop2PricingItemsTableSeeder::class);
        $this->call(Shop2PricingPricingItemTableSeeder::class);
        $this->call(Shop2PricingSectionsTableSeeder::class);
        $this->call(Shop2PricingsTableSeeder::class);
        $this->call(Shop2ReceiptInfosTableSeeder::class);
        $this->call(Shop2ReceiptShopItemTableSeeder::class);
        $this->call(Shop2ReceiptsTableSeeder::class);
        $this->call(Shop2Service2sTableSeeder::class);
        $this->call(Shop2ServiceSection2sTableSeeder::class);
        $this->call(Shop2ServiciosTableSeeder::class);
        $this->call(Shop2ShopItemsTableSeeder::class);
        $this->call(Shop2ShopSectionsTableSeeder::class);
        $this->call(Shop2StylesTableSeeder::class);
        $this->call(Shop2TagsTableSeeder::class);
        $this->call(Shop2Text2sTableSeeder::class);
        $this->call(Shop2Text3sTableSeeder::class);
        $this->call(Shop2Text4sTableSeeder::class);
        $this->call(Shop2TextsTableSeeder::class);
        $this->call(Shop2UsersTableSeeder::class);
    }
}
