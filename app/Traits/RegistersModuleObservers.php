<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

trait RegistersModuleObservers
{
    /**
     * Register observers from a given module (e.g. "Extra").
     *
     * @param string $moduleName Name of the module (must match folder name exactly)
     * @param string $modelsSubNamespace Default: 'Models'
     * @param string $observersSubNamespace Default: 'Observers'
     * @return void
     */
    public function registerModuleObservers(
        string $moduleName,
        string $modelsSubNamespace = 'Models',
        string $observersSubNamespace = 'Observers'
    ): void {
        $modelNamespace = "Modules\\$moduleName\\$modelsSubNamespace\\";
        $observerNamespace = "Modules\\$moduleName\\$observersSubNamespace\\";
        $observerPath = base_path("Modules/$moduleName/$observersSubNamespace");

        if (!File::isDirectory($observerPath)) {
            Log::warning("Observers directory not found for module [$moduleName]: $observerPath");
            return;
        }

        $files = File::files($observerPath);

        foreach ($files as $file) {
            $observerClass = $observerNamespace . $file->getFilenameWithoutExtension();
            $modelBaseName = str_replace('Observer', '', class_basename($observerClass));
            $modelClass = $modelNamespace . $modelBaseName;

            if (class_exists($modelClass) && class_exists($observerClass)) {
                $modelClass::observe($observerClass);
                Log::info("✅ Registered: $observerClass for $modelClass");
            } else {
                Log::warning("⚠️ Could not register observer: $observerClass or $modelClass not found.");
            }
        }
    }
}
