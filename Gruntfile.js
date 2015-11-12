module.exports = function (grunt) {
    require("load-grunt-tasks")(grunt);

    grunt.initConfig({
        concat:      {
            dist_css: {
                src:  [
                    'node_modules/bootstrap/dist/css/bootstrap.min.css',
                    'node_modules/bootstrap/dist/css/bootstrap-theme.min.css',
                    'assets/css/src/main.css'
                ],
                dest: 'assets/css/styles.min.css'
            },
            dist_vendor_js:  {
                src:  [
                    'node_modules/moment/min/moment.min.js',
                    'node_modules/angular/angular.min.js',
                    'node_modules/angular-route/angular-route.min.js',
                    'node_modules/angular-sanitize/angular-sanitize.min.js',
                    'node_modules/angular-moment/angular-moment.min.js'
                ],
                dest: 'assets/js/vendor.min.js'
            }
        },
        uglify: {
            options: {
                mangle: false
            },
            app_files: {
                files: {
                    'assets/js/app.min.js': ['assets/js/src/*.js']
                }
            }
        },
        watch:    {
            css:            {
                files:   [ 'assets/css/src/**/*' ],
                tasks:   [ 'concat:dist_css' ],
                options: {
                    spawn: false
                }
            },
            scripts:        {
                files:   [ 'assets/js/src/**/*.js' ],
                tasks:   [ 'uglify' ],
                options: {
                    spawn: false
                }
            }
        }
    });

    grunt.registerTask("default", ["concat", "watch"]);
    grunt.registerTask("build", ["concat", 'uglify']);
};