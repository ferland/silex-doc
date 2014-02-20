module.exports = function(grunt) {
  var app  = {
    port: 6789
  };
  /**
   * Dynamically load npm tasks
   */
  require('load-grunt-tasks')(grunt);

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    watch: {
      all: {
        files: ['Gruntfile.js','public/js/**/*.js', 'public/less/**/*.less'],
        tasks: ['clean:dev', 'less:compileCore', 'less:compileTheme','less:compileCustom','concat','watch'],
        options: {
          nospawn: true,
        }
      }
    },

    //our concat options
    concat: {
      options: {
        separator: ';' //separates scripts
      },
      basic_and_extras: {
        files: {
          'public/js/bootstrap.js': [
            'public/js/bootstrap/transition.js',
            'public/js/bootstrap/alert.js',
            'public/js/bootstrap/button.js',
            'public/js/bootstrap/carousel.js',
            'public/js/bootstrap/collapse.js',
            'public/js/bootstrap/dropdown.js',
            'public/js/bootstrap/modal.js',
            'public/js/bootstrap/tooltip.js',
            'public/js/bootstrap/popover.js',
            'public/js/bootstrap/scrollspy.js',
            'public/js/bootstrap/tab.js',
            'public/js/bootstrap/affix.js'
          ],
          'public/js/apps.js' : ['public/js/sites/*.js'],
        }
      }
    },

    jshint: {
      options: {
        jshintrc: 'js/bootstrap/.jshintrc'
      },
      src: {
        src: 'js/bootstrap/*.js'
      },
    },

    //our uglify options
    uglify: {
      options: {
        report: 'min',
        compress: {
          dead_code: true
        },
        wrap: true,
        // sourceMap: true
      },
      js: {
        files: {
          'public/js/bootstrap.min.js': ['public/js/bootstrap.js'],
          'public/js/apps.min.js': ['public/js/apps.js']
        }
      }
    },

    less: {
      compileCore: {
        options: {
          strictMath: true,
          // sourceMap: true,
          // outputSourceFiles: true,
          // sourceMapURL: 'bootstrap.css.map',
          // sourceMapFilename: 'public/css/bootstrap.css.map'
        },
        files: {
          'public/css/bootstrap.css': 'public/less/bootstrap/bootstrap.less'
        }
      },
      compileTheme: {
        options: {
          strictMath: true,
          // sourceMap: true,
          // outputSourceFiles: true,
          // sourceMapURL: 'bootstrap-theme.css.map',
          // sourceMapFilename: 'public/css/bootstrap-theme.css.map'
        },
        files: {
          'public/css/bootstrap-theme.css': 'public/less/bootstrap/theme.less'
        }
      },
      compileCustom: {
        options: {
          strictMath: true,
          // sourceMap: true,
          // outputSourceFiles: true,
          // sourceMapURL: '<%= pkg.name %>.css.map',
          // sourceMapFilename: 'public/css/<%= pkg.name %>.css.map'
        },
        files: {
          'public/css/<%= pkg.name %>.css': 'public/less/apps.less'
        }
      },
      minify: {
        options: {
          cleancss: true,
          report: 'min'
        },
        files: {
          'public/css/<%= pkg.name %>.min.css': 'public/css/<%= pkg.name %>.css',
          'public/css/bootstrap.min.css': 'public/css/bootstrap.css',
          'public/css/bootstrap-theme.min.css': 'public/css/bootstrap-theme.css'
        }
      }
    },

    clean: {
      dev: [
            'public/css/<%= pkg.name %>.css',
            'public/css/bootstrap-theme.css',
            'public/css/bootstrap.css',
            'public/css/bootstrap.css.map',
            'public/css/bootstrap-theme.css.map',
            'public/css/<%= pkg.name %>.css.map',
            'public/js/bootstrap.js',
            'public/js/apps.js'
          ],
      build: [
        'public/js/bootstrap.min.js',
        'public/js/apps.min.js',
        'public/css/<%= pkg.name %>.min.css',
        'public/css/bootstrap.min.css',
        'public/css/bootstrap-theme.min.css'
        // 'public/js/bootstrap.js',
        // 'public/js/apps.js'
        ],
    },
  });

  // default tasks to run
  grunt.registerTask('dev',['clean:dev', 'less:compileCore','less:compileCustom','concat'])
  grunt.registerTask('default', ['dev','watch']);
  grunt.registerTask('dist', ['dev','clean:build','uglify']);
};
