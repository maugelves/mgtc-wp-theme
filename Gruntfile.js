module.exports = function(grunt) {

    // NPM plugins configuration
    grunt.initConfig({
        compass: {
            dev: {
                files: {
                    'style.css' : 'sass/style.scss'
                },
                options: {
                    cssDir:         './',
                    noLineComments: true,
                    outputStyle:    'expanded',
                    sassDir:        'sass',
                    watch:          false
                }
            },
            dist: {
                files: {
                    'style.css' : 'sass/style.scss'
                },
                options: {
                    cssDir:         './',
                    noLineComments: false,
                    outputStyle:    'compact',
                    sassDir:        'sass',
                    watch:          false
                }
            }
        },
        postcss: {
            options: {
                map: true,
                processors: [
                    require('autoprefixer')
                ]
            },
            dist: {
                src: '*.css'
            }
        },
        watch:{
            sass:{
                files: ['sass/**/*.scss'],
                tasks: ['compass:dev','postcss'],
                options: {
                    livereload: true,
                    spawn:      false
                }
            }
        }
    });

    // Load the NPM plugins
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-postcss');

    // Register Tasks
    grunt.registerTask('build', ['compass:dist']);
};