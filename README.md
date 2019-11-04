
## Docker steps
sudo rm -rf docker/mysql/data/*

echo "" >> ~/.bashrc && \
    echo 'export PATH="$HOME/.composer/vendor/bin:$PATH"' >> ~/.bashrc

export PATH="$HOME/.composer/vendor/bin:$PATH"

composer install --prefer-dist

npm install

npm run dev

## Laravel steps
php artisan migrate:reset

# Optional
#php artisan make:migration create_table_posts

php artisan make:model Post -m --force

php artisan make:model Tweet -m --force

php artisan migrate

php artisan make:factory PostFactory --model=Post

php artisan make:factory TweetFactory --model=Tweet

php artisan make:controller PostController -r

php artisan make:controller TwitterController -r

php artisan route:list

php artisan make:seeder UsersTableSeeder

php artisan make:seeder PostsTableSeeder

php artisan make:seeder TweetsTableSeeder

php artisan db:seed --class=UsersTableSeeder

php artisan db:seed --class=PostsTableSeeder

# Optional
#php artisan db:seed

php artisan make:resource PostResource

php artisan make:resource TweetResource

# Not necessary
#php artisan make:resource Users --collection