<?php namespace Bkwld\AutoPublish;

class ServiceProvider extends \Illuminate\Support\ServiceProvider {

	// Register no instances
	public function register() {}

	// Run logic
	public function boot() {

		// Only run locally
		if ($this->app->environment() != 'local') return;
		
		// Don't publish if running through CLI
		if ($this->app->runningInConsole()) return;

		// Register the asset publisher, which is ordinarily only
		// registered if running through the console
		$this->app->register('Illuminate\Foundation\Providers\PublisherServiceProvider');
		$publisher = $this->app->make('asset.publisher');
		
		// Get a list of workbench packages and publish them one by one
		$workbench = base_path().'/workbench';
		$workbench_strlen = strlen($workbench);
		foreach(glob($workbench.'/*/*', GLOB_ONLYDIR) as $dir) {

			// Check that that package has assets
			if (!is_dir($dir.'/public')) continue;
			
			// Publish it
			$package = substr($dir, $workbench_strlen+1);
			$publisher->publishPackage($package, $workbench);
		}		
	}

}