Example Grunt Project
=====================

## Motivation

After the most recent "Deep Dive" where we discussed a wide array of topics I decided to create an repository we could all use to branch out (pun intended). 

#### This repository starts to touch on several of these topics including: 

* Wordpress & Dependancy Management (using grunt)
* Wordpress & Project Setup

![alt text](https://cdn.tutsplus.com/wp/authors/tom/Screen-Shot-2013-01-09-at-12.21.02-PM.png "One Does Not Simply Put Files Anywhere")

* Wordpress & Bootstrap
* Wordpress & Less

#### Some Important Topics Not Reflected Here (YET)

* Wordpress & Data Architecture (Custom Post Types, MetaBox)
* Wordpress & Theme Development (Post Format, Metabox) 
* Wordpress & E-Commerce (eg WooCommerce)
* Wordpress Management (eg manageWP)

Webteam ongoing refactor to discover, discuss, and document our own best practice. 

## Includes

1. Package.json: Grunt Configuration File for project name, description and basic dependancies like Less Watcher, JSHint, Concat, etc (Node Package Manager will read this file when the project is created and install these dependancies. Grunt will manage these dependancies rather than checking them into the repo, ie node_modules are listed in gitignore).

| Dependency    | Description   | Command       |
| ------------- | ------------- | ------------- |
| Grunt         | Grunt... obviously                        | `grunt`           |
| BTOA          | Uses Buffer to emulate the exact functionality of the browser's btoa | |
| Canonical JSON| Returns a canonical JSON format           |                   |
| Grunt Banner  | Adds a simple banner to files             |                   |
| Grunt Clean   | Clean files and folders                   | `grunt clean`     |
| Grunt Concat  | Concatenate files                         | `grunt concat`    |
| Grunt Connect |Start a connect web server                 | `grunt connect`   |
| Grunt Copy    | Copy files and folders                    | `grunt copy`      |
| Grunt cssLint | Lint CSS files                            | `grunt cssLint`   |
| Grunt cssMIN  | Compress CSS files                        | `grunt cssmin`    | 
| Grunt jsHINT  | Validate files with JSHint                | `grunt jshint`    |
| Grunt LESS    | Compile LESS files to CSS                 | `grunt Less`      |
| Grunt Uglify  | Minify files with UglifyJS                | `grunt uglify`    |
| Grunt Watch   | Run predefined tasks whenever watched file patterns are added, changed or deleted | `grunt watch` |
| Grunt cssCOMB | Sorts CSS properties in specific order    |                   |
| Grunt Exec    | Grunt plugin for executing shell commands |                   |
| Grunt SED     | Grunt Search and Replace (eg %variable%)  |                   |
| Grunt Tasks   | Load multiple grunt tasks using globbing patterns | `require('load-grunt-tasks')(grunt);` |
| Markdown      | This grunt task takes a set of markdown files and converts them to HTML | |

2. Gruntfile.js: This documents the Grunt Tasks, so you can make it DO things like compile a bunch of less files from one folder into one CSS in another. Also minify, lint, test, etc. This example Gruntfile.js includes bootstrap Grunt Tasks into a folder structure that made sense to me based on Wordpress Boilerplate. Feel free to start branches on this. 

3. WordPress Boilerplate: Typically, WordPress installations are a spaghetti of the WordPress core, plugins, themes and what have you. This makes upgrading WordPress a pain. The point of this boilerplate is to keep the WordPress core and everything else cleanly separated. This is achieved by using git submodules and some config hacking and Apache redirects :)
4. Bootstrap 3.1.1: I organized these files into two main folders /bootstrap-dev, which contians all of our workring files (less, js, fonts), and /wp-content/themes/nitro/dist, which is where grunt compiles distrobution files. This makes it easy to remove the development files when pushing to production (just gitignore the /bootstrap-dev and /grunt folders and update the functions.php to select the minified dist of the CSS &amp; JS files) great right!? As I mentioned, the folder structure is tied to Gruntfile.js. as well as the other files listed above. Feel free to branch this and we can start to define a "Best Practice" for project init.

## Installation

Clone the repository:

    git clone --recursive git@github.com:NetatWork/example-grunt-project.git
    
Install Development Dependencies (you need to have Node and Node Package Manager installed on your environment)

    cd <root directory>
    npm install

Get Latest Submodules

    git submodule update --recursive
    
    
### To Create a New Project from Nitro


Clone the repository:

    git clone --recursive git@github.com:NetatWork/example-grunt-project.git
    
Update package.json

    Edit project name and dependencies
    
Update gruntfile.js 

    Edit tasks (if necessary)
    
Install Development Dependencies (you need to have Node and Node Package Manager installed on your environment)

    cd <root directory>
    npm install
    
Add Necessary Nitro Plugins

    Git Submodule Add <plugin> 

Get Latest Submodules

    git submodule update --recursive
    
And remove this origin repository from your working copy:

    cd <root directory>
    git remote rm origin

Add your new (project) origin repository to your working copy:

    git remote add origin <url_here>


