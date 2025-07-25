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

### Integrating with SI-Kepegawaian

Applications can obtain a signed JWT for the currently logged in user via
`/token`. Pass the target application ID in the `app` query string, e.g.:

```
GET /token?app=kepegawaian
```

If the user is allowed access, a JSON response like the following will be
returned:

```json
{"token":"<jwt-token>"}
```

The token is signed using the secret defined by `jwt.secret` in `.env`. The
SI-Kepegawaian project can verify this token using the `firebase/php-jwt`
library:

```php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$data = JWT::decode($token, new Key(getenv('JWT_SECRET'), 'HS256'));
```

The decoded payload contains the user's email and name. Implement a login route
in SI-Kepegawaian that accepts the token, verifies it, and starts a session for
the corresponding user.

For convenience you can redirect users directly to an application using
`/launch/<app>`. This route will generate the token and append it to the
configured URL for that application. For example:

```
GET /launch/kepegawaian
```

will redirect to the SI-Kepegawaian login endpoint with the token passed in the
`token` query parameter.
