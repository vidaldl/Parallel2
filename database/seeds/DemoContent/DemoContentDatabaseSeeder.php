<?php

use Illuminate\Database\Seeder;

class DemoContentDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->call(DemoContentCatalogItem2sTableSeeder::class);
        $this->call(DemoContentCatalogItem3sTableSeeder::class);
        $this->call(DemoContentCatalogItemsTableSeeder::class);
        $this->call(DemoContentCatalogSection2sTableSeeder::class);
        $this->call(DemoContentCatalogSection3sTableSeeder::class);
        $this->call(DemoContentCatalogSectionsTableSeeder::class);
        $this->call(DemoContentContenidoAboutsTableSeeder::class);
        $this->call(DemoContentContenidoSection1sTableSeeder::class);
        $this->call(DemoContentContenidoSection2sTableSeeder::class);
        $this->call(DemoContentContenidoSection3sTableSeeder::class);
        $this->call(DemoContentContenidoSection4sTableSeeder::class);
        $this->call(DemoContentContenidoSection5sTableSeeder::class);
        $this->call(DemoContentContenidoSectionFootersTableSeeder::class);
        $this->call(DemoContentFontStylesTableSeeder::class);
        $this->call(DemoContentFontsTableSeeder::class);
        $this->call(DemoContentFooterLinksTableSeeder::class);
        $this->call(DemoContentFrasesTableSeeder::class);
        $this->call(DemoContentGalleryImagesTableSeeder::class);
        $this->call(DemoContentGalleryImagesGalleryItemTableSeeder::class);
        $this->call(DemoContentGalleryItemsTableSeeder::class);
        $this->call(DemoContentGallerySectionsTableSeeder::class);
        $this->call(DemoContentInfoSliderImage2sTableSeeder::class);
        $this->call(DemoContentInfoSliderImage3sTableSeeder::class);
        $this->call(DemoContentInfoSliderImagesTableSeeder::class);
        $this->call(DemoContentInfoSliderText2sTableSeeder::class);
        $this->call(DemoContentInfoSliderText3sTableSeeder::class);
        $this->call(DemoContentInfoSliderTextsTableSeeder::class);
        $this->call(DemoContentLinkSectionsTableSeeder::class);
        $this->call(DemoContentLinksTableSeeder::class);
        $this->call(DemoContentMenuItemsTableSeeder::class);
        $this->call(DemoContentModalsTableSeeder::class);
        $this->call(DemoContentOrdersTableSeeder::class);
        $this->call(DemoContentPortfolioCategoriesTableSeeder::class);
        $this->call(DemoContentPortfolioCategoryPortfolioItemTableSeeder::class);
        $this->call(DemoContentPortfolioItemsTableSeeder::class);
        $this->call(DemoContentPortfolioSectionsTableSeeder::class);
        $this->call(DemoContentPostTagTableSeeder::class);
        $this->call(DemoContentPostsTableSeeder::class);
        $this->call(DemoContentPricingItemsTableSeeder::class);
        $this->call(DemoContentPricingPricingItemTableSeeder::class);
        $this->call(DemoContentPricingSectionsTableSeeder::class);
        $this->call(DemoContentPricingsTableSeeder::class);
        $this->call(DemoContentServiciosTableSeeder::class);
        $this->call(DemoContentShopItemsTableSeeder::class);
        $this->call(DemoContentShopSectionsTableSeeder::class);
        $this->call(DemoContentStylesTableSeeder::class);
        $this->call(DemoContentTagsTableSeeder::class);
        $this->call(DemoContentText2sTableSeeder::class);
        $this->call(DemoContentText3sTableSeeder::class);
        $this->call(DemoContentText4sTableSeeder::class);
        $this->call(DemoContentTextsTableSeeder::class);
        $this->call(DemoContentUsersTableSeeder::class);
    }
}
