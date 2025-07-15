# Enterprise SSO Demo

This repository contains a simple Single Sign-On (SSO) server built with **CodeIgniter 4**. Authentication uses Google OAuth2 and the interface is based on the AdminLTE dashboard using the top navigation layout (no sidebar).


## Setup

1. Install PHP 8.3 and Composer (already provided in this environment).
2. Install dependencies:
   ```bash
   composer install --working-dir=sso
   ```
3. Link the vendor assets so AdminLTE's CSS and JavaScript are served:
   ```bash
   ln -s ../vendor sso/public/vendor
   ```
4. Copy `sso/env` to `sso/.env` and fill in your Google OAuth credentials:
   ```ini
   google.oauthClientId="YOUR_GOOGLE_CLIENT_ID"
   google.oauthClientSecret="YOUR_GOOGLE_CLIENT_SECRET"
   ```
5. Run the development server:
   ```bash
   php sso/spark serve
   ```
   Visit `http://localhost:8080` in your browser.

The default home page shows a login button. After logging in with Google, buttons for the example applications are displayed:

- **Sistem Informasi Keuangan (SIMKEU)**
- **Sistem Informasi Persuratan**
- **Sistem Informasi Kepegawaian**

### Admin Management

Allowed accounts and their app access are stored in `sso/writable/allowed_users.json`.
An example admin user is included:

```json
[{"email":"admin@example.com","apps":["simkeu","persuratan","kepegawaian"],"is_admin":true}]
```

After logging in with an admin account you can manage users at `/admin`.
