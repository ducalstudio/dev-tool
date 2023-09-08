<?php

namespace Ducal\DevTool\Providers;

use Ducal\Base\Supports\ServiceProvider;
use Ducal\DevTool\Commands\LocaleCreateCommand;
use Ducal\DevTool\Commands\LocaleRemoveCommand;
use Ducal\DevTool\Commands\Make\ControllerMakeCommand;
use Ducal\DevTool\Commands\Make\FormMakeCommand;
use Ducal\DevTool\Commands\Make\ModelMakeCommand;
use Ducal\DevTool\Commands\Make\RepositoryMakeCommand;
use Ducal\DevTool\Commands\Make\RequestMakeCommand;
use Ducal\DevTool\Commands\Make\RouteMakeCommand;
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
            RepositoryMakeCommand::class,
            PackageCreateCommand::class,
            PackageMakeCrudCommand::class,
            PackageRemoveCommand::class,
            TestSendMailCommand::class,
            RebuildPermissionsCommand::class,
            LocaleRemoveCommand::class,
            LocaleCreateCommand::class,
            PluginCreateCommand::class,
            PluginMakeCrudCommand::class,
            ThemeCreateCommand::class,
            WidgetCreateCommand::class,
            WidgetRemoveCommand::class,
        ]);
    }
}
