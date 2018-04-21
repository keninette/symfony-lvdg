module.exports = function(grunt) {

    // Load automatically all tasks without using grunt.loadNpmTasks()
    // for each module
    require('load-grunt-tasks')(grunt);

    // project configuration
    grunt.initConfig({
      pkg: grunt.file.readJSON('package.json')

      // global paths
        , paths: {
            resources:    'assets/'   // source files
            , assets:     'public/'   // compiled or processed files
        }

        , uglify: {
            options: {
              banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            } 
            , build: {
              src: '<%= paths.resources %>/js/<%= pkg.name %>.js',
              dest: '<%= paths.assets %>js/<%= pkg.name %>.min.js'
            }
        }

        , sass: {

            // For development
            dev: {
              files: {
                '<%= paths.assets %>css/home.back.css' :    '<%= paths.resources %>sass/home.back.scss',
                '<%= paths.assets %>css/main.css' :         '<%= paths.resources %>sass/main.scss'
              }
              , options: {
                style: 'expanded'
              }
            },

            // For production
            prod: {
              files: {
                '<%= paths.assets %>css/main.css' : '<%= paths.resources %>sass/main.scss'
              },
              options: {
                style: 'compressed', // This option minimizes the CSS
                sourcemap: 'none'
              }
            }

        },

        // watch task, to automatically execute every task called in it
        watch: {
          sass: {
            files: [
              '<%= paths.resources %>/sass/*.scss' // Write here the files that Grunt must watches
            ],
            tasks: ['sass:dev']
          }
        }

      });

    // Default task(s).
    grunt.registerTask('default'  , ['uglify', 'sass:dev']);
    grunt.registerTask('prod'     , ['sass:prod']);
};