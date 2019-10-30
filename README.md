
## Docker steps
sudo rm -rf docker/mysql/data/*

echo "" >> ~/.bashrc && \
    echo 'export PATH="$HOME/.composer/vendor/bin:$PATH"' >> ~/.bashrc
    
export PATH="$HOME/.composer/vendor/bin:$PATH"

composer install --prefer-dist

npm install

npm run dev

## Laravel steps

# optional
#php artisan make:migration create_table_posts

php artisan make:model Post -m --force

php artisan make:model Tweet -m --force

php artisan migrate:reset

php artisan migrate

php artisan make:factory PostFactory --model=Post

php artisan make:factory TweetFactory --model=Tweet

php artisan make:controller PostController -r

php artisan route:list 