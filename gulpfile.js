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
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify');


gulp.task('default', function(){});

gulp.task('sass', function() {
    return sass('./assets/scss/app.scss', {
        noCache: true,
        style: "compressed",
        sourcemap: true,
        lineNumbers: false,
        loadPath: './assets/scss/*'
    })
        .pipe(autoprefixer('last 2 version'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./assets/css'))
        .pipe(notify({ message: 'Styles task complete' }));
});

gulp.task('scripts', function() {
    return gulp.src([
        './assets/external/bootstrap-sass/assets/javascripts/bootstrap.js',
        './assets/external/FitText.js/jquery.fittext.js',
        './assets/js/app.js'
    ])
        .pipe(concat('app.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./assets/js'))
        .pipe(notify({ message: 'Scripts task complete' }));
});


gulp.task('watch', function() {
    gulp.watch('./assets/scss/**/*.scss', ['sass'] );
    gulp.watch('./assets/js/**/*.js', ['scripts'] );
});