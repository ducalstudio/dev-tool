<?php

namespace Ducal\DevTool\Providers;

use Ducal\Base\Supports\ServiceProvider;
use Ducal\DevTool\Commands\LocaleCreateCommand;
use Ducal\DevTool\Commands\LocaleRemoveCommand;
use Ducal\DevTool\Commands\Make\ControllerMakeCommand;
use Ducal\DevTool\Commands\Make\FormMakeCommand;
use Ducal\DevTool\Commands\Make\ModelMakeCommand;
use Ducal\DevTool\Commands\Make\PanelSectionMakeCommand;
use Ducal\DevTool\Commands\Make\RequestMakeCommand;
use Ducal\DevTool\Commands\Make\RouteMakeCommand;
use Ducal\DevTool\Commands\Make\SettingControllerMakeCommand;
use Ducal\DevTool\Commands\Make\SettingFormMakeCommand;
use Ducal\DevTool\Commands\Make\SettingMakeCommand;
use Ducal\DevTool\Commands\Make\SettingRequestMakeCommand;
use Ducal\DevTool\Commands\Make\TableMakeCommand;
use Ducal\DevTool\Commands\PackageCreateCommand;
use Ducal\DevTool\Commands\PackageMakeCrudCommand;
use Ducal\DevTool\Commands\PackageRemoveCommand;
use Ducal\DevTool\Commands\PluginCreateCommand;
use Ducal\DevTool\Commands\PluginMakeCrudCommand;
use Ducal\DevTool\Commands\RebuildPermissionsCommand;
use Ducal\DevTool\Commands\TestSendMailCommand;
use Ducal\DevTool\Commands\ThemeCreateCommand;
use Ducal\DevTool\Commands\WidgetCreateCommand;
use Ducal\DevTool\Commands\WidgetRemoveCommand;

class CommandServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            TableMakeCommand::class,
            ControllerMakeCommand::class,
            RouteMakeCommand::class,
            RequestMakeCommand::class,
            FormMakeCommand::class,
            ModelMakeCommand::class,
            PackageCreateCommand::class,
            PackageMakeCrudCommand::class,
            PackageRemoveCommand::class,
            TestSendMailCommand::class,
            RebuildPermissionsCommand::class,
            LocaleRemoveCommand::class,
            LocaleCreateCommand::class,
        ]);

        if (version_compare(get_core_version(), '7.0.0', '>=')) {
            $this->commands([
                PanelSectionMakeCommand::class,
                SettingControllerMakeCommand::class,
                SettingRequestMakeCommand::class,
                SettingFormMakeCommand::class,
                SettingMakeCommand::class,
            ]);
        }

        if (class_exists(\Ducal\PluginManagement\Providers\PluginManagementServiceProvider::class)) {
            $this->commands([
                PluginCreateCommand::class,
                PluginMakeCrudCommand::class,
            ]);
        }

        if (class_exists(\Ducal\Theme\Providers\ThemeServiceProvider::class)) {
            $this->commands([
                ThemeCreateCommand::class,
            ]);
        }

        if (class_exists(\Ducal\Widget\Providers\WidgetServiceProvider::class)) {
            $this->commands([
                WidgetCreateCommand::class,
                WidgetRemoveCommand::class,
            ]);
        }
    }
}
