### Install
1. `git clone` this project
2. Navigate to the cloned project folder and run `composer install`
3. Start xampp and create new database named `silviu-test`
4. Run the project with `symfony server:start`
5. Run `bin/console doctrine:schema:update -f` to update database schema
6. Run `bin/console doctrine:migrations:execute --up 'DoctrineMigrations\Version20210202232647'` to add values to the database
