adverto-cms
===========

A Symfony project created on April 20, 2017, 11:08 am.

** Project currently requires redis-server to be installed **
** Composer is required for package management https://getcomposer.org/ **

Clone project into directory

Common Post-Deployment Tasks

After deploying your actual source code, there are a number of common things you'll need to do:

A) Check Requirements

Check if your server meets the requirements by running:

 php bin/symfony_requirements
 
B) Configure your app/config/parameters.yml File

This file should not be deployed, but managed through the automatic utilities provided by Symfony.

C) Install/Update your Vendors

Your vendors can be updated before transferring your source code (i.e. update the vendor/ directory, then transfer that with your source code) or afterwards on the server. Either way, just update your vendors as you normally do:

 composer install --no-dev --optimize-autoloader
 
The --optimize-autoloader flag improves Composer's autoloader performance significantly by building a "class map". The --no-dev flag ensures that development packages are not installed in the production environment.

If you get a "class not found" error during this step, you may need to run export SYMFONY_ENV=prod before running this command so that the post-install-cmd scripts run in the prod environment.

D) Clear your Symfony Cache

Make sure you clear (and warm-up) your Symfony cache:

 php bin/console cache:clear --env=prod --no-debug
 
E) Dump your Assetic Assets

If you're using Assetic, you'll also want to dump your assets:

 php bin/console assetic:dump --env=prod --no-debug

