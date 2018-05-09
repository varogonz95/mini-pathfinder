# mini-pathfinder


## How to install...

1. Run composer install to install dependencies
2. Then, run composer dumpautoload to discover new directories
3. Update your .env to match your database connection and the APP_NAME
4. Finally, run php artisan migrate --seed to create some default records into your database and a default user account (login default@email.com, pass: secret)

### Notes.

When starting new game, you need to create a new character for that game. Once created, you will likely see an awful white screen of death. Don't worry it's an "intended" bug (don't judge me ): ). If that happens, just return to home page and try starting that previous game again. You won't be prompted with character creation page again.

Thanks and enjoy the bugs!