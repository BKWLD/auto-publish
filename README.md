# Auto Publish

A small package that automatically publishes the assets of Laravel packages you currently have in your workbench.  You would use it to have an easier workflow for testing css, js, or img changes while developing packages.  The logic ONLY runs on your local enviornment.

## Installation

1. Add it to your composer.json (`"bkwld/auto-publish": "~1.0"`) and do a composer install.

2. Add the service provider to your app.php config file providers: `'Bkwld\AutoPublish\ServiceProvider',`

## Usage

After installing, there is nothing left to do.  All packages in your workbench will have their assets published anew on every browser request.