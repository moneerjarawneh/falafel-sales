# نظام مبيعات مطعم فلافل

مشروع Laravel مع PostgreSQL لنقطة بيع عربية بسيطة. الأقسام تظهر أسفل الطلب الحالي وبأزرار كبيرة مناسبة للّمس.

## التشغيل

يتطلب PHP 8.2+ وComposer وPostgreSQL. بعد إنشاء مشروع Laravel 12 القياسي أو تثبيت الاعتمادات:

```bash
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed --class=CategorySeeder
php artisan serve
```

أضف مستخدمًا عبر Tinker أو عبر Seeder قبل تسجيل الدخول.
