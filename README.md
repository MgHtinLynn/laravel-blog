# Blog
Blog Management System with Laravel 8 + API + VueJS + Fortify

# Setup

## Docker Desktop
-  First download dockerhub desktop from https://docs.docker.com/get-docker/ depend on your laptop or pc. Window, Mac, Linux.
-  Create Account at dockerhub
-  After install docker desktop and login with your account (https://docs.docker.com/docker-for-windows/install/)
-  If interest , keep digging more. There was a lot of knowledge for infrastructure (kubernetes) (docker-swarm)

## Host Setup with https certificate
https://laravel.com/docs/8.x/valet
   ```console
   composer global require laravel/valet
   valet install
   ```

## Local Dev Setup
- clone repo from GitHub

```console
git clone https://github.com/MgHtinLynn/laravel-blog.git
cd laravel-blog
```

Link valet certificate with nginx proxy
```console
ln -s /Users/htinlynn/.config/valet/Certificates {dir of repo clone}/data/
```
For me:
```
ln -s /Users/htinlynn/.config/valet/Certificates /Users/htinlynn/Code/htinlynn/laravel-blog/data/
```

Link Valet With Https URL
```console
valet secure {host-name}
```

For Example
```console
valet secure blog
```

That will generate https certificate for your repo

We have to disable nginx port 80 in PC or Laptop


```console
valet stop
```


For Server Up
```console
docker-compose up -d
```

For Sever Down
```console
docker-compose down
```

!!BOOM!!

You can call your host name to web-browser

In my mac
https://blog.test/

if different dir, need to update docker-compose file.


For Migration
```console
cp .env.example .env
docker exec -it app bash
php artisan key:generate
php artisan migrate --seed
```

For JS Integration for local
```console
npm install && npm run dev 
```

There is admin account after migration

- adminBlog@mailinator.com
- password

Feature List 
- Laravel (back-end) / Vue.js (frontend) / Ckeditor (package)
- CRUD (list, add, edit, delete)
- CRUD List (all added item)
- CRUD Add form ( form , 2 fields needed, 1st field - Title, 2nd field - Body/Content - using CKEDITOR)
- CRUD Delete (simple delete with confirmation)
- CRUD Update (form and existing value of this selected item)

Enjoy your setup.

If any problem , open the issue.

Htin Lynn,
htinlin01@gmail.com,
09785360975 


