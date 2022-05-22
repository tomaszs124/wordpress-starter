# Description

Wordpress starter theme with Prettier, ESLint, Babel, SCSS and JS Compilation, image optimization


## How to start

1. Clone repo
2. Create database
3. Copy/rename ```wp-config-ws-sample.php``` to ```wp-config```
3. Copy/rename ```ws-db/ws-db-sample.php``` to ```ws-db.php``` and enter database data
4. Copy/rename ```webpack/config-sample.json``` to ```config.json``` and change url
5. Browse to your site url
6. Open theme folder in VS Code, open terminal and type
```bash
npm install
```
7. To launch local server with hot reloading and assets compilation
```bash
npm run dev:watch
```


8. Type ``npm run prod`` to minify


9. Copy ``.htaccess-sample`` do ``.htaccess`` to enable browser caching



## GIT

Before You start working on new features, switch to dev branch and update.

```bash
git checkout dev
git pull origin dev
```

Next, create feature branch 

```bash
git checkout -b home-slider
```

And commit your work:

```bash
git add filename.ext
```

or add all:

```bash
git add .
```

Type ``git status`` to see the list of changed files, ``git reset`` to remove added files.


next, describe your changes (Finish the sentence: If applied this commit will...):

```bash
git commit -m "Add slider on homepage"
```

finally push your changes:

```bash
git push origin layout-fixes
```

Create pull request to dev and wait for code review.



If You want to do some more work on ``home-slider`` after merge, update ``dev`` and then there are 2 options:

Delete branch and create a new one:

```bash
git branch -D home-slider
git checkout -b home-slider
```


or checkout to ``home-slider`` branch and ``rebase``

```bash
git checkout layout-fixex
git rebase dev
```