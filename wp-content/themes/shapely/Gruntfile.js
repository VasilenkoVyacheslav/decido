module.exports = function (grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        less: {
            build: {
                options: {
                    sourceMap: true,
                    sourceMapFilename: 'css/custom.css.map',
                    // sourceMapRootpath: "../",
                    //  sourceMapBasepath: "src",
                    sourceMapURL: 'custom.css.map'
                },
                files: {
                    'css/custom.css': 'less/custom.less'
                }
            }
        },
        postcss: {
            options: {
                map: true,
                processors: [
                    require('autoprefixer')({
                        browsers: ['last 2 versions']
                    })
                ]
            },
            dist: {
                src: 'css/*.css'
            }
        },
        watch: {
            // for stylesheets, watch css and less files 
            // only run less and cssmin 
            less: {
                files: ['less/*.less'],
                tasks: ['less', 'postcss']
            }
        }


    });


    // Plugin loading

    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-postcss');

    grunt.registerTask('default', ['watch']);

};