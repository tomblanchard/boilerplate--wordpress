module.exports = function(grunt) {

  require('load-grunt-tasks')(grunt);

  grunt.initConfig({


    sass: {
      dist: {
        options: {
          style: 'compressed'
        },
        files: [{
          expand: true,
          cwd: 'src/scss',
          src: ['**/*.scss'],
          dest: 'lib/css',
          ext: '.min.css'
        }]
      }
    },


    autoprefixer: {
      options: {
        browsers: [
          'last 5 version',
          'safari 6',
          'ie 9',
          'opera 12.1',
          'ios 6',
          'android 4'
        ]
      },
      dist: {
        files: [{
          expand: true,
          cwd: 'lib/css',
          src: ['**/*.css'],
          dest: 'lib/css'
        }]
      }
    },


    uglify: {
      dist: {
        files: {
          'lib/js/main.min.js': 'src/js/main.js'
        }
      }
    },


    watch: {
      sass: {
        files: 'src/scss/**/*.scss',
        tasks: ['sass:dist', 'autoprefixer:dist'],
        options: {
          spawn: false,
          livereload: true
        }
      },

      uglify: {
        files: 'src/js/main.js',
        tasks: ['uglify'],
        options: {
          spawn: false,
          livereload: true
        }
      }
    }




  });

  grunt.registerTask('default', [
    'sass:dist',
    'autoprefixer:dist',
    'uglify:dist',
    'watch'
  ]);

};