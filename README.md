# CI-Aauth-Boilerplate

Codeigniter 3.1.11 x Aauth 2.5.15

### Setup

- Update config files accordingly

```php
# application/config/config.php
$config['base_url'] = '';

# application/config/database.php
'hostname' => 'localhost',
'username' => '',
'password' => '',
'database' => '',
```

### Database
- Create database on MySQL server
- Import `aauth.sql`, delete after importing

### Credentials

Default Aauth login for Super Administrator:

```
Username: admin@example.com
Password: admin@example.com
```