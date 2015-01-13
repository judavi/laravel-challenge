var gulp = require('gulp');
var sass = require('gulp-ruby-sass');
var notify = require("gulp-notify");
var bower = require('gulp-bower');
var concat = require('gulp-concat');
var minifyCSS = require('gulp-minify-css');
var rename = require("gulp-rename");

var config = {
    bowerDir: './assets'
};

gulp.task('bower', function () {
    return bower()
        .pipe(gulp.dest(config.bowerDir))
});

gulp.task('bootstrap-core', function () {
    gulp.src(config.bowerDir + "/bootstrap-sass-official/assets/stylesheets/bootstrap.scss")
        .pipe(rename({suffix: '.min'}))
        .pipe(sass({style: 'compressed'}))
        .pipe(gulp.dest('./css'));
});

gulp.task('bootstrap-theme', function () {
    gulp.src(config.bowerDir + "/bootstrap-sass-official/assets/stylesheets/theme/theme.scss")
        .pipe(rename({suffix: '.min'}))
        .pipe(sass({style: 'compressed'}))
        .pipe(gulp.dest('./css'));
});

gulp.task('fontawesome', function() {
    return gulp.src(config.bowerDir + '/fontawesome/fonts/**.*')
    .pipe(gulp.dest('./fonts'));
});

gulp.task('glyphicons', function() {
    return gulp.src(config.bowerDir + '/bootstrap-sass-official/assets/fonts/bootstrap/**.*')
        .pipe(gulp.dest('./fonts'));
});

// Rerun the task when a file changes
gulp.task('watch', function () {
    gulp.watch(config.bowerDir + '/bootstrap-sass-official/assets/stylesheets/*.scss', ['css']);
});

gulp.task('scripts', function() {
    gulp.src(config.bowerDir + '/bootstrap-sass-official/assets/javascript/*.js')
        .pipe(concat('bootstrap.js'))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./js'))
});

gulp.task('minify-wysiwyg', function() {
    gulp.src(config.bowerDir + './bootstrap-wysiwyg/index.css')
        .pipe(rename({suffix: '.min'}))
        .pipe(minifyCSS({keepBreaks:true}))
        .pipe(gulp.dest('./css'))
});

gulp.task('default', ['bower', 'fontawesome', 'bootstrap-theme', 'glyphicons']);