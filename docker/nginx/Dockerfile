FROM nginx:1.27-alpine

# Static assets are served directly by nginx; PHP is proxied to the app container.
COPY public /var/www/html/public
COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Uploaded files live on a shared volume mounted at public/uploads
RUN mkdir -p /var/www/html/public/uploads
