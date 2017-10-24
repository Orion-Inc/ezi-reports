var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var jade = require('gulp-jade');
var less = require('gulp-less');
var uglify = require('gulp-uglify');
var minifyCSS = require('gulp-minify-css');

gulp.task('browser-sync', function() {
	browserSync.init({
		proxy: ''
	});
	gulp.watch(['assets/less/*.less', 'assets/less/**/*.less'], ['less']);
	gulp.watch(['assets/jade/*.jade', 'assets/jade/**/*.jade'], ['jade']);
	gulp.watch(['assets/js/*.js', 'assets/js/**/*.js'], ['js']);
});

gulp.task('jade', function() {
	gulp.src(['assets/jade/second-layout/documentation/*.jade'])
		.pipe(jade({
			pretty: true
		}))
		.pipe(gulp.dest('second-layout'))
		.pipe(browserSync.stream());
});

gulp.task('less', function() {
	gulp.src(['assets/less/second-layout/second-layout.less'])
		.pipe(less())
		.pipe(minifyCSS())
		.pipe(gulp.dest('build/css'))
		.pipe(browserSync.stream());
});

gulp.task('js', function() {
	gulp.src('assets/js/second-layout/*.js')
		.pipe(uglify())
		.pipe(gulp.dest('build/js/second-layout'))
		.pipe(browserSync.stream());
});

gulp.task('default', ['browser-sync'], function() {
	console.log('****  ****');
	console.log('*                  *');
	console.log('*                   *');
	console.log('*               *');
	console.log('*            *');
	console.log('****************************************');
});