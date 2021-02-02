
# SharePosts

Application developed using the framework created following the course, from Brad Traversy

## How to use

* Using PHPMyAdmin (or any other db tool), create a database called `shareposts`, and tables called `users` and `posts` (use the schema found in this branch, `schema` folder, if you want to be practical)
* Put the `shareposts` folder inside your local server, and run it with the following URL: `http://localhost/shareposts`
* Don't worry about that `push.sh` file, it is your true savior while you're commiting your project. To use it, run at your terminal `./push.sh "{message}" {branch}` and it will run 3 commands for you - you're welcome :wink:

```shell
git add .
git commit -m "{message}"
git push origin {branch}
```

Have fun!