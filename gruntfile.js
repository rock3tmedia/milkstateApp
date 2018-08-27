module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    concat: {
      options: {
        separator: ';'
      },
      dist: {
        src: ['app/functions/**/*.js'],
        dest: 'app/milkstate-app.js'
      }
    },
    obfuscator: {
        options: {
            compact: false
        },
        task1: {
            files: {
                'app/milkstate-app-obf.js': [
                    'app/milkstate-app.js'
                ]
            }
        }
    },
    uglify: {
      options: {
        banner: '<!-- date here -->'
      },
      dist: {
        files: {
          'app/milkstate-app.min.js': ['app/milkstate-app-obf.js']
        }
      }
    },
    jshint: {
      files: ['gruntfile.js', 'app/**/*.js'],
      options: {
        // options here to override JSHint defaults
        "esversion":6,
        globals: {
          jQuery: true,
          console: true,
          module: true,
          document: true
        }
      }
    },
    less: {
      development: {
        options: {
          paths: ['css']
        },
        files: {
          'app/master.css': 'css/master.less.css'
        }
      }
    },
    clean: {
      js: ['app/milkstate-app-obf.js']
    },
    watch: {
      files: ['<%= jshint.files %>'],
      tasks: ['jshint']
    }
  });

  //initiate plugins
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-uglify-es');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-obfuscator');
  grunt.loadNpmTasks('grunt-contrib-less');

  //check for code errors
  grunt.registerTask('check', ['jshint']);

  //check for code errors
  grunt.registerTask('css', ['less']);

  //concat(comebine files) and minify
  grunt.registerTask('minify', ['concat', 'obfuscator', 'uglify', 'clean']);

};