<?php

use App\Models\User;
use App\Models\Team;
use Spatie\Permission\Models\Role;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\UserTable;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\UserFilters;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\UserActions;
use TomatoPHP\FilamentUsers\Resources\UserResource\Table\UserBulkActions;
use TomatoPHP\FilamentUsers\Resources\UserResource\Form\UserForm;
use TomatoPHP\FilamentUsers\Resources\UserResource\Infolist\UserInfoList;
use TomatoPHP\FilamentUsers\Resources\UserResource\Actions\ManageUserActions;
use TomatoPHP\FilamentUsers\Resources\UserResource\Actions\CreatePageActions;
use TomatoPHP\FilamentUsers\Resources\UserResource\Actions\EditPageActions;
use TomatoPHP\FilamentUsers\Resources\UserResource\Actions\ViewPageActions;

return [
    /**
     * ---------------------------------------------
     * Publish Resource
     * ---------------------------------------------
     * The resource that will be used for the user management.
     * If you want to use your own resource, you can set this to true.
     * and use `php artisan filament-user:publish` to publish the resource.
     */
    'publish_resource' => false,

    /**
     * ---------------------------------------------
     * Change The Group Name And Override Translated One
     * ---------------------------------------------
     * The Group name of the resource.
     */
    'group' => 'Settings',

    /**
     * ---------------------------------------------
     * User Filament Impersonate
     * ---------------------------------------------
     * if you are using filament impersonate, you can set this to true.
     */
    'impersonate' => false,

    /**
     * ---------------------------------------------
     * User Filament Shield
     * ---------------------------------------------
     *  if you are using filament shield, you can set this to true.
     */
    'shield' => false,

    /**
     * ---------------------------------------------
     * Use Simple Resource
     * ---------------------------------------------
     * change the resource from pages to modals by allow simple resource.
     */
    'simple' => true,

    /**
     * ---------------------------------------------
     * Use Teams
     * ---------------------------------------------
     * if you want to allow team resource and filters and actions.
     */
    'teams' => false,

    /**
     * ---------------------------------------------
     * User Model
     * ---------------------------------------------
     * if you when to custom the user model path
     */
    'model' => User::class,

    /**
     * ---------------------------------------------
     * Team Model
     * ---------------------------------------------
     * if you when to custom the team model path
     */
    'team_model' => Team::class,

    /**
     * ---------------------------------------------
     * Role Model
     * ---------------------------------------------
     * if you when to custom the role model path
     */
    'roles_model' => Role::class,

    /**
     * ---------------------------------------------
     * Resource Building
     * ---------------------------------------------
     * if you want to use the resource custom class
     */
    'resource' => [
        'table' => [
            'class' => UserTable::class,
            'filters' => UserFilters::class,
            'actions' => UserActions::class,
            'bulkActions' => UserBulkActions::class,
        ],
        'form' => [
            'class' => UserForm::class,
        ],
        'infolist' => [
            'class' => UserInfoList::class,
        ],
        'pages' => [
            'list' => ManageUserActions::class,
            'create' => CreatePageActions::class,
            'edit' => EditPageActions::class,
            'view' => ViewPageActions::class,
        ],
    ],
];
