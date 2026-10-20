# ==========================================
# 1. Frontend Build Stage (Vite + Tailwind)
# ==========================================
FROM node:20-alpine AS node-builder
WORKDIR /app
COPY package*.json vite.config.js ./
RUN npm install
COPY resources ./resources
COPY public ./public
RUN npm run build

# ==========================================
# 2. PHP 8.2 Application Server
# ==========================================
FROM php:8.2-cli

# Install system dependencies & PHP extensions
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    ca-certificates \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Create non-root user (UID 1000) for Hugging Face Spaces security
RUN useradd -m -u 1000 user
WORKDIR /app

# Copy application source code
COPY . .

# Copy built frontend assets from node-builder
COPY --from=node-builder /app/public/build ./public/build

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permissions for user (UID 1000)
RUN chown -R user:user /app \
    && chmod -R 775 /app/storage /app/bootstrap/cache \
    && sed -i 's/\r$//' /app/docker-entrypoint.sh \
    && chmod +x /app/docker-entrypoint.sh

USER user

ENV PORT=7860
EXPOSE 7860

ENTRYPOINT ["/app/docker-entrypoint.sh"]
