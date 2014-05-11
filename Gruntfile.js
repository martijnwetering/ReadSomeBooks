module.exports = function(grunt) {

    grunt.initConfig({
        validation: {
            files: {
                src: ['index.html', 'views/**/*.html']
            }
        },
        watch: {
            all: {
                files: ['css/style.css', 'index.html', 'views/**/*.html'],
                options: {
                    livereload: true
                }
            }
        }
    });

    //grunt.loadNpmTasks('grunt-contrib-uglify');
    //grunt.loadNpmTasks('grunt-contrib-jshint');
    //grunt.loadNpmTasks('grunt-contrib-qunit');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-html-validation');
    //grunt.loadNpmTasks('grunt-contrib-concat');

    //grunt.registerTask('test', ['jshint', 'qunit']);

    //grunt.registerTask('default', ['jshint', 'qunit', 'concat', 'uglify']);

};
