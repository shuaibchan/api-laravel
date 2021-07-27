<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## API ENDPOINT SERVER
 

Simple Endpoint Server for user registration and products CRUD.
Package use for this project is:

-  [Laravel Passport](https://laravel.com/docs/8.x/passport).
	- Laravel Passport provides a full OAuth2 server implementation for Laravel application in a matter of minutes. Passport is built on top of the [League OAuth2 server](https://github.com/thephpleague/oauth2-server) that is maintained by Andy Millington and Simon Hamp.

-  [Spatie Laravel-permission](https://spatie.be/docs/laravel-permission/v4/introduction).
	- This package allow us to manage user permissions and roles in a database.
## #Installation

    git clone https://github.com/shuaibchan/api-laravel.git
    cd api-laravel
    git update
    php artisan migrate
    php artisan db:seed
    


**There are Three Roles of User in this system that is:**
	1. SuperAdmin(**Can Delete/Update product**).
	2. Admin(**Can Delete/Update product** ).
	3. User(**Can view product**).

![Register User](https://i.imgur.com/uB6WURh.png)

![Register User](https://i.imgur.com/dxNKa2J.png)
1. Register User
endpoint : https://localhost/api/register
Method : POST
```bash
{
	"name":"aaliyahaa",
	"email":"aaliyahaa@gmail.com",
	"password":"sumayyah",
	"c_password":"sumayyah"
}
```
Response :
```bash
{
	"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYjVmZTQ4YTFmMjU3ZGRmNTlhZTUzM2FlM2ZkMGJhMjU2Yzg1ZmNlZGI3YjY3ZWIyZDYyNDk5ZGRjOTgxNzFkY2U1MjBmODRlODQxZDk0ZmMiLCJpYXQiOjE2MjczODU2NDUuMzgwMzUxLCJuYmYiOjE2MjczODU2NDUuMzgwMzU0LCJleHAiOjE2NTg5MjE2NDUuMzc3MTA5LCJzdWIiOiIxMCIsInNjb3BlcyI6W119.xfuYAnNz2h1IGOnToykeM9ZBcnjqIlqUxvgYjV5-oCB_ZvY1Yha6g7GGiZ1c4khWhA7oI3SCuU5z_2QU4ngs58Pi1I1nGwtvh9cPF8BlhRxHcUD542Tp8uXgDyn_pEeDFswKArqDUMBWfowNhrnI9L3tqOB3AdZXdOtwLvpDsW6yayiRAa1o63CnN4OvOEEqzz3-pvcdfzaaX40dfpQx6oQOSiVA0wFf9m_BuThiiju19oyDyPZTIFFAN_3k7QESGRdUrrA_ygRUsKODGxPzpFkllMqiChd5HUF45i0cz3rJ5Bw2M4Oc02dVBmDcDkeJyKgeVOY9CFmnL_JxrlTmRBXIuYH8URFKnW591IPSE6Cz-NdrJS8PCxVW3PFwHu7HEggMON-hI5tOtneU8FgZrDo9KheIWcb739w1sHPrS2zZ05p-W0V86BrOOcJbNoLOfhdCJ3r0AKvxn5dCADuWPniTG9l6s5mH_q2bNYycijjUA-nDPVSA1C5jOjAKmVaLoWvsv7KNxTIHj_S6BfkBQOATmrd6DB23_lrIA2-i6Rdohl5RhUFTkVfpgui2P5YlgqIoLqvgCfU21p52vuAmfVNNv9dYKzNEh3P4-FKPKRi9Br_D2cklecqs7q19_2KJkxIbdflGBHcrp32Z4ZjBhoPfGYY8DNWTH-Lz8LnrNtQ",
	"name": "aaliyahaa"
}
```

![Register User](https://i.imgur.com/lNtkFIu.png)

2. Login User
endpoint : https://localhost/api/login
Method : POST
```bash
{
	"email":"aaliyahaa@gmail.com",
	"password":"sumayyah",
}
```
Response :
```bash
{
	"token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYjVmZTQ4YTFmMjU3ZGRmNTlhZTUzM2FlM2ZkMGJhMjU2Yzg1ZmNlZGI3YjY3ZWIyZDYyNDk5ZGRjOTgxNzFkY2U1MjBmODRlODQxZDk0ZmMiLCJpYXQiOjE2MjczODU2NDUuMzgwMzUxLCJuYmYiOjE2MjczODU2NDUuMzgwMzU0LCJleHAiOjE2NTg5MjE2NDUuMzc3MTA5LCJzdWIiOiIxMCIsInNjb3BlcyI6W119.xfuYAnNz2h1IGOnToykeM9ZBcnjqIlqUxvgYjV5-oCB_ZvY1Yha6g7GGiZ1c4khWhA7oI3SCuU5z_2QU4ngs58Pi1I1nGwtvh9cPF8BlhRxHcUD542Tp8uXgDyn_pEeDFswKArqDUMBWfowNhrnI9L3tqOB3AdZXdOtwLvpDsW6yayiRAa1o63CnN4OvOEEqzz3-pvcdfzaaX40dfpQx6oQOSiVA0wFf9m_BuThiiju19oyDyPZTIFFAN_3k7QESGRdUrrA_ygRUsKODGxPzpFkllMqiChd5HUF45i0cz3rJ5Bw2M4Oc02dVBmDcDkeJyKgeVOY9CFmnL_JxrlTmRBXIuYH8URFKnW591IPSE6Cz-NdrJS8PCxVW3PFwHu7HEggMON-hI5tOtneU8FgZrDo9KheIWcb739w1sHPrS2zZ05p-W0V86BrOOcJbNoLOfhdCJ3r0AKvxn5dCADuWPniTG9l6s5mH_q2bNYycijjUA-nDPVSA1C5jOjAKmVaLoWvsv7KNxTIHj_S6BfkBQOATmrd6DB23_lrIA2-i6Rdohl5RhUFTkVfpgui2P5YlgqIoLqvgCfU21p52vuAmfVNNv9dYKzNEh3P4-FKPKRi9Br_D2cklecqs7q19_2KJkxIbdflGBHcrp32Z4ZjBhoPfGYY8DNWTH-Lz8LnrNtQ",
}
```

![Register User](https://i.imgur.com/5vMhct0.png)
3. Product List
Endpoint : https://localhost/api/products
Method : GET

Response :
```bash
[
	{
		"id": 1,

		"created_at": "2021-07-27T03:23:41.000000Z",

		"updated_at": "2021-07-27T08:23:19.000000Z",

		"product_name": "Basikal Mahal",

		"product_code": "BS001",

		"product_price": 4222
	},

	{
		"id": 2,

		"created_at": "2021-07-27T11:57:27.000000Z",

		"updated_at": "2021-07-27T11:57:28.000000Z",

		"product_name": "Basikal Tua",

		"product_code": "BS002",

		"product_price": 30
	}
]
```

![Register User](https://i.imgur.com/ob0RfuU.png)

4. Product Create
Endpoint : https://localhost/api/products/store
Method : POST

```bash
{
	"product_name": "Basikal Mahasssl",
	"product_code": "BS007",
	"product_price": 4222
}
```
Response :
```bash
{
	"Message": "Product Successfuully Created"
}
```
![Register User](https://i.imgur.com/MLDlc8L.png)

5. Product Update
Endpoint : https://localhost/api/products/update/{id}
Method : POST

```bash
{
    "product_name": "Basikal Mahalnyas",
    "product_code": "BS001",
    "product_price": 4222
}
```
Response :
```bash
{
	"id": 1,
	"created_at": "2021-07-27T03:23:41.000000Z",
	"updated_at": "2021-07-27T18:33:29.000000Z",
	"product_name": "Basikal Mahalnyas",
	"product_code": "BS001",
	"product_price": 4222
}
```

![Register User](https://i.imgur.com/luVi8zF.png)

6. Product Delete
Endpoint : https://localhost/api/products/delete/{id}
Method : POST
Normal User with **User** role.
![Register User](https://i.imgur.com/AVDJxf7.png)

Normal User with **SuperAdmin** role.
![Register User](https://i.imgur.com/RGz2jzK.png)


