
# MVC Framework

This framework was developed during PHP MVC course, from Brad Traversy (Traversy Media)

## How to use

* Edit the .htaccess file into `/{mvc}/public` folder. Change the `/{mvc}/public` part (inside curly braces) on `RewriteBase /mvc/public` line to the name your folder is going to have
* Create `models` folder, inside `mvc` folder, and create your models inside of it
* If you want to create helper functions (without creating a class for it), use `/{mvc}/app/helpers` folder
* There's a `style.css` file for general style, right in `/{mvc}/public/css` folder
* There's also a `main.js` file for general JS interaction, right at `/{mvc}/public/js` folder
* You can lay down your images inside `/{mvc}/public/img` folder, and use them easily
* Don't worry about that `push.sh` file, it is your true savior while you're commiting your project. To use it, run at your terminal `./push.sh "{message}"` and it will run 3 commands for you (you're welcome ;):
```
git add .
git commit -m "{message}"
git push
```
Have fun!