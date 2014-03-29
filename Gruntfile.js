/*!
 * Gruntfile.js for Bootstrap & Wordpress "Example Grunt Project"
 * Version 1.0.0
 * Author: Duri Chitayat
 */

module.exports = function (grunt) {
  'use strict';

  // Force use of Unix newlines
  grunt.util.linefeed = '\n';

  RegExp.quote = function (string) {
    return string.replace(/[-\\^$*+?.()|[\]{}]/g, '\\$&');
  };

  var fs = require('fs');
  var path = require('path');
  var generateGlyphiconsData = require('./grunt/bs-glyphicons-data-generator.js');
  var BsLessdocParser = require('./grunt/bs-lessdoc-parser.js');
  var generateRawFilesJs = require('./grunt/bs-raw-files-generator.js');
  var updateShrinkwrap = require('./grunt/shrinkwrap.js');

  // Project configuration.
  grunt.initConfig({

    // Metadata.
    pkg: grunt.file.readJSON('package.json'),
    banner: '/*!\n' +
            ' * Bootstrap v<%= pkg.version %> (<%= pkg.homepage %>)\n' +
            ' * Copyright 2011-<%= grunt.template.today("yyyy") %> <%= pkg.author %>\n' +
            ' * Licensed under <%= pkg.license.type %> (<%= pkg.license.url %>)\n' +
            ' */\n',
          
//** Removed check for Jquery **//

    // Task configuration.
    clean: {
      dist: ['wp-content/themes/nitro/dist']
    },

    csslint: {
      options: {
        csslintrc: 'less/.csslintrc'
      },
      src: [
        'wp-content/themes/nitro/dist/css/bootstrap.css',
        'wp-content/themes/nitro/dist/css/bootstrap-theme.css'
      ]
    },

    concat: {
      options: {
        banner: 'Banner',
        stripBanners: false
      },
      bootstrap: {
        src: [
          'bootstrap-dev/js/transition.js',
          'bootstrap-dev/js/alert.js',
          'bootstrap-dev/js/button.js',
          'bootstrap-dev/js/carousel.js',
          'bootstrap-dev/js/collapse.js',
          'bootstrap-dev/js/dropdown.js',
          'bootstrap-dev/js/modal.js',
          'bootstrap-dev/js/tooltip.js',
          'bootstrap-dev/js/popover.js',
          'bootstrap-dev/js/scrollspy.js',
          'bootstrap-dev/js/tab.js',
          'bootstrap-dev/js/affix.js'
        ],
        dest: 'wp-content/themes/nitro/dist/js/bootstrap.js' //replaced package with bootstrap, all projects will use same file name
      }
    },

    uglify: {
      options: {
        report: 'min'
      },
      bootstrap: {
        options: {
          banner: 'Banner'
        },
        src: '<%= concat.bootstrap.dest %>',
        dest: 'wp-content/themes/nitro/dist/js/bootstrap.min.js' //replaced package with bootstrap, all projects will use same file name
      }
   },
        
    less: {
      compileCore: {
        options: {
          strictMath: true,
          sourceMap: true,
          outputSourceFiles: true,
          sourceMapURL: 'bootstrap.css.map',
          sourceMapFilename: 'wp-content/themes/nitro/dist/css/bootstrap.css.map'
        },
        files: {
          'wp-content/themes/nitro/dist/css/bootstrap.css': 'bootstrap-dev/less/bootstrap.less'
        }
      },
      compileTheme: {
        options: {
          strictMath: true,
          sourceMap: true,
          outputSourceFiles: true,
          sourceMapURL: 'bootstrap-theme.css.map',
          sourceMapFilename: 'wp-content/themes/nitro/dist/css/bootstrap-theme.css.map'
        },
        files: {
          'wp-content/themes/nitro/dist/css/bootstrap-theme.css': 'bootstrap-dev/less/theme.less'
        }
      },
      minify: {
        options: {
          cleancss: true,
          report: 'min'
        },
        files: {
          'wp-content/themes/nitro/dist/css/bootstrap.min.css': 'wp-content/themes/nitro/dist/css/bootstrap.css',
          'wp-content/themes/nitro/dist/css/bootstrap-theme.min.css': 'wp-content/themes/nitro/dist/css/bootstrap-theme.css'
        }
      }
    },

    usebanner: {
      dist: {
        options: {
          position: 'top',
          banner: '<%= banner %>'
        },
        files: {
          src: [
            'wp-content/themes/nitro/dist/css/bootstrap.css',
            'wp-content/themes/nitro/dist/css/bootstrap.min.css',
            'wp-content/themes/nitro/dist/css/bootstrap-theme.css',
            'wp-content/themes/nitro/dist/css/bootstrap-theme.min.css'
          ]
        }
      }
    },

    csscomb: {
      options: {
        config: 'bootstrap-dev/less/.csscomb.json'
      },
      dist: {
        files: {
          'wp-content/themes/nitro/dist/css/bootstrap.css': 'dist/css/bootstrap.css',
          'wp-content/themes/nitro/dist/css/bootstrap-theme.css': 'dist/css/bootstrap-theme.css'
        }
      }
    },

    copy: {
      fonts: {
        expand: true,
        src: 'fonts/*',
        dest: 'wp-content/themes/nitro/dist/'
      }
    },

    watch: {
      less: {
        files: 'bootstrap-dev/less/*.less',
        tasks: 'less'
      }
    },

    sed: {
      versionNumber: {
        pattern: (function () {
          var old = grunt.option('oldver');
          return old ? RegExp.quote(old) : old;
        })(),
        replacement: grunt.option('newver'),
        recursive: true
      }
    },

    exec: {
      npmUpdate: {
        command: 'npm update'
      },
      npmShrinkWrap: {
        command: 'npm shrinkwrap --dev'
      }
    }
  });


  // These plugins provide necessary tasks.
  require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});

  // Docs HTML validation task
  // grunt.registerTask('validate-html', ['jekyll', 'validation']);

  // Test task.
  var testSubtasks = [];
  // Skip core tests if running a different subset of the test suite
  // if (!process.env.TWBS_TEST || process.env.TWBS_TEST === 'core') {
  //   testSubtasks = testSubtasks.concat(['dist-css', 'csslint', 'jshint', 'jscs', 'qunit'/*, 'build-customizer-html'*/]);
  // }
  
  // Skip HTML validation if running a different subset of the test suite
    // if (!process.env.TWBS_TEST || process.env.TWBS_TEST === 'validate-html') {
    // testSubtasks.push('validate-html');
  // }
  
  // Only run Sauce Labs tests if there's a Sauce access key
  if (typeof process.env.SAUCE_ACCESS_KEY !== 'undefined' &&
      // Skip Sauce if running a different subset of the test suite
      (!process.env.TWBS_TEST || process.env.TWBS_TEST === 'sauce-js-unit')) {
    testSubtasks.push('connect');
    testSubtasks.push('saucelabs-qunit');
  }

  // JS distribution task.
  grunt.registerTask('dist-js', ['concat', 'uglify']);

  // CSS distribution task.
  grunt.registerTask('dist-css', ['less', 'csscomb']);

  // Full distribution task.
  grunt.registerTask('dist', ['clean', 'dist-css', 'copy:fonts', 'dist-js']);

  // Default task.
  grunt.registerTask('default', [ 'dist', 'build-glyphicons-data', 'update-shrinkwrap']);

  // Version numbering task.
  // grunt change-version-number --oldver=A.B.C --newver=X.Y.Z
  // This can be overzealous, so its changes should always be manually reviewed!
  grunt.registerTask('change-version-number', 'sed');

  grunt.registerTask('build-glyphicons-data', generateGlyphiconsData);

  // Task for updating the npm packages used by the Travis build.
  grunt.registerTask('update-shrinkwrap', ['exec:npmUpdate', 'exec:npmShrinkWrap', '_update-shrinkwrap']);
  grunt.registerTask('_update-shrinkwrap', function () { updateShrinkwrap.call(this, grunt); });
};