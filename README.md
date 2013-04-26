# Sample app
This minibase-sample is a good boilerplate for new apps.

![Sample app index](/screenshots/index.png)


Based on the [Minibase](https://github.com/peec/minibase) framework. 



This sample application includes some plugins.

- [Doctrine plugin](https://github.com/peec/minibase-plugin-doctrine) (ORM)
- [Twig plugin](https://github.com/peec/minibase-plugin-twig) (templating engine)
- [CSRF Protection plugin](https://github.com/peec/minibase-plugin-csrfprotection) (for security)
- [Auth plugin](https://github.com/peec/minibase-plugin-auth) , allows easy authentication out of the box. Supports facebook auth, normal auth and more. 


## Install

Install the app with composer.

```bash
composer install
```

See the configuration file for the app (`app/app.json`). And configure the database settings.

After a database is created, you can run these commands:

```bash
# Permissions for the cache dir.
chmod -R 0777 app/cache
# Create the database (db.sqlite)
php cli.php orm:schema-tool:create
```


**Security note**: ONLY THE `www` FOLDER SHOULD BE ACCESSIBLE FROM THE WEB SERVER.


## Configure

See app/app.json and app/routes.json to configure.


## Secure

By default this app is secure against:

- XSS attacks (the twig plugin)
- CSRF attacks (the csrf plugin)
- Sql Injections (the doctrine plugin)


## Some screenshots

Since we included the auth plugin, we can override the template files and include them in our app.

![Sample app index](/screenshots/login.png)


Using custom annotation only admins can access the admin page.

![Sample app index](/screenshots/admin-panel.png)


