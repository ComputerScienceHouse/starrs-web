#!/bin/bash

echo "Adding to Config"

sed -i "s/<DB_NAME>/$DB_NAME/g" /var/www/html/application/config/database.php
sed -i "s/<DB_USERNAME>/$DB_USERNAME/g" /var/www/html/application/config/database.php
sed -i "s/<DB_HOSTNAME>/$DB_HOSTNAME/g" /var/www/html/application/config/database.php
sed -i "s/<DB_PASSWORD>/$DB_PASSWORD/g" /var/www/html/application/config/database.php

sed -i "s/<IMPULSE_USERNAME>/$IMPULSE_USERNAME/g" /var/www/html/application/config/impulse.php
sed -i "s/<IMPULSE_DISPLAY_NAME>/$IMPULSE_DISPLAY_NAME/g" /var/www/html/application/config/impulse.php

sed -i 's/80/8080/g' /etc/apache2/apache2.conf
sed -i 's/80/8080/g' /etc/apache2/ports.conf

#sed -i 's/LoadModule mpm_event_module/#LoadModule mpm_event_module/g' /usr/local/apache2/conf/httpd.conf

echo "LoadModule rewrite_module /usr/lib/apache2/modules/mod_rewrite.so
LoadModule auth_openidc_module /usr/lib/apache2/modules/mod_auth_openidc.so" >> /etc/apache2/apache2.conf

echo "
<VirtualHost *:8080>
    DocumentRoot /var/www/html
    AllowEncodedSlashes on
    ServerName $SERVER_NAME

    OIDCRedirectURI $HTTP_SCHEME://$SERVER_NAME/sso/redirect" > /etc/apache2/sites-enabled/000-default.conf

#if [ $HTTP_SCHEME = "https" ]; then
#	echo "    OIDCXForwardedHeaders X-Forwarded-Host X-Forwarded-Proto X-Forwarded-Port Forwarded" >> /etc/apache2/sites-enabled/000-default.conf
#fi

echo "    OIDCCryptoPassphrase $(tr -dc A-Za-z0-9 </dev/urandom | head -c 64 ; echo '')
    OIDCProviderMetadataURL https://sso.csh.rit.edu/auth/realms/csh/.well-known/openid-configuration
    OIDCSSLValidateServer On
    OIDCClientID $OIDC_CLIENT_ID
    OIDCClientSecret $OIDC_CLIENT_SECRET
    OIDCCookieDomain $OIDC_COOKIE_DOMAIN
    OIDCCookie sso_session
    OIDCSessionInactivityTimeout 1800
    OIDCSessionMaxDuration 28800
    OIDCDefaultLoggedOutURL https://csh.rit.edu
    OIDCRemoteUserClaim preferred_username
    OIDCScope \"openid\"
    OIDCInfoHook iat access_token access_token_expires id_token userinfo refresh_token

    <Location />
        AuthType openid-connect
        Require valid-user
        Redirect /sso/logout /sso/redirect?logout=$HTTP_SCHEME://$SERVER_NAME
    </Location>
</VirtualHost>
" >> /etc/apache2/sites-enabled/000-default.conf

$@
