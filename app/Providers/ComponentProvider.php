<?php

namespace App\Providers;

use App\View\Components\Backend\Form\AddonInput;
use App\View\Components\Backend\Form\Checkbox;
use App\View\Components\Backend\Form\CustomForm;
use App\View\Components\Backend\Form\DateForm;
use App\View\Components\Backend\Form\SlideSwitch;
use App\View\Components\Backend\Partial\CustomAlert;
use Illuminate\Support\ServiceProvider;
use App\View\Components\Backend\Form\FormButton;
use App\View\Components\Backend\Form\Input;
use App\View\Components\Backend\Form\InputFile;
use App\View\Components\Backend\Form\Select;
use App\View\Components\Backend\Form\TextArea;
use App\View\Components\Backend\Partial\PageHeader;
use App\View\Components\Backend\Table\Button\Delete;
use App\View\Components\Backend\Modal\Delete as DeleteModal;
use App\View\Components\Backend\Table\Button\Edit;
use App\View\Components\Backend\Table\Button\Show;
use App\View\Components\Backend\Table\Search;
use Illuminate\Support\Facades\Blade;

class ComponentProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //Backend
        Blade::component('input', Input::class);
        Blade::component('slide-switch', SlideSwitch::class);
        Blade::component('text-area', TextArea::class);
        Blade::component('input-file', InputFile::class);
        Blade::component('form-button', FormButton::class);
        Blade::component('custom-form', CustomForm::class);
        Blade::component('select', Select::class);
        Blade::component('showButton', Show::class);
        Blade::component('editButton', Edit::class);
        Blade::component('deleteButton', Delete::class);
        Blade::component('deleteModal', DeleteModal::class);
        Blade::component('page-header',PageHeader::class);
        Blade::component('search',Search::class);
        Blade::component('addon-input',AddonInput::class);
        Blade::component('custom-alert',CustomAlert::class);
        Blade::component('date-form',DateForm::class);
        Blade::component('checkbox',Checkbox::class);
    }
}
