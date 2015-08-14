# FieldtypeSecureFile
A ProcessWire Fieldtype storing files in a customized location, outside the web root. This module is primarily useful if you need to store sensitive data which should not be accessible directly from the web. Normally, ProcessWire stores all files under `/site/assets/files`. Direct URL access to these files can be restriced by setting `$config->pagefileSecure = true`. Still you need to make sure that your template permissions are setup correctly.

## Installation
Please take a look at the following guide: http://modules.processwire.com/install-uninstall/

## Configuration
After installing this module, you can create a new field of type `SecureFile`. Enter your configuration under the "Details" section when editing the field:
* **Storage Location** Enter a path outside the web root where the files are stored. You need to create the directory manually. Also make sure that the user running the web server has write permission.
* **Roles allowing to download a secure file** Users with a role selected here are able to download the files if a download is requested via the API.
* **Allow Download in Admin** If checked, users having a role selected above can download the files when editing a page.

## API
If you want to download a secure file, you can call `PagefileSecure::download()`. This method also makes sure that the current user is allowed to download the file, according to the permission configuration.

Example:
```php
$secureFile = $page->secureFiles->first();
$secureFile->isDownloadable(); // Returns true if the current user is allowed to download
$secureFile->download(); // Performs the check above and delivers the file via the wireSendFile() function
```
