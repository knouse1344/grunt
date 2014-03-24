Example Grunt Project
=====================

## Motivation

After the most recent "Deep Dive" where we discussed a wide array of topics I decided to create an repository we could all use to branch out (pun intended). 

#### This repository starts to touch on several of these topics including: 
**1. Wordpress & Dependancy Management (using grunt)
**2. Wordpress & Project Setup
**3. Wordpress & Bootstrap
**4. Wordpress & Less

#### Some Important Topics Not Reflected Here (YET)
**1. Wordpress & Data Architecture (Custom Post Types, MetaBox)
**2. Wordpress & Theme Development (Post Format, Metabox) 
**3. Wordpress & E-Commerce (eg WooCommerce)
**4. Wordpress Management (eg manageWP)

Webteam ongoing refactor to discover, discuss, and document our own best practice. 

## Includes

1. Package.json: Grunt Configuration File for project name, description and basic dependancies like Less Watcher, JSHint, Concat, etc (Node Package Manager will read this file when the project is created and install these dependancies. Grunt will manage these dependancies rather than checking them into the repo, ie node_modules are listed in gitignore).

| Dependency    | Version                           | Description                               | Command           |
| ------------- | -------------                     | ------------                              | ---------------   |
| Grunt         | "grunt": "~0.4.4"                 | Grunt... obviously                        | `grunt`           |
| BTOA          | "btoa": "~1.1.1"                  | Uses Buffer to emulate the exact functionality of the browser's btoa | |
| Canonical JSON | "canonical-json": "~0.0.3"       | Returns a canonical JSON format           |                   |
| Grunt Banner  | "grunt-banner": "~0.2.0"          | Adds a simple banner to files             |                   |
| Grunt Clean   | "grunt-contrib-clean": "~0.5.0"   | Clean files and folders                   | `grunt clean`     |
| Grunt Concat  | "grunt-contrib-concat": "~0.3.0"  | Concatenate files                         | `grunt concat`    |
| Grunt Connect | "grunt-contrib-connect": "~0.6.0" |Start a connect web server                 | `grunt connect`   |
| Grunt Copy    | "grunt-contrib-copy": "~0.5.0"    | Copy files and folders                    | `grunt copy`      |
| Grunt cssLint | "grunt-contrib-csslint": "~0.2.0" | Lint CSS files                            | `grunt cssLint`   |
| Grunt cssMIN  | "grunt-contrib-cssmin": "~0.7.0"  | Compress CSS files                        | `grunt cssmin`    | 
| Grunt jsHINT  | "grunt-contrib-jshint": "~0.8.0"  | Validate files with JSHint                | `grunt jshint`    |
| Grunt LESS    | "grunt-contrib-less": "~0.9.0"    | Compile LESS files to CSS                 | `grunt Less`      |
| Grunt Uglify  | "grunt-contrib-uglify": "~0.3.0"  | Minify files with UglifyJS                | `grunt uglify`    |
| Grunt Watch   | "grunt-contrib-watch": "~0.5.3"   | Run predefined tasks whenever watched file patterns are added, changed or deleted | `grunt watch` |
| Grunt cssCOMB | "grunt-csscomb": "~2.0.1"         | Sorts CSS properties in specific order    |                   |
| Grunt Exec    | "grunt-exec": "0.4.3"             | Grunt plugin for executing shell commands |                   |
| Grunt SED     | "grunt-sed": "~0.1.1"             | Grunt Search and Replace (eg %variable%)  |                   |
| Grunt Tasks   | "load-grunt-tasks": "~0.3.0"      | Load multiple grunt tasks using globbing patterns | `require('load-grunt-tasks')(grunt);` |
| Markdown      | "markdown": "~0.5.0"              | This grunt task takes a set of markdown files and converts them to HTML | |

2. Gruntfile.js: This documents the Grunt Tasks, so you can make it DO things like compile a bunch of less files from one folder into one CSS in another. Also minify, lint, test, etc. This example Gruntfile.js includes bootstrap Grunt Tasks into a folder structure that made sense to me based on Wordpress Boilerplate. Feel free to start branches on this. 

3. WordPress Boilerplate: Typically, WordPress installations are a spaghetti of the WordPress core, plugins, themes and what have you. This makes upgrading WordPress a pain. The point of this boilerplate is to keep the WordPress core and everything else cleanly separated. This is achieved by using git submodules and some config hacking and Apache redirects :)
4. Bootstrap 3.1.1: I organized these files into two main folders /bootstrap-dev, which contians all of our workring files (less, js, fonts), and /wp-content/themes/nitro/dist, which is where grunt compiles distrobution files. This makes it easy to remove the development files when pushing to production (just gitignore the /bootstrap-dev and /grunt folders and update the functions.php to select the minified dist of the CSS &amp; JS files) great right!? As I mentioned, the folder structure is tied to Gruntfile.js. as well as the other files listed above. Feel free to branch this and we can start to define a "Best Practice" for project init.

## Installation

Clone the repository:

    git clone --recursive git@github.com:NetatWork/example-grunt-project.git
    
Install Development Dependencies (you need to have Node and Node Package Manager installed on your environment)

    cd <root directory>
    npm install

### To Create a New Project from Nitro


And remove this origin repository from your working copy:

    cd <root directory>
    git remote rm origin

Add your new (project) origin repository to your working copy:

    git remote add origin <url_here>

## Upgrading Wordpress

After installing this boilerplate, keeping Wordpress up-to-date via git is
pretty easy.

Go to the submodule directory:

    cd wordpress

Fetch the tags from git:

    git fetch --tags

Checkout the version you want to upgrade to (e.g. `git checkout 3.7.1`):

    git checkout <tag>

Commit your Wordpress upgrade:

    cd ..
    git commit -m "Updating wordpress to <tag-name>"