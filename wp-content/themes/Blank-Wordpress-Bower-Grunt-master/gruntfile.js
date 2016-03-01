module.exports = function(grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        watch: {
            options: {

                livereload: true,
            },
            css: {
                files: ['includes/sass/*.scss'],
                tasks: ['sass'],
                options: {
                    spawn: false,
                }   
            }

        },

        sass: {
            dist: {
                options: {
                    //expanded,compact,nested,compressed
                    style: 'expanded',
                    compass: true,
                },
                files: {
                    // 'includes/stylesheets/reset.css': 'includes/sass/reset.scss',
                    'includes/stylesheets/main.css': 'includes/sass/main.scss'
                }
            } 
        }

    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');

    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('dev', ['watch','sass']);

};