module.exports = function(grunt) {

    grunt.initConfig({
        php: {
            dist: {
                options: {
                    base: 'build',
                    port: 5000,
                },
            },
        },
        sass: {
            dist: {
                files: {
                    'build/css/style.css': 'sass/style.scss'
                }
            }
        },
        watch: {
            css: {
                files: '**/*.scss',
                tasks: ['sass']
            }
        },
        
    });

    grunt.loadNpmTasks('grunt-php');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('serve', ['php:dist', 'watch']);


};