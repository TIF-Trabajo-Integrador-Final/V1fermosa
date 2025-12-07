# Railway Deployment Guide

## Environment Variables Required

In **Railway → Settings → Variables**, ensure these variables are set:

### Database Configuration
```
DB_CONNECTION=mysql
DB_HOST=${RAILWAY_PRIVATE_DOMAIN}
DB_PORT=3306
DB_DATABASE=railway
DB_USERNAME=root
DB_PASSWORD=<your-password-from-mysql-plugin>
DATABASE_URL=mysql://root:<your-password>@${RAILWAY_PRIVATE_DOMAIN}:3306/railway
```

### App Configuration
```
APP_NAME=Instituto Superior Fermosa
APP_ENV=production
APP_KEY=base64:Ip/UfQY6HJLLDMHqo4XWoajCA6/s2D2jF5z8z+isBDw=
APP_DEBUG=false
APP_URL=https://v1fermosa-production-d8f8.up.railway.app
```

### Cache & Session (File-based for reliability)
```
CACHE_DRIVER=file
CACHE_STORE=file
SESSION_DRIVER=file
```

### Mail Configuration
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=institutosuperiorfermosa@gmail.com
MAIL_PASSWORD=<your-app-password>
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=institutosuperiorfermosa@gmail.com
MAIL_FROM_NAME=Instituto Superior Fermosa
```

### Deployment Hooks (Post-Start)
These run automatically after every deploy:
```
NIXPACKS_POSTSTART_HOOK=php artisan migrate --force
NIXPACKS_POSTSTART_HOOK_2=php artisan db:seed --force
NIXPACKS_POSTSTART_HOOK_3=php artisan optimize
NIXPACKS_POSTSTART_HOOK_4=php artisan storage:link
```

### Storage Configuration
```
FILESYSTEM_DISK=public
```

### Debug Token (Temporary)
```
DEBUG_TOKEN=debug_token_fermosa_2025
```

## Deployment Steps

1. **Update all variables** in Railway Settings
2. **Save and trigger Deploy** (or manual Redeploy)
3. **Wait for deployment** to complete (check Logs)
4. **Verify database** is populated:
   - Visit: `https://v1fermosa-production-d8f8.up.railway.app/debug/health?token=debug_token_fermosa_2025`
   - Visit: `https://v1fermosa-production-d8f8.up.railway.app/debug/convenios?token=debug_token_fermosa_2025`

## Troubleshooting

### Database connection fails
- Check `DB_HOST` is set to `${RAILWAY_PRIVATE_DOMAIN}` (NOT hardcoded hostname)
- Check `DB_PASSWORD` matches the MySQL plugin credentials
- Look at Logs tab in Railway for PDO connection errors

### Seeds don't run
- Ensure `NIXPACKS_POSTSTART_HOOK_2` is set
- Check Logs after deploy for seed execution output
- If stuck, manually run: `php artisan db:seed --force` via Railway Console

### Images not loading
- Ensure `FILESYSTEM_DISK=public`
- Run `php artisan storage:link` via Railway Console
- Check that images are stored in `storage/app/public/carreras/`

## Removing Debug Routes

Once verified, remove these routes from `routes/web.php`:
```php
Route::get('/debug/convenios', [DebugController::class, 'convenios']);
Route::get('/debug/health', [DebugController::class, 'health']);
```

And delete `app/Http/Controllers/DebugController.php`
