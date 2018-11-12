var gulp = require('gulp'),
    sass = require('gulp-sass'),
    watch = require('gulp-watch'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify');


gulp.task('default', function(){});

gulp.task('sass', function() {
    return gulp.src('./assets/scss/app.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(autoprefixer('last 2 version'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./assets/css'))
        .pipe(notify({ message: 'Styles task complete', onLast: true }));
});

gulp.task('app-scripts', function() {
    return gulp.src([
        './assets/external/bootstrap-sass/assets/javascripts/bootstrap.js',
        './assets/external/FitText.js/jquery.fittext.js',
        './assets/external/jquery-ui-autocomplete/jquery-ui.js',
        './assets/external/jquery-ui-autocomplete/jquery.ui.autocomplete.html.js',
        './assets/js/app.js'
    ])
        .pipe(concat('app.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./assets/js'))
        .pipe(notify({ message: 'App scripts task complete', onLast: true }));
});

gulp.task('app-admin', function() {
    return gulp.src([
        './assets/js/app-admin.js'
    ])
        .pipe(concat('app-admin.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./assets/js'))
        .pipe(notify({ message: 'App admin task complete', onLast: true }));
});

gulp.task('organization-filter-scripts', function() {
    return gulp.src([
        './assets/js/organization-filter.js'
    ])
        .pipe(concat('organization-filter.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./assets/js'))
        .pipe(notify({ message: 'Organization filter scripts task complete', onLast: true }));
});

gulp.task('scripts', [ 'app-scripts', 'app-admin', 'organization-filter-scripts' ]);

gulp.task('watch', function() {
    gulp.watch('./assets/scss/**/*.scss', ['sass'] );
    gulp.watch('./assets/js/**/*.js', ['scripts'] );
});
