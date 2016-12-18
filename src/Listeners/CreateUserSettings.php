<?php

namespace App\Listeners;

use App\Events\UserWasCreated;
use App\Models\Categories\Category;
use App\Models\Modules\Module;
use App\Models\Modules\ModuleType;
use App\Models\Products\Product;
use App\Repositories\Account\AccountRepository;
use App\Repositories\Billing\BillingRepository;
use App\Repositories\Invoice\InvoiceRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Repositories\Settings\SettingsRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Event;
use Modules\Core\Entities\Menu\Menu;
use Modules\Core\Events\ProductWasCreated;

class CreateUserSettings
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * Throws error if user settings found in db
     *
     * @param  UserWasCreated $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        $user_row = array('user_id' => $event->userRow['id']);

        //make directories
        if (!file_exists(public_path().'/user/user-'.(int)$event->userRow['id'].'/css')) {
            mkdir(public_path().'/user/user-'.$event->userRow['id'].'/css', 0777, true);
        }

        //make directories
        if (!file_exists(public_path().'/user/user-'.(int)$event->userRow['id'].'/img')) {
            mkdir(public_path().'/user/user-'.(int)$event->userRow['id'].'/img', 0777, true);
        }
        
        //make directories
        if (!file_exists(public_path().'/user/user-'.(int)$event->userRow['id'].'/files')) {
        	mkdir(public_path().'/user/user-'.(int)$event->userRow['id'].'/files', 0777, true);
        }

        //logo directory
        if (!file_exists(public_path().'/user/user-'.(int)$event->userRow['id'].'/img/original')) {
            mkdir(public_path().'/user/user-'.(int)$event->userRow['id'].'/img/original', 0777, true);
        }

        //laravel filemanager photos
        if (!file_exists(public_path().'/user/user-'.(int)$event->userRow['id'].'/img/shares')) {
            mkdir(public_path().'/user/user-'.(int)$event->userRow['id'].'/img/shares', 0777, true);
        }

        $settingsR = new SettingsRepository();


        /**
         *  Get  default css settings rows
         *  Note: Each user has one row in settings
         */

        $default['logo'] = $settingsR->getSettingsLogoDefault($user_row);
        $default['google_font'] = $settingsR->getSettingsGoogleFontDefault($user_row);
        $default['google_map'] = $settingsR->getSettingsGoogleMapDefault($user_row);
        $default['contacts'] = $settingsR->getSettingsContactsDefault($user_row);
        $default['posts'] = $settingsR->getSettingsPostsDefault($user_row);
        $default['banner_content'] = $settingsR->getSettingsBannerContentDefault($user_row);
        $default['thumbnails'] = $settingsR->getSettingsThumbnailsDefault($user_row);
        $default['logo_css'] = $settingsR->getSettingsLogoCssDefault($user_row);
        $default['banner_css'] = $settingsR->getSettingsBannerCssDefault($user_row);
        $default['banner_content_css'] = $settingsR->getSettingsBannerContentCssDefault($user_row);
        $default['header_css'] = $settingsR->getSettingsHeaderCssDefault($user_row);
        $default['footer_css'] = $settingsR->getSettingsFooterCssDefault($user_row);
        $default['content_css'] = $settingsR->getSettingsContentCssDefault($user_row);
        $default['header_menu_item_css'] = $settingsR->getSettingsHeaderMenuItemCssDefault($user_row);
        $default['footer_menu_item_css'] = $settingsR->getSettingsFooterMenuItemCssDefault($user_row);
        $default['body_css'] = $settingsR->getSettingsBodyCssDefault($user_row);

        $settingsR->createSettingsLogo((array)$default['logo']);
        $settingsR->createSettingsGoogleFont((array)$default['google_font']);
        $settingsR->createSettingsGoogleMap((array)$default['google_map']);
        $settingsR->createSettingsContacts((array)$default['contacts']);
        $settingsR->createSettingsPosts((array)$default['posts']);
        $settingsR->createSettingsBannerContent((array)$default['banner_content']);
        $settingsR->createSettingsLogoCss((array)$default['logo_css']);
        $settingsR->createSettingsBannerCss((array)$default['banner_css']);
        $settingsR->createSettingsBannerContentCss((array)$default['banner_content_css']);
        $settingsR->createSettingsHeaderCss((array)$default['header_css']);
        $settingsR->createSettingsFooterCss((array)$default['footer_css']);
        $settingsR->createSettingsContentCss((array)$default['content_css']);
        $settingsR->createSettingsBodyCss((array)$default['body_css']);
        $settingsR->createSettingsHeaderMenuItemCss((array)$default['header_menu_item_css']);
        $settingsR->createSettingsFooterMenuItemCss((array)$default['footer_menu_item_css']);



        $settingsR->makeCssFile($event->userRow['id']);

        foreach ($default['thumbnails'] as $thumbnail) {
            $settingsR->createSettingsThumbnails((array)$thumbnail);
        }

        /**
         * Create user billing
         */
        $billingR = new BillingRepository();
        $data = array(
            'period_in_month' => 1,
            'is_active' => 0
        );

        $billing = $billingR->createBilling($data);

        /**
         * Create user financial account
         */

        $accountR = new AccountRepository();
        $current_time = Carbon::now();

        $data = array(
            'preview_id' => 'ACC' . strtoupper(str_random(7)),
            'amount' => 10,
            'billing_id' => $billing->id,
            'user_id' => $event->userRow['id'],
            'valid_until' => $current_time
        );

        $account = $accountR->createAccount($data);

        /**
         * Create user default invoice
         */

        $invoiceR = new InvoiceRepository();

        $data = array(
            'number' => 0,
            'preview_id' => 0,
            'key' => 'DEFAULT',
            'status' => 'CREATED',
            'amount_total' => 0,
            'vat_is_calculated' => 1,
            'user_id' => $event->userRow['id'],
            'account_id' => $account->id
        );

        $invoice = $invoiceR->createInvoice($data);

        /**
         * Create user invoice statement
         */

        $data = array(
            'name' => 'Default invoice statement of €10,00',
            'quantity' => 1,
            'amount' => 10,
            'amount_total' => 10 * 1,
            'invoice_id' => $invoice->id
        );

        $invoiceStatement = $invoiceR->createInvoiceStatement($data);

        /**
         *  Create vat
         */
        $data = array(
            'name' => 'Default vat 19,00%',
            'percent' => 19.00,
            'account_id' => $account->id,
            'is_active' => 1
        );

        $vatType = $invoiceR->createVatType($data);


        /**
         *  Get active vat
         */

        $vatType = $invoiceR->getActiveVatType(array(
            'account_id' => $account->id,
            'is_active' => 1
        ));

        /**
         *  Calculate total invoice statement and vat
         */

        $data = array('invoice_id' => $invoice->id);

        $invoiceStatementsCollection = $invoiceR->getInvoiceStatements($data);
        $invoiceAmount = 0;
        foreach ($invoiceStatementsCollection as $invoiceStatement) {
            $invoiceAmount += $invoiceStatement->amount_total;
        }

        $vatAmount = $invoiceR->calculateVat($invoiceAmount, $vatType->percent);

        $invoiceTotal = $invoiceAmount + $vatAmount;

        /**
         *  Update invoice amounts and vat
         */

        $data = array('account_id' => $account->id);
        $invoice = $invoiceR->getDefaultInvoice($data);

        $data = array(
            'amount_statements' => $invoiceAmount,
            'amount_vat' => $vatAmount,
            'amount_total' => $invoiceTotal
        );

        $invoiceR->updateInvoice($data, array('id' => $invoice->id));

        $this->createModuleType($event);
        $this->createCustomMenu($event);
    }

    private function createModuleType(UserWasCreated $event){
        $input = [
            "name" => "CMS Product",
            "user_id" => $event->userRow['id'],
            "key" => "CMS_Product"
        ];

        $module_type = ModuleType::create($input);
        $this->createModules($module_type, $event);
    }


    private function createModules($module_type, UserWasCreated $event){
        $user_row = array('user_id' => $event->userRow['id']);
        $counter= 1;
        
        $input = [
            "name" => "CMS",
            "module_type_id" => $module_type->id,
            "user_id"=> $event->userRow['id'],
            "key"=> "CMS",
            "api_key" => "",
            "api_enabled" => true,
            "ordering" => $counter,
            "source" => "SYSTEM"
        ];
        
        $module = Module::create($input);
        $this->createCategories($module_type, $module->id, $event);
    }

    private function createCategories($module_type, $module_id, UserWasCreated $event){
        $input = [
            "name" => "Page",
            "user_id" => $event->userRow['id'],
            "module_id"=> $module_id,
            "key" => "PAGE",
            "ordering" => 1,
            "source" => "SYSTEM"
        ];

        $home_category = Category::create($input);

        $input = [
            "name" => "Post",
            "user_id" => $event->userRow['id'],
            "module_id"=> $module_id,
            "key" => "POST",
            "ordering" => 2,
            "source" => "SYSTEM"
        ];

        Category::create($input);

        $input = [
            "name" => "Home Page",
            "user_id" => $event->userRow['id'],
            "module_id"=> $module_id,
            "key" => "HOME_PAGE",
            "ordering" => 3,
            "source" => "SYSTEM"
        ];

        $home_page_category = Category::create($input);
        $this->createProducts($module_type, $home_page_category->id, $module_id,  $event);
    }

    private function createProducts($module_type, $category_id, $module_id,  UserWasCreated $event){
        $input = [
            "name" => "HOME",
            "user_id" => $event->userRow['id'],
            "module_type_id" => $module_type->id,
            "module_id" => $module_id,
            "category_id" => $category_id,
            "permalink" => "home",
            "title" => "Home",
            "description" => "Home Page",
            "key" => "HOME-PAGE",
            "source" => "SYSTEM",
            "ordering" => 1
        ];

        $product = Product::create($input);
        Event::fire(new ProductWasCreated(array('product_id' => $product->id)));
    }

    private function createCustomMenu(UserWasCreated $event){
        $input = [
            'name' => 'Custom menu',
            'user_id' => $event->userRow['id'],
            'key' => 'CUSTOM_MENU'
        ];

        Menu::create($input);
    }

}
