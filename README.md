# Sample app
This minibase-sample is a good boilerplate for new apps.

Based on the [Minibase](https://github.com/peec/minibase) framework. 


This sample application includes some plugins.

- Doctrine plugin (ORM)
- Twig plugin (templating engine)
- CSRF Protection plugin (for security)

## Install

Install the app with composer.

```bash
composer install
```

By default we use sqlite database driver, so if you want the app to work out of the box.

```bash
# Permissions for the cache dir.
chmod -R 0777 app/cache
# Create the database (db.sqlite)
php cli.php orm:schema-tool:create
# Permissions for sqlite so its writable.
chmod 0777 app/cache/db.sqlite
```


**Security note**: ONLY THE `www` FOLDER SHOULD BE ACCESSIBLE FROM THE WEB SERVER.


## Configure

See app/app.json and app/routes.json to configure.
