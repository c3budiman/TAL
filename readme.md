## Template Admin Laravel
<h2>template ini buat php 5.6 di laravel 5.1</h2>
<br>
<h2>template ini dapat dipakai buat projek yang butuh cepet kelar, cara pake nya : </h2>
1. composer install
2. buat file .env atau copy .env.example lalu edit dan sesuaikan dengan database
3. php artisan key:generate
4. php artisan migrate
5. php artisan vendor:publish
6. press 0 and enter
7. now open /daftar and register one user.
8. enjoy!

## Roles Management

Roles can only be defined once!
to define roles u need to edit the migration files inside /database/migration/2014_10_12_000000_create_users_table.php

to manage roles use controller!
for example if u want to limit access for some controller admin only then u need to put this in your controller :

```bash
public function getRoleAdmin() {
  $rolesyangberhak = DB::table('roles')->where('id','=','1')->first()->namaRule;
  //the id can be changed for each roles
  return $rolesyangberhak;
}

public function __construct()
{
    $this->middleware('auth');
    $this->middleware('rule:'.$this->getRoleAdmin().',nothingelse');
}
```

## User Management

the /daftar can register user and automatically set it to admin level.
you can make /daftar disabled in routes.php

## Website Management

Website management is automatically set u just need to login as admin and go to the menu and set everything that you need there.

## Security Vulnerabilities

If you discover a security vulnerability within this project, please send an e-mail to me at c3budiman@gmail.com . All security vulnerabilities will be promptly addressed.

### License

The Template Admin Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
