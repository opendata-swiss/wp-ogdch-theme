/*
 to install dependencies:
 > cd ogdch.dev/content/themes/ogdch/
 > sudo npm install
 */

var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    watch = require('gulp-watch'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    minifycss = require('gulp-minify-css'),
    autoprefixer = require('gulp-autoprefixer');


gulp.task('default', function(){});

gulp.task('sass', function() {
    return sass('./assets/scss/app.scss', {
        noCache: true,
        style: "compressed",
        lineNumbers: false,
        loadPath: './assets/scss/*'
    })
        .pipe(minifycss())
        .pipe(autoprefixer('last 2 version'))
        .pipe(concat('app.css'))
        .pipe(gulp.dest('./assets/css'))
        .pipe(notify({ message: 'Styles task complete' }));
});

gulp.task('scripts', function() {
    return gulp.src([
        './assets/js/lib/URI.js',
        './assets/js/lib/jquery.URI.min.js',
        './assets/js/functions.js',
        './assets/js/app.js'
    ])
        .pipe(concat('app.min.js'))
        .pipe(gulp.dest('./assets/js'))
        .pipe(notify({ message: 'Scripts task complete' }));
});


gulp.task('watch', function() {
    gulp.watch('./assets/scss/**/*.scss', ['sass'] );
    gulp.watch('./assets/js/**/*.js', ['scripts'] );
});