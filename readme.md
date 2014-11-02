# Flattr #

Plugin for [Saito-Forum][saito]. Adds Flattr button to postings and user profile page.

[saito]: https://github.com/Schlaefer/Saito

## Install ##

Either clone/copy the files in this directory into `app/Plugin/Flattr` or using composer:

```json
{
    "require": {
        "schlaefer/saito-flattr": "*"
    }
}
```

Add new database-fields:

```mysql
ALTER TABLE `users` ADD `flattr_uid` VARCHAR(24)  NULL  DEFAULT NULL;
ALTER TABLE `users` ADD `flattr_allow_user` TINYINT(1)  NULL  DEFAULT NULL  AFTER `flattr_uid`;
ALTER TABLE `users` ADD `flattr_allow_posting` TINYINT(1)  NULL  DEFAULT NULL  AFTER `flattr_allow_user`;

ALTER TABLE `entries` ADD `flattr` TINYINT(1)  NULL  DEFAULT NULL;
```

Empty the cache in the admin panel to register the DB-changes.


Add to `saito_config.php`:

```php
CakePlugin::load('Flattr', ['bootstrap' => true]);
```

## Uninstall ##

Remove database-fields:

```mysql
ALTER TABLE `users` DROP `flattr_allow_posting`;
ALTER TABLE `users` DROP `flattr_allow_user`;
ALTER TABLE `users` DROP `flattr_uid`;

ALTER TABLE `entries` DROP `flattr`;
```

Empty the cache in the admin panel to register the DB-changes.
